<?php

namespace App\Http\Controllers;

use App\Models\ReceiptStudent;
use App\Repo\ReceiptStudentsRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentController extends Controller
{
    protected $Receipt;

    public function __construct(ReceiptStudentsRepositoryInterface $Receipt)
    {
        $this->Receipt = $Receipt;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  $this->Receipt->index();
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
        return  $this->Receipt->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReceiptStudent  $receiptStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  $this->Receipt->show($id);
    }


    public function edit($id)
    {
        return  $this->Receipt->edit($id);
    }


    public function update(Request $request)
    {
        return  $this->Receipt->update($request);
    }


    public function destroy(Request $request)
    {
        return  $this->Receipt->destroy($request);
    }
}
