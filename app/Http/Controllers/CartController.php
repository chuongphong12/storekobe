<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use Session;
use URL;
use Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Product;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\District;
use App\Mail\MailOrder;
use App\Mail\OrderNoti;
use App\Province;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
  public function index()
  {
    Cart::setGlobalTax(0);
    $cart = Cart::content();
    $provinces = Province::all();
    Session::put('url.intended', URL::previous());
    return view('pages.cart', compact('provinces'));
  }

  public function addToQCart($id)
  {
    $pro = Product::find($id);
    if ($pro->type == 4) {
      Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->price, 'weight' => 1, 'options' => ['size' => 3]])->associate('App\Product');
    } else {
      Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->price, 'weight' => 1, 'options' => ['size' => 3]])->associate('App\Product');
    }
    Alert::toast('Success add to cart!', 'success');
    return redirect()->back();
  }

  //Thay weight bằng style
  public function addToCart(Request $req, $id)
  {
    $pro = Product::find($id);
    if ($req->weight == "") {
      return redirect()->back()->with('success', 'Chưa chọn số lượng!');
    } elseif ($req->weight == 1) {
      Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => $req->qty, 'price' => $pro->price / 4, 'weight' => 1, 'options' => ['size' => $req->weight]])->associate('App\Product');
    } elseif ($req->weight == 2) {
      Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => $req->qty, 'price' => $pro->price / 2, 'weight' => 1, 'options' => ['size' => $req->weight]])->associate('App\Product');
    } else {
      Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => $req->qty, 'price' => $pro->price, 'weight' => 1, 'options' => ['size' => $req->weight]])->associate('App\Product');
    }
    Alert::toast('Success add to cart!', 'success');
    return redirect()->back();
  }

  public function updateQty(Request $req, $id)
  {
    $rowId = $req->rowId;
    $qty = $req->qty;
    Cart::update($rowId, $qty);
  }

  public function updateStyle(Request $req, $rowId)
  {
    $weight = intval($req->style);
    Cart::update($rowId, ['weight' => $weight]);
    return redirect()->back();
  }

  public function removeItem($rowId)
  {
    Cart::remove($rowId);
    return redirect()->back();
  }

  public function getCheckout()
  {
    if (Auth::check() && Auth::user()->role_id == 1) {
      abort(404);
    } else {
      if (Auth::check()) {
        $user = Auth::user();
        $cus = Customer::where('name', $user->name)->first();
      }

      Cart::setGlobalTax(0);
      $cart = Cart::content();
      $provinces = Province::all();
      return view('pages.checkout', compact('cart', 'provinces', 'cus', 'user'));
    }
  }

  public function district($id)
  {
    $districts = District::where('provinceid', $id)->get();
    return response()->json($districts);
  }

  public function postCheckout(Request $req)
  {
    $this->validate(
      $req,
      [
        'name' => 'min:4',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'address' => 'required',
        'billing_provinces' => 'required',
        'billing_districts' => 'required',
      ],
      [
        'name.min' => 'Name to short',
        'email.required' => 'Please input your email',
        'email.email' => 'Please input correct format',
        'phone.required' => 'Please input your phone number',
        'phone.numeric' => 'Invalid number format',
        'address.required' => 'Please provide your address',
        'billing_provinces.required' => 'Please choose your province',
        'billing_districts.required' => 'Please choose your district',
      ]
    );

    if (Auth::check()) {
      $cus = Customer::where('user_id', Auth::user()->id)->first();
      $order = new Order;
      $order->customer_id = $cus->id;
      $order->name = $req->name;
      $order->payment = $req->payment_method;
      $order->status = 1;
      $order->total = Cart::total(0, '', '');
      $order->save();
    } else {
      $customer = new Customer;
      $customer->name = $req->name;
      $customer->email = $req->email;
      $customer->province = $req->billing_provinces;
      $customer->district = $req->billing_districts;
      $customer->address = $req->address;
      $customer->phone = $req->phone;
      $customer->save();

      $order = new Order;
      $order->customer_id = $customer->id;
      $order->name = $req->name;
      $order->payment = $req->payment_method;
      $order->status = 1;
      $order->total = Cart::total(0, '', '');
      $order->save();

      $cus = Customer::where('id', $customer->id)->first();
    }

    $bill_detail = null;
    foreach (Cart::content() as $key) {
      $bill_detail = new OrderDetail;
      $bill_detail->order_id = $order->id;
      $bill_detail->product_id = $key->id;
      $bill_detail->quantity = $key->qty;
      $bill_detail->weight = $key->options->size;
      $bill_detail->style = $key->weight;
      $bill_detail->unit_price = $key->price;
      $bill_detail->save();

      $product = Product::where('id', $key->id)->first();
      $product->store = $product->store - $key->qty;
      $product->save();
    }

    Mail::to($req->email)->send(new MailOrder($bill_detail));
    Mail::to('chuongphong12@gmail.com')->send(new OrderNoti($cus));
    Cart::destroy();
  }

  public function orderSuccess()
  {
    return view('pages.order-success');
  }
}
