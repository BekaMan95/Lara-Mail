<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    //
    public function respond() {
        return response()->json([
            "message" => "Hey There!",
            "status" => "ok"
        ]);
    }

    public function mail(Request $request) {
        if (!$request->message || !$request->email) {
            return response()->json([
                'message' => 'message and email has to be valid!',
                'status'=>'failed'
            ], 500);
        }
        $emailContent = "Hello Customer!\n\n"
            . "Larabek Service Sent you the following message:\n\n"
            . "Message: $request->message\n\n\n\n"
            . "This email is sent from Larabek email service. If you didn't know this platform, please ignore this email.\n\n"
            . "Best regards,\n"
            . "Larabek";
        
        try {
            Mail::raw($emailContent, function ($message) use ($request) {
                $message->to($request->input('email'));
                $message->subject('Larabek Messages');
            });
        }
        catch (Exception $e) {
            return response()->json([
                "message" => $e->getMessage(),
                "status" => "failed"
            ], 204);
        }
        
        
        return response([
            'message' => 'Your E-mail has been sent! check you inbox.',
            'status'=>'success'
        ], 201);
    }
}
