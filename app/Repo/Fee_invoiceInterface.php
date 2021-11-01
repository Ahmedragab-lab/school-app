<?php
namespace App\Repo;

interface Fee_invoiceInterface{
    public function index();
    public function show($id);
    public function get_amount($fee_id);
    public function store($request);
    public function edit($id);
    public function update($request);
    public function destroy($request);


}
