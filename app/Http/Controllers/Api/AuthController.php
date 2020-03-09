<?php

namespace App\Http\Controllers\Api;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function register(Request $request)
    {

        $validator=validator()->make($request->all(),[
            "name"=> 'required',
            "password"=> 'required|confirmed',
            "email"=> 'required|unique:clients',
            "phone"=> 'required',
            "blood_type_id"=> 'required',
            "date_of_birth"=> 'required',
            "last_donation_date"=> 'required',
            "city_id"=> 'required',
        ]);

        if ($validator->fails()){
            return responseJson(0,'validator error',$validator->errors());
        }
        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = str_random(60);
        $client->save();

        return responseJson(1,'تم الاضافة بنجاح ',
        [
            'api_token' => $client->api_token,
            'client' => $client,
        ]);



    }

    public function login(Request $request)
    {

        $validator=validator()->make($request->all(),[  
            "phone"=> 'required',
            "password"=> 'required',
            
        ]);

        if ($validator->fails()){
            return responseJson(0,'validator error',$validator->errors());
        }
        if($client = Client::where('phone',$request->phone )->first()){

           if (Hash::check($request->password,$client->password))
            {
                return responseJson(1,'تم تسجيل الدخول',[
                    'api_token'=> $client->api_token,
                    'client'=> $client

                ]);

            }else{
                return responseJson(0,'بيانات الدخول غير صحيحه');

            }
            

    
        }else{
            return responseJson(0,'بيانات الدخول غير مرتبطه');

        }
    }



    public function resetPassword(Request $request)
    {
        $validator=validator()->make($request->all(),[  
            "phone"=> 'required',            
        ]);

        if ($validator->fails()){
            return responseJson(0,'validator error',$validator->errors());
        }

        if($client = Client::where('phone',$request->phone )->first()){

            $code = rand(1111,9999);
            $update = $client->update(['pin_code' => $code]);
            if ($update)
            {
                Mail::to($client->email)
                    ->send(new ResetPassword($code));

                return responseJson(1,'برجاء فحص الهاتف ',[
                    'pin_code' => $code,
                    'Mail-Failures' => Mail::failures()]);

            }else{
                return responseJson(0,'حدث خطاء ، حاول مرة اخرى' );

            }
        }else{
            return responseJson(0,'حدث خطاء ، لا يوجد حساب مرتبط' );
        }
    }



    public function newPassword(Request $request)
    {
        $validator=validator()->make($request->all(),[  
            "password"=> 'required|confirmed',
            "pin_code"=> 'required',
            "phone"=> 'required',            
            
        ]);

        if ($validator->fails()){
            return responseJson(0,'validator error',$validator->errors());
        }

        if($client = Client::where('phone',$request->phone )
                            ->where('pin_code',$request->pin_code)
                            ->where('pin_code','!=',0)->first())
        {

            $client->password = bcrypt($request->password);
            $client->pin_code = null;

            
            if ($client->save())
            {
                return responseJson(1,'تم تغير كلمة المرور بنجاح');

            }else{
                return responseJson(0,'حدث خطاء ، حاول مرة اخرى' );

            }
        }else{
            return responseJson(0,'هذا الكود غير صالح ');
        }
    }

}
