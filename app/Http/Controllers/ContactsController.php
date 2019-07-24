<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;

class ContactsController extends Controller
{
    //
    public function get(){

        $contacts = User::all();
        return response()->json($contacts);
    }
    public function getMessagesFor($id){

        $messages = Message::where('from', $id)->orWhere('to',$id)->get();
        return response()->json($messages);
    }
    // send messages
    public function send(Request $req){

    	$newMessage = Message::create([
    		'from' => auth()->id(),
    		'to' =>  $req->contact_id,
    		'text' =>  $req->text,
    	]);
        return response()->json($newMessage);
    }
}
