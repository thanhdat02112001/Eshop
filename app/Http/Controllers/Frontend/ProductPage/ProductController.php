<?php

namespace App\Http\Controllers\Frontend\ProductPage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index () {
        $products = Product::all();

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
                $products = $products->where('product_price', '<', 1000000);
            } else if ($_GET['price'] == 2) {
                $products = $products->where('product_price', '>=', 1000000)->where('product_price', '<=', 5000000);
            } else if ($_GET['price'] == 3) {
                $products = $products->where('product_price', '>=', 5000000)->where('product_price', '<=', 10000000);
            } else if ($_GET['price'] == 4) {
                $products = $products->where('product_price', '>=', 10000000)->where('product_price', '<=', 20000000);
            } else if ($_GET['price'] == 5) {
                $products = $products->where('product_price', '>=', 20000000);
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
        $relatedProducts = Product::where("category_id", $product->category_id)->paginate(3);
        $comments = Comment::where('product_id', $id)->paginate(6);
        $customer = auth()->guard('customers')->user();
        return view('frontend.product_detail', compact('product', 'comments', 'customer', 'relatedProducts'));
    }

    public function productBrand ($brand) {
        $products = Product::where('product_brand', $brand)->paginate(12);
        return view('frontend.brandproduct');
    }

    public function rate (Request $request, $id) {
        $oldRate = Rate::where('customer_id', auth()->guard('customers')->user()->id)->where('product_id', $id)->first();
        $data = [
            'rate_number' => $request->star,
            'rate_content' => "rate",
            'customer_id' => auth()->guard('customers')->user()->id,
            'product_id' => $id
        ];

        if($oldRate) {
            $rate = Rate::find($oldRate->id);
            $rate->update($data);
        } else {
            Rate::create($data);
        }
        return redirect()->back()->with('success', 'Cảm ơn đánh giá của bạn!');
    }
}
