<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index()
    {
        $data = Products::all();

        return new DataResource(true,'Data berhasil diambil',$data);
    }

    public function show($id)
    {
        $data = Products::find($id);
        return new DataResource(true,'Data berhasil dilihat',$data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'categories_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'condition_scale' => 'required',
            'qty' => 'required',
            'year' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        $avatar = $request->file('img');
        $avatar->storeAs('public/products',$avatar->hashName());

        // $id = $request->user_id;

        $data = Products::create([
            'img' => $avatar->hashName(),
            'categories_id' => $request->categories_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            // 'is_best' => $request->is_best,
            'qty' => $request->qty,
            'condition_scale' => $request->condition_scale,
            'year' => $request->year,
            'created_by' => $request->created_by,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return new DataResource(true,'Data berhasil ditambahkan', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'img' => 'image|mimes:jpg,jpeg,png|max:2048',
            'categories_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'condition_scale' => 'required',
            'qty' => 'required',
            'year' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        $products = Products::findOrFail($id);

        if ($request->status == "accepted") {
            $id = $request->user_id;

            $products->update([
                // 'img' => $avatar->hashName(),
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'is_best' => $request->is_best,
                'qty' => $request->qty,
                'categories_id' => $request->categories_id,
                'condition_scale' => $request->condition_scale,
                'year' => $request->year,
                'status' => $request->status,
                'verified_by' => $id,
                'verified_at' => now(),
                'updated_at' => now(),
            ]);
        } elseif ($request->hasFile('img') && $request->status == "accepted") {
            $avatar = $request->file('img');
            $avatar->storeAs('public/products',$avatar->hashName());

            Storage::delete('public/products/'.$products->avatar);

            $id = $request->user_id;

            $products->update([
                'img' => $avatar->hashName(),
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'is_best' => $request->is_best,
                'qty' => $request->qty,
                'categories_id' => $request->categories_id,
                'condition_scale' => $request->condition_scale,
                'year' => $request->year,
                'status' => $request->status,
                'verified_by' => $id,
                'verified_at' => now(),
                'updated_at' => now(),
            ]);
        }
        else{
            $products->update([
                // 'avatar' => $avatar->hashName(),
                // 'img' => $avatar->hashName(),
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'is_best' => $request->is_best,
                'qty' => $request->qty,
                'categories_id' => $request->categories_id,
                'condition_scale' => $request->condition_scale,
                'year' => $request->year,
                'status' => $request->status,
                'updated_at' => now(),
            ]);
        }
        return new DataResource(true,'Data berhasil diubah',$products);
    }

    public function destroy($id)
    {
        //get post by ID
        $products = Products::findOrFail($id);

        //delete image
        Storage::delete('public/products/'. $products->img);

        //delete post
        $products->delete();

        //redirect to index
        return new DataResource(true,'Data berhasil dihapus',null);
    }
}