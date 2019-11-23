<?php

namespace App\Http\Controllers;

use App\Contact;
use App\NewLetter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\MailContact;
use App\Mail\MailNews;
use Illuminate\Support\Facades\Mail;

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
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Vui lòng nhập đúng định dạng',
                'cusname.min' => 'Họ tên quá ngắn',
                'cusname.max' => 'Họ tên tối đa 50 ký tự',
                'phone.min' => 'Số điện thoại quá ngắn',
                'phone.max' => 'Số điện thoại tối đa 10 ký tự',
            ]
        );

        $contact = new Contact();
        $contact->name = $req->cusname;
        $contact->email = $req->email;
        $contact->subject = $req->subject;
        $contact->phone = $req->phone;
        $contact->content = $req->content;
        $contact->save();

        // Mail::to('marketing@kobevietnam.com.vn')->send(new MailContact($contact));

        return redirect()->back()->with('success', 'Tin nhắn của bạn đã được gửi tới cho bộ phận chăm sóc khách hàng!!!');
    }

    public function postNewLetter(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email',
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Vui lòng nhập đúng định dạng'
            ]
        );
        if (NewLetter::where('email', '=', $req->email)->exists()) {
            return redirect()->back()->with('success', 'Bạn đã đăng ký!!');
        } else {
            $news = new NewLetter();
            $news->email = $req->email;
            $news->save();

            // Mail::to('marketing@kobevietnam.com.vn')->send(new MailNews($news));

            return redirect()->back()->with('success', 'Cảm ơn bạn đã đăng ký!!');
        }
    }
}
