<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function delete_confirm()
    {
       return view('users.delete_confirm');
    }
     public function description()
    {
       return view('commons.description');
    }
}
