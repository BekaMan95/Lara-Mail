<?php

namespace App\Http\Controllers;

use App\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    //
    public function sendEmail(Request $request) {
        $request->validate([
            'recipient' => 'required|email',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Send the email
        Mail::to($request->recipient)->send(new Mailer($request->subject, $request->body, $request->contact_info));

        return back()->with('success', 'Email sent successfully!');
    }
}
