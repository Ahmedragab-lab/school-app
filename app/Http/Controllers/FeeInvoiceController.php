<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Fee_invoice;
use App\Repo\Fee_invoiceInterface;
use Illuminate\Http\Request;

class FeeInvoiceController extends Controller
{
    protected $fee_invoice;
    public function __construct(Fee_invoiceInterface $fee_invoice)
    {
       $this->fee_invoice = $fee_invoice;
    }
    public function index()
    {
        return $this->fee_invoice->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->fee_invoice->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fee_invoice  $fee_invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->fee_invoice->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fee_invoice  $fee_invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->fee_invoice->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fee_invoice  $fee_invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->fee_invoice->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fee_invoice  $fee_invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->fee_invoice->destroy($request);
    }
    public function get_amount($fee_id)
    {
        return $this->fee_invoice->get_amount($fee_id);

    }
}
