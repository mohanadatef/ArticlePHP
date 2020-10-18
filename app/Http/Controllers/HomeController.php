<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function sendFeedback()
    {
        $comment = 'Hi, This test feedback.';
        $toEmail = "mohanad.atef@fekretyonline.com";
        Mail::to($toEmail)->send(new FeedbackMail($comment));

        return 'Email has been sent to '. $toEmail;
    }

}
