<?php

namespace App\Http\Controllers;

use App\Models\PaymentStudent;
use App\Repo\PaymentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentStudentController extends Controller
{
    protected $Payment;

    public function __construct(PaymentRepositoryInterface $Payment)
    {
        $this->Payment = $Payment;
    }
    public function index()
    {
        return $this->Payment->index();
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
        return $this->Payment->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentStudent  $paymentStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->Payment->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentStudent  $paymentStudent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->Payment->edit($id);
    }

    
    public function update(Request $request)
    {
        return $this->Payment->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Payment->destroy($request);
    }
}
