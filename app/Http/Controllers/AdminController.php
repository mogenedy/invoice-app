<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

class AdminController extends Controller
{
   public function adminDashboard()
   {
      $invoices = Invoice::all();
      return view('invoices.index', compact('invoices'));
   }
}
