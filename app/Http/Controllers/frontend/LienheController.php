<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;

class LienheController extends Controller
{
   

    public function getcontact(){
        return view ('frontend.contact.index');
    }

    public function postcontact(Request $request){
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->title = $request->title;
        $contact->status = 1;
        $contact->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $contact->created_by = 1;
        $contact->save();
        return view ('frontend.contact.index');
    }
}
