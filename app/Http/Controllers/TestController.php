<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
        use App\Models\Salersend;
use App\Models\Debt;
class TestController extends Controller
{
    //
    public function testing(){


 return view('registration.test');
}
}
