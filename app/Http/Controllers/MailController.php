<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MailController extends Controller
{

    function send(MailRequest $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
        ]);

        if ($this->isonline()) {
            $mail_data = [
                'recipient' => 'gs46387@ubt-uni.net',
                'fromEmail' => $request->email,
                'fromName' => $request->name,
                'subject' => $request->subject,
                'body' => $request->message
            ];
            \Mail::send('email-template', $mail_data, function ($message) use ($mail_data) {
                $message->to($mail_data['recipient'])
                    ->from($mail_data["fromEmail"], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
            });
            return redirect()->back()->with('success', 'Email sent');
        } else {
            return redirect()->back()->withInput()->with('error', 'Check your internet connection');
        }
    }

    public function isOnline($site = "https://www.starlabs.dev/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }
}
