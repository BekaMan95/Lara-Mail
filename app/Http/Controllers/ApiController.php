<?php

namespace App\Http\Controllers;

use App\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    //
    public function sendEmail(Request $request) {
        $request->validate([
            'recipient' => 'required|email',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'contact_info' => 'string|nullable'
        ]);
        
        
        // Send the email
        Mail::to($request->recipient)->send(new Mailer($request->subject, $request->body, $request->contact_info));

        return response()->json([
            'message' => 'Email sent successfully!',
            'status' =>'success'
        ], 201);
    }
}
