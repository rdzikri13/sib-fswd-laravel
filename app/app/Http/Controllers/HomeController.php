<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $products = DB::table('products')
            ->join('categories','products.categories_id','=','categories.id')
            ->select('products.*','categories.name as categories_name')
            ->where('is_best',1)->get();
            $slider = DB::table('sliders')->where('is_active',1)->get();
            return view('landing',compact('products','slider'));
        }
        return redirect()->route('login')->with(['message'=>'Please Login to Access Dashboard']);
    }

    public function showDashboard()
    {
        $products = Products::all();
        return view('dashboard.index',compact('products'));
    }

    public function showAdmin()
    {
        $admin = User::all()->where('role', '=','admin');

        return view('dashboard.admin',compact('admin'));
    }

    public function showStaff()
    {
        $staff = User::all()->where('role', '=','staff');

        return view('dashboard.staff',compact('staff'));
    }
    public function showUser()
    {
        $users = User::all()->where('role', '=','user');

        return view('dashboard.users',compact('users'));
    }
    public function showUsers()
    {
        $users = User::all();

        return view('dashboard.users',compact('users'));
    }

    public function showProducts()
    {
        $product = DB::table('products')
        ->join('categories','products.categories_id','=','categories.id')
        ->select('products.*','categories.name as categories_name')->get();
        return view('dashboard.produk',compact('product'));
    }

    public function detailProducts(string $id)
    {
        $data = Products::findOrFail($id);
        $cat = Categories::all()->where('id',$data->categories_id)->first;
        return view('details',compact('data','cat'));
    }

    public function getProducts()
    {
        $products = DB::table('products')
        ->join('categories','products.categories_id','=','categories.id')
        ->select('products.*','categories.name as categories_name')
        ->where('status','accepted')->get();

        // $max = DB::table('products')->select('price')->orderBy('price','desc')->first();
        $data = DB::table('products')->select(\DB::raw('MIN(price) AS min_price, MAX(price) AS max_price'))->get();
        // dd($data);
        return view('product',compact('products','data'));
        // return view('product');
    }
    
    function search(Request $request)
    {
        $query = $_GET['search'];
        
        $products = Products::where('name','LIKE','%'.$query.'%')->get();
        // $cat = Categories::all()->where('id',$products->categories_id);

        $data = DB::table('products')->select(\DB::raw('MIN(price) AS min_price, MAX(price) AS max_price'))->get();
        // dd($products);
        return view('product',compact('products','data'));
    }

    public function price(Request $request)
    {
        $products = Products::whereBetween('price',[$request->price, $request->max])->get();
        $data = DB::table('products')->select(\DB::raw('MIN(price) AS min_price, MAX(price) AS max_price'))->get();
        return view('product',compact('products','data'))->render();
    }
}