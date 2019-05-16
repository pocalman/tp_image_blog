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


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search');//
    }

    public function autocomplete(Request $request)
    {
        //Permet l'autocomplétion à partir d'un json qui utilise les données 
        $datas = Location::select("name")
        ->where("name","LIKE","%{$request->input('query')}%")
        ->get();

        return response()->json($datas);
    }

    function action(Request $request)
    {

        $query=$request->get('search'); //Va chercher ce qui a été écrit dans la recherche et qui porte le nom de la variable $query.
        $datas = Image::select('images.id','images.name', 'users.name as utilisateur', 'images.created_at', 'locations.name as city' ) //La requête pour la recherche. 
       ->join('locations', 'locations.id', '=', 'images.location_id')
       ->join('users', 'users.id', '=', 'images.user_id') 
        ->where('locations.name', 'like', '%'.$query.'%')
        ->orderBy( 'created_at', 'desc') //Affiche les images dans un tableau, de la plus récente à la plus ancienne.
        ->get();
         $datas = $this->getReportedImage($datas)->where('approved', 1); //On doit ici faire une pagination manuelle pour avoir une signalisation fonctionnelle.
         $pageStart = request()->get('page', 1); // récupère le numéro de page dans l'url
        $perPage = 6; 
        $offset = ($pageStart * $perPage) - $perPage; 
        $datas = new Paginator(
        array_slice($datas->all(), $offset,  $perPage, true),
        $datas->count(),
        $perPage,
        null, 
        [
        'path'  => $request->url(),
        'query' => $request->query(),
        ]
);
    
$datas->appends(['search' => $request->post('search')]);
         return view('search', ['datas'=>$datas]);

        
    }

   


    public function signalement(Request $request, $id) //Le signalement, aussi présent dans le controller d'images.
    {
        $image = Image::find($id); //On va ici chercher l'ID de l'image.
        $user = $request->user()->id; //On se sert du modèle user pour prendre en compte l'utilisateur qui signale.
        $image->users()->syncWithoutDetaching([$user=>["alert"=>1]]); //On utilise syncWithoutDetaching afin de conserver les signalement antérieurs faits de la part de d'autres utilisateurs.
        return redirect('/')->with('status', "L'image a bien été signalée'"); //Dès que le signalement a été fait, on ramène l'utilisateur à la page d'accueil avec un message d'erreur.
    
    }

    public function getReportedImage($datas) //La classe permettant de faire disparaitre pour les utilisateurs les images signalées deux fois et plus, aussi présent dans le controller d'images.
    {
        $datas->transform(function($image) {
            $number = $image->users->where('pivot.alert', 1)->count(); 
            $image->approved = ($number >= 2) ? 0 : 1;
            return $image;
        });
        return $datas;
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
