<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
class TestController extends Controller
{
    public function test(){
        $collection = collect([
            ['product_id' => 'prod-100', 'name' => 'Desk'],
            ['product_id' => 'prod-100', 'name' => 'Chair'],
        ]);
        
        $keyed = $collection->keyBy('product_id');
        
       return $keyed->all();

    }
}
