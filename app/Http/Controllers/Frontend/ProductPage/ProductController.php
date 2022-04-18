<?php

namespace App\Http\Controllers\Frontend\ProductPage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index () {
        $products = Product::all();
//
//        $products = new Product();
//        if (isset($_GET['sort_by'])) {
//            if ($_GET['sort_by'] == 'tang_dan') {
//                $products = Product::orderBy('product_price', 'ASC')->paginate(12)->appends(\request()->query());
//            } else if ($_GET['sort_by'] == 'giam_dan') {
//                $products = Product::orderBy('product_price', 'DESC')->paginate(12)->appends(\request()->query());
//            } else if ($_GET['sort_by'] == 'a_z') {
//                $products = Product::orderBy('product_name', 'ASC')->paginate(12)->appends(\request()->query());
//            } else if ($_GET['sort_by'] == 'z_a') {
//                $products = Product::orderBy('product_name', 'DESC')->paginate(12)->appends(\request()->query());
//            } else if ($_GET['sort_by'] == 'newest') {
//                $products = Product::orderBy('created_at', 'ASC')->paginate(12)->appends(\request()->query());
//            } else if ($_GET['sort_by'] == 'oldest') {
//                $products = Product::orderBy('created_at', 'DESC')->paginate(12)->appends(\request()->query());
//            } else if ($_GET['sort_by'] == 'best_sell') {
//                $products = Product::orderBy('product_sale', 'ASC')->paginate(12)->appends(\request()->query());
//            }
//        } else {
//            $products = Product::paginate(10);
//        }

        if (isset($_GET['brand'])) {
            $products = $products->where('product_brand', $_GET['brand']);
        }

        if (isset($_GET['category'])) {
            $products = $products->where('category_id', $_GET['category']);
        }
        if (isset($_GET['price'])) {
            if ($_GET['price'] == 1) {
                $products = $products->where('product_price', '<', 100000);
            } else if ($_GET['price'] == 2) {
                $products = $products->where('product_price', '>=', 100000)->where('product_price', '<=', 500000);
            } else if ($_GET['price'] == 3) {
                $products = $products->where('product_price', '>=', 500000)->where('product_price', '<=', 1000000);
            } else if ($_GET['price'] == 4) {
                $products = $products->where('product_price', '>=', 1000000)->where('product_price', '<=', 2000000);
            } else if ($_GET['price'] == 5) {
                $products = $products->where('product_price', '>=', 2000000);
            }
        }
//        $products = $products->paginate(12)->appends(\request()->query());
//        dd($products);

        $brands = DB::table('products')->select('product_brand')->groupBy('product_brand')->get();
        $categories = Category::all();
        return view('frontend.product', compact('brands', 'products', 'categories'));
    }

    public function productDetail ($id) {
        $product = Product::find($id);
        return view('frontend.detailproduct', compact('product'));
    }

    public function productBrand ($brand) {
        $products = Product::where('product_brand', $brand)->paginate(12);
        return view('frontend.brandproduct');
    }
}
