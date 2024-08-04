<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    // Query builder
    $query = Invoice::with('client');

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('invoice_number', 'like', '%' . $search . '%')
              ->orWhereHas('client', function($query) use ($search) {
                  $query->where('name', 'like', '%' . $search . '%');
              });
        });
    }

    $invoices = $query->paginate(10); 

    return view('invoices.index', compact('invoices'));
}


    public function create()
    {
        $clients = Client::all();
        return view('invoices.create', compact('clients'));
    }

    public function store(StoreInvoiceRequest $request)
    {
        $client = Client::find($request->client_id);

        $invoiceData = $request->except('items');
        $invoiceData['client_name'] = $client ? $client->name : null;

        $invoice = Invoice::create($invoiceData);

        foreach ($request->items as $item) {
            $invoice->items()->create($item);
        }

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice created successfully');
    }

    public function show(Invoice $invoice)
    {
        $invoice = Invoice::with('client')->findOrFail($invoice->id);
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $clients = Client::all();
        return view('invoices.edit', compact('invoice', 'clients'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoiceData = $request->except('items');
        $invoiceData['client_id'] = $request->client_id;

        $invoice->update($invoiceData);

        $invoice->items()->delete();
        foreach ($request->items as $item) {
            $invoice->items()->create($item);
        }

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice updated successfully');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoices.index');
    }

    public function downloadPdf($id)
    {
        $invoice = Invoice::with('client', 'items')->findOrFail($id);
        $pdf = FacadePdf::loadView('pdf.invoice', ['invoice' => $invoice]);
        return $pdf->download('invoice_' . $invoice->invoice_number . '.pdf');
    }
}
