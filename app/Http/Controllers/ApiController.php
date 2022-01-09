<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\DeletedProduct;

use App\Models\Product;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    function Get_Products(){
        $products=Product::all();
        return $products;
    }


    function Get_Deleted(){
        $deleted_Products=DeletedProduct::all();
        return $deleted_Products;
    }

    function Product_Count(){
        
        $products=Product::all();
        $Products_Count=$products->count();

        return $Products_Count;
    }

    function Deleted_Count(){
        $deleted_Products=DeletedProduct::all();
        $deleted_Count=$deleted_Products->count();

        return $deleted_Count;
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

        return 'deleted Succesfully';
    }


    function Multiple_destroy($id,$id2){

        $product = Product::where('id',$id)->first();
        $product2 = Product::where('id',$id2)->first();



        $Deleted= array(
            'id'   => $product->id,
            'name' => $product->product_name
        );

        $Deleted2= array(
            'id'   => $product2->id,
            'name' => $product2->product_name
        );


        DeletedProduct::create($Deleted,$Deleted2);

        $product->delete();
        $product2->delete();


        return 'deleted Succesfully';

    }

    function Report()
    {

        $products=Product::all();
        $Products_Count=$products->count();

        $deleted_Products=DeletedProduct::all();
        $deleted_Count=$deleted_Products->count();

        $output =
        '<div> 
            <table class="table table-bordered">

            <tr>
                <th>Current Products Count</th>
                <th>Current Products List</th>
                <th>Deleted Products Count</th>
                <th>deleted Products List</th>


            </tr>

            <tr>
                <th>'.$Products_Count.'</th>
                <th>'.$products.'</th>
                <th>'.$deleted_Count.'</th>
                <th>'.$deleted_Products.'</th>

            </tr>

           
            </table>
        </div>';

        return $output;






    }
}



