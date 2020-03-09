<?php

namespace App\Http\Controllers\Api;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function getProfile(Request $request)
    {
        $client = Client::where('api_token',$request->api_token)->first();
        return responseJson(1,'success get client profile',$client);

       
    }

    public function updateProfile(Request $request)
    {
        $client = Client::where('api_token',$request->api_token)->first();

        $validator=validator()->make($request->all(),[
            "name"=> 'required',
            "password"=> 'required|confirmed',
            "email"=> "required|unique:clients,email,$client->id",
            "phone"=> "required|unique:clients,phone,$client->id",
            "blood_type_id"=> 'required',
            "date_of_birth"=> 'required',
            "last_donation_date"=> 'required',
            "city_id"=> 'required',
        ]);

        if ($validator->fails()){
            return responseJson(0,'validator error',$validator->errors());
        }
        $request->merge(['password' => bcrypt($request->password)]);



        $client->update($request->all());
        $client->save();

        return responseJson(1,'success update client profile',$client);

    }

    

}
