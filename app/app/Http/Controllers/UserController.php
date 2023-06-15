<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::all();

        return view('dashboard.user.user')->with('data', $data);
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image|mimes:jpg,jpeg,png',
            'name' => 'required',
            'address' => 'required',
            'role' => 'required',
            // 'phone' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $avatar = $request->file('avatar');
        $avatar->storeAs('public/avatar',$avatar->hashName());

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password,
            'avatar' => $avatar->hashName(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $data = User::find($id);

        return view('dashboard.user.show')->with('data', $data);
    }
    public function edit(string $id): View
    {
        $data = User::findOrFail($id);

        return view('dashboard.user.edit',compact('data'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validator =  Validator::make($request->all(), [
            'avatar' => 'image|mimes:jpg,jpeg,png',
            // 'name' => 'required',
            // 'address' => 'required',
            // 'role' => 'required',
            // 'phone' => 'required',
            // 'password' => 'required',
            // 'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatar->storeAs('public/avatar',$avatar->hashName());

            Storage::delete('public/avatar/'.$user->avatar);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => $request->password,
                'avatar' => $avatar->hashName(),
                'updated_at' => now(),
            ]);
        }else{
            $user->update([
                // 'avatar' => $avatar->hashName(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => $request->password,
                'updated_at' => now(),
            ]);
        }
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $user = User::findOrFail($id);

        //delete image
        Storage::delete('public/avatar/'. $user->avatar);

        //delete post
        $user->delete();

        //redirect to index
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}