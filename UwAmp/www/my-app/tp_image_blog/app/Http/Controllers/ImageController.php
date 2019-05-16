<?php


namespace App\Http\Controllers;


use App\Image;
use App\Location;
use App\User;
use Illuminate\Http\Request;
use DB;
use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;



class ImageController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Affiche les images dans la page d'accueil. La fonction inRandomOrder a été utilisée pour afficher 3 images aléatoirement.
        $photos=Image::select('images.id', 'images.name', 'locations.name as city','users.name as utilisateur')
        ->join('locations', 'locations.id', '=', 'images.location_id')
        ->join('users', 'users.id', '=', 'images.user_id')
        ->inRandomOrder()
        ->limit(3)
        ->get();
        $photos = $this->getReportedImage($photos)->where('approved', 1);
        return view('welcome',['photos'=>$photos]);

       


        
      
 ////
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Affiche les localisations. Celles-ci s'automatisent dans le formulaire en fonction des localisations ajoutées ou mises 
        $locations = DB::select('select id, name from locations');
        return view('addimage',['locations'=>$locations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate ([
            'image' => 'required|image|max:2000',
            'location_id'=>'required',
        ]);
 
        // Enregistre l'image originale dans le dossier '/storage/app/public/images'
        $path = basename ($request->image->store('images', 'public'));
      


       
 
        // Enregistre l'image réduite dans le dossier '/storage/app/public/thumbs'
        $image = InterventionImage::make($request->image)->widen(500)->encode();
        Storage::put('public/thumbs/' . $path, $image);

 
        // Sauvegarde dans la base de données
        $image = new Image;
        $image->name = $path;
        $location_id= $request->location_id;
        $user_id = auth()->id();
        $data=array('name'=>$path, 'location_id'=>$location_id, 'user_id'=>$user_id, 'created_at'=>Carbon::now());
        DB::table('images')->insert($data);
        
 
        return redirect('addimage')->with('status', "L'image a bien été entrée");
    }

    public function signalement(Request $request, $id) //Code à peu près identique à celui du signelement dans Search Controller, mais s'appliquant pour l'affichage des photos à l'acceuil et idem pour le get reported image.
    {
        $image = Image::find($id); 
        $user = $request->user()->id;
        $image->users()->syncWithoutDetaching([$user=>["alert"=>1]]);
        return redirect('/')->with('status', "L'image a bien été signalée");;
    
    }

    public function getReportedImage($photos)
    {
        $photos->transform(function($image) {
            $number = $image->users->where('pivot.alert', 1)->count();
            $image->approved = ($number >= 2) ? 0 : 1;
            return $image;
        });
        return $photos;
    }

    public function delete($id)
    {
        $image = Image::find($id); 
        $image->delete();
        return redirect('/')->with('status', "L'image a bien été supprimée");;
    
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
        $image->delete();
     
        return redirect('image');//
    }

}


