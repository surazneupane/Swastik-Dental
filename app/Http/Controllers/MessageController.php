<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function show(){
        return view('admin.messages.message', [
            'messages' => Message::all()
        ]);
    }
    public function more($id){
        return view('admin.messages.viewMessage',[
            'message'=>Message::find($id)
        ]);
    }

    public function delete(Message $message){
        $message->delete();
        return redirect('/')->with('message','Message Deleted Successfully');
    }
}
