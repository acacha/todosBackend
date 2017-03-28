<?php

namespace Acacha\TodosBackend\Http\Controllers;

use Acacha\TodosBackend\Events\MessageSent;
use Acacha\TodosBackend\Notifications\MessageSent as MessageSentNotification;
use Acacha\TodosBackend\Message;
use Auth;
use Illuminate\Http\Request;

/**
 * Class MessagesController.
 *
 * @package Acacha\TodosBackend\Http\Controllers
 */
class MessagesController extends TodosBaseController
{
    //
    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        return view('messages',$data);
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     *
     * @return array
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        //Broadcast

        broadcast(new MessageSent($user,$message))->toOthers();


        $user->notify(new MessageSentNotification($user,$message));

        return ['status' => 'Message Sent!'];
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        //Lazy loading -> Eager Loading
        return Message::with('user')->get();
    }
}
