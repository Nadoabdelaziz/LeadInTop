<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\models\Product;
use App\Models\DeletedProduct;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    function foo(){

        $products=Product::all();
        return view('/StockMarket', compact('products'));

    }

    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();

        
        $Deleted= array(
            'id'   => $product->id,
            'name' => $product->product_name
        );

        DeletedProduct::create($Deleted);

        $product->delete();

        return redirect('/StockMarket');
    }

}


