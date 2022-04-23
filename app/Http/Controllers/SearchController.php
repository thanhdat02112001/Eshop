<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\CssSelector\Node\FunctionNode;

class SearchController extends Controller
{
    public function search()
    {
        $search = request()->search;
        $output = '';
        $products = Product::where('product_name', 'like', '%'.$search.'%')->get();
        foreach ($products as $product) {
            $output .= '<tr>
            <td class="search-item" style="background-color: rgb(40 113 40);" >
            <p style="display: "flex"; align-item: "center", justify-content: "center" >
            <a href="/product/' . $product->id . '">'
            . $product->product_name . '</a>
            </p>
            </td>
            </tr>';
        }
        return response()->json($output);
    }
}
