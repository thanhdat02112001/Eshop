<?php

namespace App\Http\Controllers\Frontend\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;

class HomepPageController extends Controller
{
    public function index()
    {
        return redirect('/admin');
        // $sellProducts = Product::orderBy('product_sale', 'DESC')->paginate(8);
        // $newProducts = Product::orderBy('created_at', 'DESC')->paginate(8);
        // $blogs = Blog::orderBy('created_at', 'DESC')->paginate(3);
        // return view('frontend.index', compact('sellProducts', 'newProducts', 'blogs'));
    }

    public function introduce()
    {
        return view('frontend.introduce');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactStore(Request $request)
    {
        $data = [
            'user_name' => $request->fullname,
            'user_email' => $request->email,
            'user_phone' => $request->phone,
            'contact_content' => $request->contact_content
        ];

        Contact::create($data);
        session()->flash('success', 'Liên hệ của bạn đã được gửi thành công!');
        return redirect()->back();
    }
}
