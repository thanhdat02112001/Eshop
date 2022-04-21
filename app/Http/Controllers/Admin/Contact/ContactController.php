<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index () {
        $contacts = Contact::paginate(10);

        return view('backend.contact.contact', compact('contacts'));
    }

    public function delete ($id) {
        Contact::destroy($id);

        return redirect()->back()->with('success', 'Xóa phản hồi thành công');
    }
}
