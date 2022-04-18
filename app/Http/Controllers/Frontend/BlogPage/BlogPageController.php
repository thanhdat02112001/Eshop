<?php

namespace App\Http\Controllers\Frontend\BlogPage;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    public function index () {
        $newBlogs = Blog::orderBy('created_at', 'DESC')->paginate(4);
        $listBlogs = Blog::paginate(4);

        return view ('frontend.blog', compact('newBlogs', 'listBlogs'));
    }

    public function detail ($id) {
        $newBlogs = Blog::orderBy('created_at', 'DESC')->paginate(4);
        $blog = Blog::find($id);

        return view('frontend.detailblog', compact('newBlogs', 'blog'));
    }
}
