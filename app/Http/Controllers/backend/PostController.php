<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Link;
use App\Models\PostImage;
use App\Models\PostComment;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_name = Auth::user()->name;
         
        $list_post = Post::
         join('vtl_topic','vtl_topic.id','=','vtl_post.top_id')
        ->select('vtl_post.*','vtl_topic.title as chude')
        -> where('vtl_post.status', '!=', 0)
        ->orderBy('vtl_post.created_at', 'desc')
        ->get();
        return view('backend.post.index', compact('user_name','list_post'));
    }

      public function trash()
    {
        $user_name = Auth::user()->name;
        $list_post = Post::join('vtl_topic','vtl_topic.id','=','vtl_post.top_id')
        ->select('vtl_post.*','vtl_topic.title as chude')
        -> where('vtl_post.status', '=', 0)
        ->orderBy('vtl_post.created_at', 'desc')
        ->get();
        return view('backend.post.trash', compact('user_name','list_post'));
    }
    
      public function create()
      {
        $user_name = Auth::user()->name;
        $list_topic = Topic::where('status', '!=', 0)->get();
        $html_top_id = '';
        foreach ($list_topic as $item) {
            $html_top_id .= '<option value="' . $item->id . '">' . $item->title . '</option>';
        }
        return view('backend.post.create', compact('user_name','html_top_id'));
      }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $user_name = Auth::user()->name;
        $post = new post; //tạo mới mẫu tin
        $post->top_id = $request->top_id;
        $post->title = $request->title;
        $post->type = 'post';
        $post->slug = Str::slug($post->title = $request->title, '-');
        $post->detail = $request->detail;
        $post->metakey = $request->metakey;
        $post->metadesc = $request->metadesc;
        $post->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $post->created_by = $user_name;
        $post->status = $request->status;
        if ($post->save()) {
            //upload image nhieu anh
            if ($request->has('image')) {
                $path_dir = "images/post/";
                $array_file =  $request->file('image');
                $i = 1;
                foreach ($array_file as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = $post->slug . "-" . $i . '.' . $extension;
                    $file->move($path_dir, $filename);
                    //echo $filename;
                    $post_image = new PostImage();
                    $post_image->post_id = $post->id;
                    $post_image->image = $filename;
                    $post_image->save();
                    $i++;
                }  
                return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => 'Thêm bài viết thành công!']);
            }   
        }
      return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm bài viết không thành công!']);
    }

    /**
     * Display the specified resource.
     */
     #GET:admin/post/status/{id}
    public function status($id)
    {
        $user_name = Auth::user()->name;
        $post = post::find($id);
        if ($post == null) {
            return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $post->status = ($post->status == 1) ? 2 : 1;
        $post->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $post->updated_by = $user_name;
        $post->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }



    public function show(string $id)
    {
        $user_name = Auth::user()->name;
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            return view('backend.post.show', compact('post','user_name'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user_name = Auth::user()->name;
        $post = Post::find($id);
        $list_topic =Topic::where('status', '!=', 0)->get();
        $html_topic_id = '';
        foreach ($list_topic as $item) {
            $html_topic_id .= '<option value="' . $item->id . '">' . $item->title . '</option>';
        }
        return view('backend.post.edit', compact('post','user_name','html_topic_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, string $id)
    {
        $user_name = Auth::user()->name;
        $post = Post::find($id);
        $post->top_id = $request->top_id;
        $post->title = $request->title;
        $post->type = 'post';
        $post->slug = Str::slug($post->title = $request->title, '-');
        $post->detail = $request->detail;
        $post->metakey = $request->metakey;
        $post->metadesc = $request->metadesc;
        $post->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $post->updated_by = $user_name;
        $post->status = $request->status;
        if ($post->save()) {
            //upload image nhieu anh
            if ($request->has('image')) {
                $path_dir = "images/post/";
                if (File::exists(($path_dir . $array_file))) {
                    File::delete(($path_dir . $array_file));
                }
                $array_file =  $request->file('image');
                $i = 1;
                foreach ($array_file as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = $post->slug . "-" . $i . '.' . $extension;
                    $file->move($path_dir, $filename);
                    //echo $filename;
                    $post_image = new PostImage();
                    $post_image->post_id = $post->id;
                    $post_image->image = $filename;
                    $post_image->save();
                    $i++;
                }       
            }   
            return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật bài viết thành công!']);
        }
        return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Cập nhật bài viết không thành công!']);
    }
    /**
     * Remove the specified resource from storage.
     */
    #GET:admin/post/delete/{id}
    public function delete($id)
    {
        $user_name = Auth::user()->name;
        $post = post::find($id);
        if ($post == null) {
            return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $post->status = 0;
        $post->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $post->updated_by = $user_name;
        $post->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/post/restore/{id}
    public function restore($id)
    {
        $user_name = Auth::user()->name;
        $post = post::find($id);
        if ($post == null) {
            return redirect()->route('post.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $post->status = 2;
        $post->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $post->updated_by = $user_name;
        $post->save();
        return redirect()->route('post.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
