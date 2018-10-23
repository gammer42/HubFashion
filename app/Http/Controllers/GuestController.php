<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function registration()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function about()
    {
        return view('about');
    }

    public function blog()
    {
        return view('blog');
    }

    public function boy()
    {
        return view('boy');
    }

    public function boys()
    {
        return view('boys');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function contact()
    {
        return view('contact');
    }

    public function faq()
    {
        return view('faq');
    }

    public function girl()
    {
        return view('girl');
    }

    public function girls()
    {
        return view('girls');
    }

    public function men()
    {
        return view('men');
    }

    public function mens()
    {
        return view('mens');
    }

    public function payment()
    {
        return view('payment');
    }

    public function shop()
    {
        return view('shop');
    }

    public function blog_single()
    {
        return view('single');
    }

    public function women()
    {
        return view('women');
    }

    public function womens()
    {
        return view('womens');
    }

}
