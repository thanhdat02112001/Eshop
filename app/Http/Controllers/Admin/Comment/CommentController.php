<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index () {
        $comments = Comment::paginate(10);

        return view('backend.comment.comment', compact('comments'));
    }

    public function delete ($id) {
        Comment::destroy($id);

        return redirect()->back()->with('success', 'Xóa phản hồi thành công');
    }
}
