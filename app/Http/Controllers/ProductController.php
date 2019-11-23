<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use Auth;
use Cart;
use Session;

class ProductController extends Controller

{
  //Product
  public function showProduct()
  {
    $products = Product::where('status', 2)->get();
    $high = Product::where('status', '2')->where('type', '1')->take(6)->get();
    $mid = Product::where('status', '2')->where('type', '2')->take(6)->get();
    $low = Product::where('status', '2')->where('type', '3')->take(6)->get();
    $milk = Product::where('status', '2')->where('type', '4')->take(6)->get();
    return view('products.archiveProduct', compact('products', 'high', 'mid', 'low', 'milk'));
  }

  public function getProduct($id)
  {
    $product = Product::where('slug', $id)->first();
    $type = ProductType::where('id', $product->type)->first();
    $products = Product::where('type', $product->type)->where('id', '!=', $product->id)->get();

    if (!(Session::get('id') == $id)) {
      Product::where('id', $product->id)->increment('view_count');
      return view('products.product_detail', compact('product', 'products', 'type'));
      Session::put('id', $id);
    }
  }

  public function High_Product()
  {
    // $cook = Cooking::all();
    $type = ProductType::all();
    $products = Product::where('status', 2)->where('type', 1)->paginate(9);
    return view('products.high_product_all', compact('products', 'type'));
  }

  public function Medium_Product()
  {
    // $cook = Cooking::all();
    $type = ProductType::all();
    $products = Product::where('status', 2)->where('type', 2)->paginate(9);
    return view('products.medium_product', compact('products', 'type'));
  }

  public function Low_Product()
  {
    // $cook = Cooking::all();
    $type = ProductType::all();
    $products = Product::where('status', 2)->where('type', 3)->paginate(9);
    return view('products.low_product', compact('products', 'type'));
  }

  public function Milk_Product()
  {

    // $cook = Cooking::all()->toArray();
    $type = ProductType::all();
    $product = Product::where('status', 2)->where('type', 4)->first();
    $products = Product::where('id', '!=', $product->id)->get();
    return view('products.milk', compact('products', 'product', 'type'));
  }

  public function Filter_Product(Request $req)
  {
    $type = ProductType::all();
    if ($req->id == 2) {

      $products = Product::where('status', 'LIKE', 'PUBLISHED')

        ->where('cost', '<', 2000000)

        ->paginate(9);

      return view(
        'products.archiveProduct',

        compact('products', 'type')
      );
    } else if ($req->id == 3) {

      $products = Product::where('status', 'LIKE', 'PUBLISHED')

        ->where('cost', '>=', 2000000)->orWhere('cost', '<=', 4000000)

        ->paginate(9);

      return view(
        'products.archiveProduct',

        compact('products', 'type')
      );
    } else if ($req->id == 4) {

      $products = Product::where('status', 'LIKE', 'PUBLISHED')

        ->where('cost', '>=', 4000000)

        ->paginate(9);

      return view(
        'products.archiveProduct',

        compact('products', 'type')
      );
    }
  }

  // xử lý rating
  public function ratingProduct(Request $request)
  {
    if (Auth::check()) {
      // request()->validate(['rate' => 'required']);
      $pro = Product::find($request->id);

      $rating = new \willvincent\Rateable\Rating;
      $rating->rating = $request->rate;
      $rating->user_id = Auth::id();
      $pro->ratings()->save($rating);

      return redirect()->back();
    } else {
      return redirect()->route('login');
    }
  }

  public function ajaxData(Request $request)
  {
    $weight = $request->weight;
    $price = $request->unit_price;
    $number = $request->number;
    if ($weight == 1) {
      $result = ($price / 1000 * $number) * 250;
    } else if ($weight == 2) {
      $result = ($price / 1000 * $number) * 500;
    } else {
      $result =  $price * $number;
    }
    $kq = number_format($result, 0);
    echo '<span class="money">Tổng giá : ' . $kq . '₫</span>';
  }
}
