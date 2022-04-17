<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index () {
        $categories = Category::all();
        return view('backend.category.category', compact('categories'));
    }

    public function store (CategoryRequest $request) {
        $category = [
            'category_name' => $request->name,
            'category_slug' => Str::slug($request->name),
            "category_description" => $request->description,
        ];
        if (Category::create($category)) {
            $request->session()->flash("success","Cập nhật danh mục thành công!");
            return redirect("/admin/category");
        } else {
            $request->session()->flash("error","Đã xảy ra lỗi!");
            return redirect("/admin/category");
        }
    }

    public function edit ($id) {
        $category = Category::find($id);
        $categories = Category::all()->except($id);
        return view('backend.category.editcategory', compact('category', 'categories'));
    }

    public function update (CategoryRequest $request, $id) {
        $category = Category::find($id);
        $categoryUpdate = [
            'category_name' => $request->name,
            'category_slug' => Str::slug($request->name),
            'category_decription' => $request->description,
        ];
        if ($category->update($categoryUpdate)) {
            $request->session()->flash("success","Đã cap nhat danh mục thành công!");
            return redirect("/admin/category");
        } else {
            $request->session()->flash("error","Đã xảy ra lỗi!");
            return redirect("/admin/category");
        }
    }

    public function delete ($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category-home');
    }
}
