<?php

namespace App\Http\Controllers;


class PublicController extends Controller
{
    //

    public function index()
    {
        return view('public.index');
    }

    public function about()
    {
        return view('public.about');
    }

    public function services()
    {
        return view('public.services');
    }

    public function doctors()
    {
        return view('public.doctors');
    }

    public function blogs()
    {
        return view('public.blogs');
    }

    public function blog()
    {
        return view('public.blog');
    }

    public function contact()
    {
        return view('public.contact');
    }
}
