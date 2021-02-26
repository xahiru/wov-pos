<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class SaleController extends Controller
{
    public function index()
    {
        //get popular items
        //set up the calculator
        //setup the customer
        //setup the invoice
        // $products = Product::paginate(15);
        $products = Product::all()->take(1);
        $catergories = Category::all()->unique('name')->take(15);
        // $catergories = Category::select('name')->distinct()->get();
        // var_dump($products);
        // var_dump(Category::all());
        return view('pos',[
            'products' => $products,
            'catergories' => $catergories,
        ]
        );
    }
    
    public function pay()
    {
        return "pay";
    }

    public function save()
    {

        //default payment status is complete (complete, pending, hold)
        //payment status update if not credit to completed
        //deduct the item from the inventory stock.quanitity
        //saves;
        return var_dump(request);
    }

    public function receipt()
    {
        return "receipt";
    }
}
