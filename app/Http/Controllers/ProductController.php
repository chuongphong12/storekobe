<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use Auth;
use Cart;
use Route;
use URL;
use Session;
use Voyager;

class ProductController extends Controller

{
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
    $type = ProductType::all();
    $products = Product::where('status', 2)->where('type', 1)->paginate(9);

    return view('products.high_product_all', compact('products', 'type'));
  }

  public function Medium_Product()
  {
    $type = ProductType::all();
    $products = Product::where('status', 2)->where('type', 2)->paginate(9);
    return view('products.medium_product', compact('products', 'type'));
  }

  public function Low_Product()
  {
    $type = ProductType::all();
    $products = Product::where('status', 2)->where('type', 3)->paginate(9);
    return view('products.low_product', compact('products', 'type'));
  }

  public function Milk_Product()
  {
    $type = ProductType::all();
    $product = Product::where('status', 2)->where('type', 4)->first();
    $products = Product::where('id', '!=', $product->id)->get();
    return view('products.milk', compact('products', 'product', 'type'));
  }

  public function Filter_Product(Request $req)
  {
    $type = ProductType::all();
    if ($req->id == 2) {
      $products = Product::where('status', 2)
        ->where('price', '<', 2000000)
        ->paginate(9);
      return view(
        'products.filterProduct',
        compact('products', 'type')
      );
    } else if ($req->id == 3) {
      $products = Product::where('status', 2)
        ->where('price', '>=', 2000000)->where('price', '<=', 4000000)
        ->paginate(9);
      return view(
        'products.filterProduct',
        compact('products', 'type')
      );
    } else if ($req->id == 4) {
      $products = Product::where('status', 2)
        ->where('price', '>=', 4000000)
        ->paginate(9);
      return view(
        'products.filterProduct',
        compact('products', 'type')
      );
    }
  }

  // Xử lý rating
  public function ratingProduct(Request $request)
  {
    if (Auth::check()) {
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
    echo '<span class="money">Total : ' . $kq . '₫</span>';
  }

  public function ajaxOrder($id)
  {
    $high = "http://localhost/storekobe/public/high";
    $medium = "http://localhost/storekobe/public/medium";
    $common = "http://localhost/storekobe/public/common";
    Session::put('url.intended', URL::previous());

    if (URL::previous() == $high) {
      if ($id == 1) {
        $products = Product::where('status', 2)->where('type', 1)->orderBy('name', 'ASC')->get();
      } elseif ($id == 2) {
        $products = Product::where('status', 2)->where('type', 1)->orderBy('name', 'DESC')->get();
      } elseif ($id == 3) {
        $products = Product::where('status', 2)->where('type', 1)->orderBy('price', 'ASC')->get();
      } elseif ($id == 4) {
        $products = Product::where('status', 2)->where('type', 1)->orderBy('price', 'DESC')->get();
      }
    } elseif (URL::previous() == $medium) {
      if ($id == 1) {
        $products = Product::where('status', 2)->where('type', 2)->orderBy('name', 'ASC')->get();
      } elseif ($id == 2) {
        $products = Product::where('status', 2)->where('type', 2)->orderBy('name', 'DESC')->get();
      } elseif ($id == 3) {
        $products = Product::where('status', 2)->where('type', 2)->orderBy('price', 'ASC')->get();
      } elseif ($id == 4) {
        $products = Product::where('status', 2)->where('type', 2)->orderBy('price', 'DESC')->get();
      }
    } elseif (URL::previous() == $common) {
      if ($id == 1) {
        $products = Product::where('status', 2)->where('type', 3)->orderBy('name', 'ASC')->get();
      } elseif ($id == 2) {
        $products = Product::where('status', 2)->where('type', 3)->orderBy('name', 'DESC')->get();
      } elseif ($id == 3) {
        $products = Product::where('status', 2)->where('type', 3)->orderBy('price', 'ASC')->get();
      } elseif ($id == 4) {
        $products = Product::where('status', 2)->where('type', 3)->orderBy('price', 'DESC')->get();
      }
    }

    foreach ($products as $product) {
      ?>
      <div class="col-xl-4 col-sm-6 mb--50">
        <div class="ft-product">
          <div class="product-inner">
            <div class="product-image">
              <figure class="product-image--holder">
                <img src="<?php echo Voyager::image($product->image) ?>" alt="Product" />
              </figure>
              <figure class="product-image--replace">
                <img src="<?php echo Voyager::image($product->image) ?>" alt="Product" />
              </figure>
              <a href="<?php echo route('product', $product->slug) ?>" class="product-overlay"></a>
              <div class="product-action">
                <a data-toggle="modal" data-target="#<?php echo $product->slug ?>" class="action-btn d-none d-sm-none d-md-block">
                  <i class="fa fa-eye"></i>
                </a>
              </div>
            </div>
            <div class="product-info">
              <h3 class="product-title">
                <a href="<?php echo route('product', $product->slug) ?>"><?php echo $product->name ?></a>
              </h3>
              <div class="product-info-bottom">
                <div class="product-price-wrapper">
                  <span class="money"><?php echo number_format($product->price, 0) ?>₫/kg</span>
                </div>
                <?php if ($product->store > 0) { ?>
                  <a href="<?php echo route('cart.Qadd', $product->id) ?>" class="add-to-cart pr--15">
                    <i class="fa fa-plus"></i>
                    <span><i class="fa fa-shopping-cart"></i></span>
                  </a>
                <?php } else { ?>
                  <span>Out of stock</i></span>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="ft-product-list">
          <div class="product-inner">
            <figure class="product-image">
              <a href="product-details.html">
                <img src="<?php echo Voyager::image($product->image) ?>" alt="Products" />
              </a>
              <div class="product-thumbnail-action">
                <a data-toggle="modal" data-target="#<?php echo $product->slug ?>" class="action-btn quick-view">
                  <i class="fa fa-eye"></i>
                </a>
              </div>
            </figure>
            <div class="product-info">
              <h3 class="product-title mb--25">
                <a href="<?php echo route('product', $product->slug) ?>"><?php echo $product->name ?></a>
              </h3>
              <p class="unit-price"><?php echo number_format($product->price, 0) ?>₫/kg</p>
              <?php if ($product->store > 0) { ?>
                <p class="product--in-stock">In Stock</p>
                <div class="ft-product-action-list d-flex align-items-center">
                  <a href="<?php echo route('cart.Qadd', $product->id) ?>" class="btn btn-size-md">Add to cart</a>
                </div>
              <?php } else { ?>
                <p class="product--in-stock">Out of stock</p>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
<?php
    }
  }
}
