<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

class AdminController extends Controller
{
   public function admin_dashboard()
   {
      $invoices = Invoice::all();
      return view('admin.index', compact('invoices'));
   }
}
