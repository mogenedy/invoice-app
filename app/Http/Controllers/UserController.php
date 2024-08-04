<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_dashboard(){
        $invoices=Invoice::all();
        return view('user.index',compact('invoices'));
       
       }

       
    
}
