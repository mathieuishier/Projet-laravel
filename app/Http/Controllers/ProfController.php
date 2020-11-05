<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfController extends Controller
{
    /**
     * Afficher la vue contenant le formulaire.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {

        $var = "mathieu";
        $prof = User::select(['name'])->where('name', $var)->first();
        $name = $prof->name;
        // dd($name);
        return view('prof.index', [
            'name' => $name,
        ]);
    }

    /**
     * Traite les données du formulaire avec la vue.
     * Puis redirige la requête sur la vue du formulaire.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, $name)
    {
        $prof = User::select(['id', 'email'])->where('name', $name)->first();
        $prof->firstname = $request->firstname;
        $prof->save();

        return back();
    }
}
