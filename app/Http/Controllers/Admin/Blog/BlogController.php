<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index () {
        $blogs = Blog::paginate(5);
        return view('backend.blog.listblog', compact('blogs'));
    }

    public function create () {
        return view('backend.blog.addblog');
    }

    public function store (BlogRequest $request) {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $fileName);
        }
        $data = [
            'blog_title' => $request->title,
            'blog_content' => $request->description,
            'blog_image' => $fileName,
            'user_name' => auth()->user()->name
        ];

        Blog::create($data);
        session()->flash('success', 'Thêm bài viết thành công !');
        return redirect()->route('blog-home');
    }

    public function edit ($id) {
        $blog = Blog::find($id);

        return view('backend.blog.editblog', compact('blog'));
    }

    public function update (Request $request, $id) {
        $blog = Blog::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $fileName);
        } else {
            $fileName = $blog->blog_image;
        }

        $data = [
            'blog_title' => $request->title,
            'blog_content' => $request->description,
            'blog_image' => $fileName,
            'user_name' => auth()->user()->name
        ];

        $blog->update($data);
        session()->flash('success', 'Sửa bài viết thành công !');
        return redirect()->route('blog-home');
    }

    public function delete ($id) {
        Blog::destroy($id);
    }
}
