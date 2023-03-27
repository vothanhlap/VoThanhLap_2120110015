<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Link;

use App\Models\Slider;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;

class SliderController extends Controller
{
    #GET:admin/slider, admin/slider/index
    public function index()
    {
        $list_slider = Slider::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.slider.index', compact('list_slider'));
    }
    #GET:admin/slider/trash
    public function trash()
    {
        $list_slider = Slider::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.slider.trash', compact('list_slider'));
    }

    #GET: admin/slider/create
    public function create()
    {
        $list_slider = Slider::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';

        foreach ($list_slider as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.slider.create', compact('html_parent_id', 'html_sort_order'));
    }


    public function store(SliderStoreRequest $request)
    {
        $slider = new slider; //tạo mới mẫu tin
        $slider->name = $request->name;
        $slider->slug = Str::slug($slider->name = $request->name, '-');
        $slider->metakey = $request->metakey;
        $slider->metadesc = $request->metadesc;
        $slider->parent_id = $request->parent_id;
        $slider->sort_order = $request->sort_order;
        $slider->status = $request->status;
        $slider->created_at = date('Y-m-d H:i:s');
        $slider->created_by = 1;
        //upload image
        if ($request->has('image')) {
            $path_dir = "public/images/slider/";
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $slider->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $slider->image = $filename;
        }
        //end upload
        if ($slider->save()) {
            $link = new Link();
            $link->slug = $slider->slug;
            $link->table_id = $slider->id;
            $link->type = 'slider';
            $link->save();
            return redirect()->route('slider.index')->with('message', ['type' => 'success', 'msg' => 'Thêm slider thành công!']);
        }
        return redirect()->route('slider.index')->with('message', ['type' => 'dangers', 'msg' => 'Thêm slider không thành công!']);
    }

    public function show(string $id)
    {
        $slider = Slider::find($id);
        if ($slider == null) {
            return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        return view('backend.slider.show', compact('slider'));
    }

    public function edit(string $id)
    {
        $slider = Slider::find($id);
        $list_slider = Slider::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';

        foreach ($list_slider as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.slider.edit', compact('slider', 'html_parent_id', 'html_sort_order'));
    }

    public function update(SliderUpdateRequest $request, string $id)
    {
        $slider = Slider::find($id); //lấy mẫu tin
        $slider->name = $request->name;
        $slider->slug = Str::slug($slider->name = $request->name, '-');
        $slider->metakey = $request->metakey;
        $slider->metadesc = $request->metadesc;
        $slider->parent_id = $request->parent_id;
        $slider->sort_order = $request->sort_order;
        $slider->status = $request->status;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->created_by = 1;
        //upload image
        if ($request->has('image')) {
            $path_dir = "public/images/slider/";
            if (File::exists(public_path($path_dir . $slider->image))) {
                File::delete(public_path($path_dir . $slider->image));
            }
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $slider->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $slider->image = $filename;
        }
        //end upload
        if ($slider->save()) {
            if ($link = Link::where([['type', '=', 'slider'], ['table_id', '=', $id]])->first()) {
                $link->slug = $slider->slug;
                $link->save();
            }
            return redirect()->route('slider.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật slider thành công!']);
        }
        return redirect()->route('slider.index')->with('message', ['type' => 'dangers', 'msg' => 'Cập nhật slider không thành công!']);
    }

    #GET:admin/slider/destroy/{id}
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        //thong tin hinh xoa
        $path_dir = "public/images/slider/";
        $path_image_delete = $path_dir . $slider->image;
        if ($slider == null) {
            return redirect()->route('slider.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($slider->delete()) {
            //xoa hinh
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
            //xoa link
            if ($link = Link::where([['type', '=', 'slider'], ['table_id', '=', $id]])->first()) {
                $link->delete();
            }
            return redirect()->route('slider.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa slider thành công!']);
        }
        return redirect()->route('slider.trash')->with('message', ['type' => 'dangers', 'msg' => 'Xóa slider không thành công!']);
    }
    #GET:admin/slider/status/{id}
    public function status($id)
    {
        $slider = Slider::find($id);
        if ($slider == null) {
            return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $slider->status = ($slider->status == 1) ? 2 : 1;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = 1;
        $slider->save();
        return redirect()->route('slider.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/slider/delete/{id}
    public function delete($id)
    {
        $slider = Slider::find($id);
        if ($slider == null) {
            return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $slider->status = 0;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = 1;
        $slider->save();
        return redirect()->route('slider.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/slider/restore/{id}
    public function restore($id)
    {
        $slider = Slider::find($id);
        if ($slider == null) {
            return redirect()->route('slider.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $slider->status = 2;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = 1;
        $slider->save();
        return redirect()->route('slider.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
