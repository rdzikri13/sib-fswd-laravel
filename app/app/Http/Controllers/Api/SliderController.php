<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index()
    {
        $data = Slider::all();
        return new DataResource(true,'Data berhasil diambil',$data);
    }

    public function show($id)
    {
        $data = Slider::find($id);
        return new DataResource(true,'Data berhasil dilihat',$data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'title' => 'required',
            // 'url' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        $avatar = $request->file('image');
        $avatar->storeAs('public/sliders',$avatar->hashName());

        $data = Slider::create([
            'image' => $avatar->hashName(),
            'title' => $request->title,
            'url' => $request->url,
            'text' => $request->text,
            'is_active' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return new DataResource(true,'Data berhasil ditambahkan',$data);
    }

    public function update(Request $request,$id)
    {
        $slider = Slider::findOrFail($id);

        if ($request->hasFile('image')) {
            $avatar = $request->file('image');
            $avatar->storeAs('public/sliders',$avatar->hashName());

            Storage::delete('public/sliders/'.$slider->avatar);

            $slider->update([
                'image' => $avatar->hashName(),
                'title' => $request->title,
                'text' => $request->text,
                'url' => $request->url,
                'is_active' => $request->is_active,
                'updated_at' => now(),
            ]);
        }else{
            $slider->update([
                'title' => $request->title,
                'text' => $request->text,
                'url' => $request->url,
                'is_active' => $request->is_active,
                'updated_at' => now(),
            ]);
        }

        return new DataResource(true,'Data berhasil diubah',$slider);
    }

    public function destroy($id)
    {
        //get post by ID
        $slider = Slider::findOrFail($id);
        Storage::delete('public/sliders/'. $slider->image);
        $slider->delete();
        //redirect to index
        return new DataResource(true,'Data berhasil dihapus',null);
    }
}