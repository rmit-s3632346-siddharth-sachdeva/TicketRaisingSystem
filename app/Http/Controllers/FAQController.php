<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function getFAQPage(){
        return view('main.faqs');
    }
}
