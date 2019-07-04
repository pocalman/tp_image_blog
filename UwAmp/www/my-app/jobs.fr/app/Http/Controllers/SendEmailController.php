<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    function index()
    {
     return view('soumission');
    }

    function send(Request $request)
    {
     $this->validate($request, [
      'nom'     =>  'required',
      'sujet'     =>  'required',
      'courriel'  =>  'required|email',
      'message' =>  'required'
     ]);

        $data = array(
            'nom'      =>  $request->nom,
            'courriel'      =>  $request->courriel,
            'sujet'      =>  $request->sujet,
            'message'   =>   $request->message
        );

     Mail::to('pasc.levesque@gmail.com')->send(new SendMail($data));
     return back()->with('success', 'Merci de nous avoir contacté');

    }
}
