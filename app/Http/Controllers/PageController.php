<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Banner;
use Auth;
use Cart;
use DB;

class PageController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 2)->get();
        $slide = Banner::all();
        return view('pages.index', compact('slide', 'products'));
    }

    public function Contact()
    {
        return view('pages.contact');
    }

    public function About()
    {
        $page = DB::table('pages')->where('slug', 'LIKE', 'lich-su-hinh-thanh-va-phat-trien')->first();
        return view('pages.page', compact('page'));
    }

    public function search(Request $req)
    {
        $products = Product::where('name', 'LIKE', "%$req->search%")->where('status', 2)->orderBy('name', 'ASC')->paginate(9);
        $type = ProductType::all();
        // $cook = Cooking::all();
        return view('products.search-result', compact('products', 'type'));
    }

    //Logout
    public function getLogout()
    {
        Auth::logout();
        Cart::destroy();
        return redirect()->route('trang-chu');
    }
}
