<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

interface ConsultationInterface
{
    public function show();
    public function find($id);
    public function create();
    public function store(Request $request);
    public function edit($id);
    public function update($id);
    public function delete($id);
}