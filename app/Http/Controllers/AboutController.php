<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
   public function store(ContactFormRequest $request)
  {

    \Mail::send('emails.contact',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function($message)
    {
        $message->from('wj@wjgilmore.com');
        $message->to('wj@wjgilmore.com', 'Admin')->subject('TODOParrot Feedback');
    });

  return \Redirect::route('contact')->with('message', 'Thanks for contacting us!');

  }
