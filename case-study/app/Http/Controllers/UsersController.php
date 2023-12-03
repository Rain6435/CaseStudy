<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function log(Request $request){
        $timezone = new DateTimeZone("US/Eastern");
        $today = new DateTime('now',$timezone);
        try {
            User::create([
            'name'=>$request->user,
            'checked_at'=>$today,
            'left_at'=>null,
            'ip'=>$request->ip(),
        ]);
        } catch (\Throwable $th) {
            throw $th;
            return response("Internal Error",500);
        }
    }
    public function users(){
        try {
            $users = User::all('name','checked_at');
            return [$users][0];
        } catch (\Throwable $th) {
            throw $th;
            return response("Internal Error",500);
        }
    }
    public function logged(Request $request){
        try {
            $v = User::where('ip','=',$request->ip())->count();
            if($v>=1){
                return response("Exists",201);
            }else{
                return response("Ok",200);
        }
        } catch (\Throwable $th) {
            throw $th;
            return response("Internal Error",500);
        }
    }
    public function checkout(Request $request){
        try {
            User::where('ip','=',$request->ip())->delete();
            return response("Ok",201);
        } catch (\Throwable $th) {
            throw $th;
            return response("Internal Error",500);
        }
    }
}