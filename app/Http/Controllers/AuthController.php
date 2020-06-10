<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index()
   {
           if (Auth::user()->is_admin) {
               return redirect('/admin/products');
           } else {
               return redirect('/customer/products');
           }
       
   }
}
