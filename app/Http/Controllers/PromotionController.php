<?php

namespace App\Http\Controllers;

use App\Repo\PromotionInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    protected $Promotion;
    public function __construct(PromotionInterface $Promotion)
    {
       $this->Promotion = $Promotion;
    }

    public function index()
    {
        return $this->Promotion->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
