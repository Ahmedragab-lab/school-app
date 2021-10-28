<?php
namespace App\Repo;

interface GraduatedInterface{
    public function index();
    public function create();
    public function SofDelete($request);
    public function ReturnData($request);
    public function destroy($request);

}
