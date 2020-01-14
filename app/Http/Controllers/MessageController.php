<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //

    function index(Request $request)
    {
        $loggedUser = User::where('id', Auth::user()->getAuthIdentifier())->first();
        if ($loggedUser->isAdmin()) {
            $messages = Message::all();
            return view('admin.message_list', compact('messages'));
        } else {
            return view('auth.login');
        }

    }

    function store(Request $request)
    {

//        $this->validate($request, [
//            $request->email => 'required|email',
//            $request->name => 'required',
//            $request->subject => 'required',
//            $request->message => 'required'
//
//        ]);
        $message = new Message;
        $message->email = $request->email;
        $message->name = $request->name;
        $message->subject = $request->subject;
        //message content
        $message->message = $request->message;
        $message->save();
        return redirect('contact')->with('success', 'Message envoyé avec succès');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function destroy($id)
    {
        $message = Message::where('id', $id)->first();
        if ($message) {
            try {
                $message->delete();
            } catch (\Exception $e) {

            }
        }
        return redirect('messages');
    }
}
