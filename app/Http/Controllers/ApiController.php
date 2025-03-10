<?php

namespace App\Http\Controllers;

use App\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    //
    public function sendEmail(Request $request) {
        $request->validate([
            'recipient' => 'required|email',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'contact_info' => 'string|nullable',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,ppt,pptx|max:5120'
        ]);
        
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        }

        // Send the email
        if ($attachmentPath) {
            Mail::to($request->recipient)->send(new Mailer($request->subject, $request->body, $request->contact_info, './storage/' . $attachmentPath));
        } else {
            Mail::to($request->recipient)->send(new Mailer($request->subject, $request->body, $request->contact_info));
        }

        return response()->json([
            'message' => 'Email sent successfully!',
            'status' =>'success'
        ], 201);
    }
}
