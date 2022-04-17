<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index () {
        $products = Product::paginate(10);
        return view('backend.product.listproduct', compact('products'));
    }

    public function create () {
        $categories = Category::all();
        return view('backend.product.addproduct', compact('categories'));
    }

    public function store (ProductRequest $request) {
        $product = [
            "product_code" => $request->code,
            "product_name" => $request->name,
            "product_price" => $request->price,
            "product_description" => $request->description,
            "product_status" => $request->state,
            'quantity' => $request->quantity,
            "category_id" => $request->category,
            "product_brand" => $request->brand,
        ];
        $product = Product::create($product);
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            for ($i = 0; $i <= count($images) - 1; $i++) {
                $filename = $images[$i]->getClientOriginalName();
                $images[$i]->storeAs('uploads', $filename, 'public');
                $images[$i]->move(public_path('uploads'), $filename);
                $imagesValue["image".($i + 1)] = $images[$i]->getClientOriginalName();
            }
            $imagesValue["total_image"] = count($images);
        }
        $product->image()->create($imagesValue);
        $request->session()->flash("success","thêm sản phầm thành công!");
        return redirect("/admin/product");
    }

    public function edit ($id) {
        $product = Product::find($id);
        $categories = Category::all();
        return view('backend.product.editproduct', compact('product', 'categories'));
    }

    public function update (ProductRequest $request, $id) {
        $product = Product::find($id);
        $productUpdate = [
            "product_code" => $request->code,
            "product_name" => $request->name,
            "product_price" => $request->price,
            "product_description" => $request->description,
            "product_status" => $request->state,
            'quantity' => $request->quantity,
            "category_id" => $request->category,
            "product_brand" => $request->brand,
        ];
        $product->update($productUpdate);
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            for ($i = 0; $i <= count($images) - 1; $i++) {
                $name = $images[$i]->getClientOriginalName();
                $images[$i]->storeAs('uploads', $name, 'public');
                $imagesValue["image".($i + 1)] = $images[$i]->getClientOriginalName();
            }
        }
        $product->image()->update($imagesValue);
        $request->session()->flash("success","Sửa sản phầm thành công!");
        return redirect("/admin/product");
    }

    public function delete ($id) {
        $product = Product::find($id);
        $product->image->delete();
        $product->delete();
        return redirect()->route('product-home');
    }
}
