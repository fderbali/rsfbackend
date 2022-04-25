<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\User;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function firstAction(){

        //$annonces = Annonce::find(2);
        //$annonces = Annonce::last();
        //$annonces = Annonce::where("title",'=','formation')->count();

        $user = User::find(1);
        $annonces = $user->annonces;

        return response()->json(
           $annonces
        );
    }
}
