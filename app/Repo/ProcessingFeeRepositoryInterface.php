<?php


namespace App\Repo;


interface ProcessingFeeRepositoryInterface
{
    public function index();

    public function show($id);

    public function edit($id);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
