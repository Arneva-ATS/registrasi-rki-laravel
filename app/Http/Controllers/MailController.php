<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendMail()
    {
        $details = [
            'title' => 'Mail from Code Copilot',
            'content' => 'This is for testing email using SMTP.'
        ];

        Mail::to('aditbest5@gmail.com')->send(new VerificationMail($details));

        return 'Email Sent';
    }
}
