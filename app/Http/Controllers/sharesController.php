<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sharesController extends Controller
{
  public function store(Request $request, $id)
    {
        \Auth::user()->share($id);
        return back();
    }

    public function destroy($id)
    {
        \Auth::user()->unshare($id);
        return back();
    }
}
