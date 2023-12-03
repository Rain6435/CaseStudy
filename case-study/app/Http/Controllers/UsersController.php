<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class tempObject{
    public int $id;
    public string $name;
    public float $time;

}

class UsersController extends Controller
{
    public function log(Request $request){
        $timezone = new DateTimeZone("US/Eastern");
        $today = new DateTime('now',$timezone);
        User::create([
            'name'=>$request->user,
            'checked_at'=>$today,
            'ip'=>$request->ip(),
        ]);
    }
    public function users(){
        $users = User::all('name','checked_at');
        return [$users][0];
    }

    public function logged(Request $request){
        $v = User::where('ip','=',$request->ip())->count();
        if($v>=1){
            return response("Ok",201);
        }else{
            return response("Ok",200);
        }
    }

    public function checkout(Request $request){
        User::where('ip','=',$request->ip())->delete();
        return response("Ok",201);
    }
}