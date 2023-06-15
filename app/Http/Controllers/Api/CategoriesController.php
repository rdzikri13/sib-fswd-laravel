<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = Categories::all();
        return new DataResource(true,'Data berhasil diambil',$data);
    }

    public function show($id)
    {
        $data = Categories::find($id);
        return new DataResource(true,'Data berhasil dilihat',$data);
    }

    public function store(Request $request)
    {
        $validator= Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        $data = Categories::create([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return new DataResource(true,'Data berhasil ditambahkan',$data);
    }

    public function update(Request $request,$id)
    {
        $validator= Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $products = Categories::findOrFail($id);

        $products->update([
            'name' => $request->name,
            'updated_at' => now(),
        ]);

        return new DataResource(true,'Data berhasil diubah' ,$products);
    }

    public function destroy($id)
    {
        Categories::findOrFail($id)->delete();

        return new DataResource(true,'Data berhasil dihapus' ,null);
    }
}