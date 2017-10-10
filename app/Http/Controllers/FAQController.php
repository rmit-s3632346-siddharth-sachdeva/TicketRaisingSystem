<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    //returning FAQ view page.
    public function getFAQPage(){
        return view('main.faqs');
    }
}
