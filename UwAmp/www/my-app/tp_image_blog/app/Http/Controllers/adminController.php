<?php

namespace App\Http\Controllers;


use App\Location;
use App\Image;
use Illuminate\Http\Request;
use DB;
use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\User;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Hash;
use Auth;

class adminController extends Controller
{
    public function user($id)
{
    return view('admin', compact('id'));
}

public function showUsers()
{
    $users=User::select('users.id', 'users.name', 'users.email', 'email_verified_at', 'password', 'users.created_at', DB::raw('count(*) as numb'))
    ->join('images', 'images.user_id', '=', 'users.id')
    ->orderBy( 'created_at', 'desc')
    ->where('level','=','user')
    ->groupBy('users.name')
    ->get();

    return view('admin',compact('id'), ['users'=>$users]);
}

public function showUpdateUser($id)
{

    $users=User::select('users.id', 'users.name as name', 'users.email as email', 'users.password as password')
    ->where('users.id','=',$id)
    ->first();

    return view("editUser",compact('id'), ['users'=>$users]);

}

public function updateUserName(Request $request,$id)
{
    
    $userId = User::find($id); 
    $data = $request->input('name');
    User::where('id',$id)->update(['name'=>$data]);

    return redirect('/')->with('status', "Le pseudonyme a bien été modifié");

}

public function updateUserMail(Request $request,$id)
{
    
    $userId = User::find($id); 
    $data = $request->input('mail');
    User::where('id',$id)->update(['email'=>$data]);

    return redirect('/')->with('status', "Le courriel a bien été modifié");

}

public function updateUserPassword(Request $request,$id)
{
    
    $userId = User::find($id); 
    $data = $request->input('password');
    $pass=Hash::make($data);
    User::where('id',$id)->update(['password'=>$pass]);

    return redirect('/')->with('status', "Le mot de passe a bien été modifié");

}

public function deleteUser($id)
    {
        
        $user = User::find($id);
        User::select('users.id')
        ->where('users.id','=',$id)
        ->delete();
        return redirect('/')->with('status', "Le compte a bien été supprimé");

        
    
    }




}