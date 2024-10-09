<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        // dd("here");
        $warehouses = Warehouse::all();
        return view('dashboard', ['warehouses'=>$warehouses]);
    }
    public function warehouse(Warehouse $warehouse){
        $products = $warehouse->products;
        return view('warehouse',[
            'products'=>$products
        ]);
    }
}
