<?php

namespace App\Http\Controllers;

use App\Models\ProcessingFee;
use App\Repo\ProcessingFeeRepositoryInterface;
use Illuminate\Http\Request;

class ProcessingFeeController extends Controller
{
    protected $Processing;

    public function __construct(ProcessingFeeRepositoryInterface $Processing)
    {
        $this->Processing = $Processing;
    }
    public function index()
    {
        return $this->Processing->index();
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
        return $this->Processing->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcessingFee  $processingFee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->Processing->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProcessingFee  $processingFee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->Processing->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProcessingFee  $processingFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->Processing->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcessingFee  $processingFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Processing->destroy($request);
    }
}
