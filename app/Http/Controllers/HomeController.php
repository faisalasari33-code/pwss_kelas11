<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data['nama'] = 'Faisal asari';
        $data['role'] = 'Maksman';
        $data['products'] = [
            'hanabi',
            'Layla',
            'zilong',
            'Aluchard',
        ];
        return view('home', $data);
    }

    // public function about()
    // {
    //     return view('about');
    // }

    // public function contact()
    // {
    //     return view('contact');
    // }
}
