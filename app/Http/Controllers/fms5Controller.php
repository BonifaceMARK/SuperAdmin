<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fms5Controller extends Controller
{

    public function fms5payment()
    {


       return view ('finance5.payment');
    }

    public function fms5communication()
    {


       return view ('finance5.c&c');
    }

    public function fms5standards()
    {


       return view ('finance5.standards');
    }
}
