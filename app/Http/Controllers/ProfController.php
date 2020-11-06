<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfController extends Controller
{


    /**
     * Afficher la vue contenant le formulaire.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {

        $id = Auth::user()->id;
        $prof = User::all()->where('id', $id)->first();
        return view('prof.index', [
            'profil' => $prof,
        ]);
    }

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        // $var = "Hello";
        // dd($var);

        // Validate and store the blog post...
        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:10'],
            'postalcd' => ['required', 'string', 'max:10'],
            'phone' => ['required', 'integer', 'max:10'],
        ]);

        $id = Auth::user()->id;
        $prof = User::all()->where('id', $id)->first();
        $name = $prof->name;
        $email = $prof->email;
        $prof->firstname = $request->firstname;
        $prof->birthday = $request->birthday;
        // dd($prof->birthday);
        $prof->address = $request->address;
        $prof->city = $request->city;
        $prof->postalcd = $request->postalcd;
        $prof->phone = $request->phone;
        $prof->save();

        return back();
    }

    /**
     * Traite les données du formulaire avec la vue.
     * Puis redirige la requête sur la vue du formulaire.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {

        $id = Auth::user()->id;
        $prof = User::all()->where('id', $id)->first();
        $name = $prof->name;
        $email = $prof->email;
        $prof->firstname = $request->firstname;
        $prof->birthday = $request->birthday;
        // dd($prof->birthday);
        $prof->address = $request->address;
        $prof->city = $request->city;
        $prof->postalcd = $request->postalcd;
        $prof->phone = $request->phone;
        $prof->save();

        return back();
    }
}
