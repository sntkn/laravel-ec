<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class FormController extends Controller
{
    //
    public function input()
    {
        return view('form.input');
    }

    public function save()
    {
        return view('form.complete');
    }
}
