<?php

namespace App\Http\Controllers;

use App\Contact;
use App\NewLetter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\MailContact;
use App\Mail\MailNews;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function postContact(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email',
                'cusname' => 'min:4|max:50',
                'phone' => 'min:2|max:10'
            ],
            [
                'email.required' => 'Please input your email address',
                'email.email' => 'Wrong email format',
                'cusname.min' => 'Name is to short',
                'cusname.max' => 'Maximum length is 50 character',
                'phone.min' => 'Phone is to short',
                'phone.max' => 'Maximum length is 10 character',
            ]
        );

        $contact = new Contact();
        $contact->name = $req->cusname;
        $contact->email = $req->email;
        $contact->subject = $req->subject;
        $contact->phone = $req->phone;
        $contact->content = $req->content;
        $contact->save();

        Mail::to('chuongphong12@gmail.com')->send(new MailContact($contact));
        Alert::success('Congratulation', 'Your message has been sent to the customer service department');
        return redirect()->back();
    }

    public function postNewLetter(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email',
            ],
            [
                'email.required' => 'Please provide your email',
                'email.email' => 'Wrong format'
            ]
        );
        if (NewLetter::where('email', '=', $req->email)->exists()) {
            Alert::success('Congratulation', 'You are already registered!');
            return redirect()->back();
        } else {
            $news = new NewLetter();
            $news->email = $req->email;
            $news->save();

            Mail::to('chuongphong12@gmail.com')->send(new MailNews($news));
            Alert::success('Congratulation', 'Thank you for your registration!');
            return redirect()->back();
        }
    }
}
