<?php

namespace App\Http\Controllers\Frontend\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeProduct(Request $request, $id)
    {
        $comment = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'content' => $request->comment_content,
            'product_id' => $id,
            'blog_id' => 0
        ];

        Comment::create($comment);
        return redirect()->back()->with('success', 'Thêm bình luận thành công');
    }

    public function storeBlog(Request $request, $id)
    {
        $comment = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'content' => $request->comment_content,
            'product_id' => 0,
            'blog_id' => $id
        ];

        Comment::create($comment);
        return redirect()->back()->with('success', 'Thêm bình luận thành công');
    }
}
