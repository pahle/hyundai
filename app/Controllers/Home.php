<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('pages/home');
    }

    public function mobil(): string
    {
        return view('pages/daftarmobil');
    }

    public function promo(): string
    {
        return view('pages/daftarhargapromo');
    }

    public function kontak(): string
    {
        return view('pages/contact');
    }
}
