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


class userController extends Controller
{
    public function user($id)
{
    return view('user', compact('id'));
}

public function show(Request $request, $id)
    {
        $userId = User::find($id); 
        $user = $request->user()->id;
        $photos=Image::select('images.id', 'images.name', 'images.created_at', 'locations.name as city','users.name as utilisateur')
        ->join('locations', 'locations.id', '=', 'images.location_id')
        ->join('users', 'users.id', '=', 'images.user_id')
        ->orderBy( 'created_at', 'desc')
        ->where('users.id','=',$user)
        ->get();

        
        $userId = User::find($id); 
        $user = $request->user()->id;
        $signaled=Image::select('images.id', 'images.name', 'images.created_at', 'locations.name as city','users.name as utilisateur', DB::raw('count(*) as numb'))
        ->join('locations', 'locations.id', '=', 'images.location_id')
        ->join('users', 'users.id', '=', 'images.user_id')
        ->join('image_user', 'images.id', '=', 'image_user.image_id')
        ->orderBy( 'created_at', 'desc')
        ->where('users.id','=',$user)
        ->groupBy('image_user.image_id')
        ->get();

        return view('mesphotos',compact('id'), ['photos'=>$photos , 'signaled'=>$signaled]);
 ////
    }

    public function editName(Request $request,$id) {
        $userId = User::find($id); 
        $user= $request->user()->id;
        $name= $request->user()->name;
        $data=array('name'=>$name);
        $data = $request->input('name');
        User::where('id',$user)->update(['name'=>$data]);
        return redirect('/')->with('status', "Votre pseudonyme a bien été modifiée");

    }

    public function editMail(Request $request,$id) {
        $userId = User::find($id); 
        $user= $request->user()->id;
        $email= $request->user()->email;
        $data=array('email'=>$email);
        $data = $request->input('email');
        User::where('id',$user)->update(['email'=>$data]);
        return redirect('/')->with('status', "Votre courriel a bien été modifiée");

    }

    public function editPassword(Request $request,$id) {
        $userId = User::find($id); 
        $user= $request->user()->id;
        $password= $request->user()->password;
        $data=array('password'=>$password);
        $data = $request->input('password');
        $pass=Hash::make($data);
        User::where('id',$user)->update(['password'=>$pass]);



        return redirect('/')->with('status', "Votre mot de passe a bien été modifié");

    }

    public function multipleDeletes(Request $request)
    {
        $delete= $request->input('delete');
        Image::whereIn('id',$delete)
        ->delete();
        return redirect('/')->with('status', "Les/L'image(s) a/ont bien été supprimée(s)");
    
    }

    public function deleteAccount(Request $request,$id)
    {
        $user = User::find($id); 
        $user= $request->user()->id;
        User::select('users.id')
        ->where('users.id','=',$user)
        ->delete();
        Auth::logout();
        return redirect('/')->with('status', "Compte supprimé");
    }


}
