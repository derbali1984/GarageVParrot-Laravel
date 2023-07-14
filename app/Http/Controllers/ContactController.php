<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{

    public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required|regex:/^[\pL\s\-]+$/u',
            'lastName' => 'required|regex:/^[\pL\s\-]+$/u',
            'tel' => 'required',
            'email' => 'required|email',
            'Message' => 'required|min:10'
        ]);

        $mailData = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'tel' => $request->tel,
            'email' => $request->email,
            'Message' => $request->Message,
            'subject' => $request->subject
        ];
        Mail::to($request->email)->send(new ContactMail($mailData));
        return back()->with('message', 'Votre message a été envoyé');
    }
}
