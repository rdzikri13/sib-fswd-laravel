<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return new DataResource(true,'Data berhasil diambil',$data);
    }

    public function show($id)
    {
        $data = User::find($id);
        return new DataResource(true,'Data berhasil dilihat',$data);
    }

    public function store(Request $request)
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
            return response()->json($validator->errors(),422);
        }

        $avatar = $request->file('avatar');
        $avatar->storeAs('public/avatar',$avatar->hashName());

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password,
            'role' => $request->role,
            'avatar' => $avatar->hashName(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return new DataResource(true,'Data berhasil diambil',$data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'avatar' => 'image|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        $user = User::find($id);

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
            // return new DataResource(true,'Data berhasil diubah',$user);
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
        // return view('api.data',compact($user));
        return new DataResource(true,'Data berhasil diubah',$user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        //delete image
        Storage::delete('public/avatar/'. $user->avatar);

        //delete post
        $user->delete();

        return new DataResource(true,'Data berhasil dihapus',null);
    }
}