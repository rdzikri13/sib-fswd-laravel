<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function getAllUsers()
    {
        $data = User::all();
        return view('staff.user.index',compact('data'));
    }

    public function getUser()
    {
        $data = User::all()->where('role','user');
        return view('staff.user.user',compact('data'));
    }
    public function getStaff()
    {
        $data = User::all()->where('role','staff');
        return view('staff.user.staff',compact('data'));
    }
    public function getAdmin()
    {
        $data = User::all()->where('role','admin');
        return view('staff.user.admin',compact('data'));
    }
    public function showUsers(string $id)
    {
        $data = User::find($id);
        return view('staff.user.detail',compact('data'));
    }
    public function showProducts(string $id)
    {
        $data = Products::find($id);
        $cat = DB::table('categories')->where('categories.id', $data->categories_id)->first();
        return view('staff.produk.detail',compact('data','cat'));
    }

    public function getProducts()
    {
        $data = DB::table('products')
            ->join('categories','products.categories_id','=','categories.id')
            ->select('products.*','categories.name as categories_name')->get();
        return view('staff.produk.product')->with('data', $data);
    }
    public function getCategory()
    {
        $data = Categories::all();
        return view('staff.kategori.kategori',compact('data'));
    }

    public function showCategory(string $id)
    {
        $data = DB::table('products')
            ->join('categories','products.categories_id','=','categories.id')
            ->where('categories_id','=',$id)
            ->select('products.*','categories.name as categories_name')->get();
        return view('staff.kategori.detail',compact('data'));
    }

    public function showSlider(string $id)
    {
        $data = Slider::find($id);
        return view('staff.slider.detail',compact('data'));
    }

    public function getSlider()
    {
        $data = Slider::all();
        return view('staff.slider.slider',compact('data'));
    }
}