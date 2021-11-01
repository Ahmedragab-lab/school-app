<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeesRequest;
use App\Models\Fee;
use App\Repo\FeesInterface;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    protected $fees;
    public function __construct(FeesInterface $fees)
    {
      $this->fees = $fees;
    }
    public function index()
    {
        return $this->fees->index();
    }

   
    public function create()
    {
        return $this->fees->create();
    }


    public function store(StoreFeesRequest $request)
    {
        return $this->fees->store($request);
    }


    public function show(Fee $fee)
    {
        //
    }


    public function edit($id)
    {
        return $this->fees->edit($id);
    }


    public function update(StoreFeesRequest $request)
    {
        return $this->fees->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->fees->destroy($request);
    }
}
