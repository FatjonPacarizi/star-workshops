<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class ContactController extends Controller
{
    function index()
    {
        return view('contactForm');
    }
    function send(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        require 'vendor/autoload.php';
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = env('EMAIL_HOST');
        $mail->SMTPAuth   = true;
        $mail->Username   = env('EMAIL_USERNAME');
        $mail->Password   = env('EMAIL_PASSWORD');
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->setFrom($email, $name);
        $mail->addAddress('almirpinduk@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $dt = $mail->send();
        if ($dt) {
            echo 'Message has been sent';
        } else {
            echo 'Something went wrong';
        }
    }
}
