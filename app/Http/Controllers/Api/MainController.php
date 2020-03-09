<?php

namespace App\Http\Controllers\Api;

use App\Governorate;
use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class MainController extends Controller
{

    public function governorates()
    {
        $governorates = Governorate::all();
        return responseJson(1,'success',$governorates);
    }

    public function cities(Request $request)
    {
        $cities = City::with('governorate')->where(function($query) use($request) {
            if ($request->has('governorate_id'))
            {
                $query->where('governorate_id',$request->governorate_id);
            }
        })->get();
        return responseJson(1,'success',$cities);
    }


// with() to get the relation data in the api response
//load() need object... get the relation data in the api response



    public function posts(Request $request){
        $posts = Post::with('Category')->paginate(10);
        return responseJson(1,'success',$posts);
    }


}
