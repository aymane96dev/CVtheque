<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CandidatController extends Controller
{
    public function getAllCandidats()
    {
        $candidats = Candidat::all();

        return view('candidats', [
            'candidats' => $candidats
        ]);
    }

    public function addFormCandidats()
    {
        $candidat = new Candidat();

        return view('add_candidat', [
            'candidat' => $candidat
        ]);
    }

    public function getCV(Request $request)
    {
        return Storage::download($request->cvpath);
    }

    public function saveCandidats(Request $request)
    {
        Validator::make($request->all(), [
            'nom' => 'required|max:16',
            'prenom' => 'required|max:16',
            'email'=> 'required|email|max:32',
            'fonction'=> 'required|max:32',
            'cv'=> 'required|file',
        ])->validate();

        $candidat= new Candidat();
        $candidat->nom = $request->nom;
        $candidat->prénom = $request->prenom;
        $candidat->email = $request->email;
        $candidat->fonction = $request->fonction;
        $path = $request->cv->store('cvs');
        $candidat->CV = $path;

        $candidat->save();
        
        return redirect('/');
    }

    public function searchCandidats(Request $request)
    {

        $search_text = $request->search_text;

        $searched_cdts = DB::table('candidats')
            ->where('nom', 'like', '%'.$search_text.'%')
            ->Orwhere('prénom', 'like', '%'.$search_text.'%')
            ->Orwhere('email', 'like', '%'.$search_text.'%')
            ->Orwhere('fonction', 'like', '%'.$search_text.'%')
            ->get();

            return view('search_view', [
                'searched_cdts' => $searched_cdts
            ]);
    }
}
