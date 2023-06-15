<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SliderController extends Controller
{
    public function index(){
        $data = Slider::all();
        return view('dashboard.slider.index')->with('data', $data);
    }

    public function create()
    {
        return view('dashboard.slider.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'title' => 'required',
            // 'url' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $avatar = $request->file('image');
        $avatar->storeAs('public/sliders',$avatar->hashName());

        Slider::create([
            'image' => $avatar->hashName(),
            'title' => $request->title,
            'url' => $request->url,
            'text' => $request->text,
            'is_active' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('slider.index')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function show(string $id): View
    {
        $data = Slider::all();

        return view('dashboard.slider.show')->with('data', $data);
    }
    public function edit(string $id): View
    {
        $data = Slider::findOrFail($id);

        return view('dashboard.slider.edit',compact('data'));
    }

    public function update(Request $request, $id): RedirectResponse
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
        return redirect()->route('slider.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $slider = Slider::findOrFail($id);
        Storage::delete('public/sliders/'. $slider->image);
        $slider->delete();
        //redirect to index
        return redirect()->route('slider.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}