<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{



    public function index()
    {

        $id = Auth::user()->id;
        $prof = User::all()->where('id', $id)->first();
        $valider = '';


        return view('profile', [
            'profil' => $prof, 'valider' => $valider
        ]);
    }

    public function update(Request $request)
    {

        // Validate and store the blog post...
        $validatedData = $request->validate([
            'firstname' => 'string|alpha',
            'birthday' => 'date_format:d/m/Y',
            'address' => 'string',
            'city' => 'string|alpha',
            'postalcd' => 'digits:5',
            'phone' => 'digits:10',
        ]);

        $id = Auth::user()->id;
        $prof = User::all()->where('id', $id)->first();
        $prof->name = $request->name;
        $prof->email = $request->email;
        // $password = $prof->password;
        $prof->firstname = $request->firstname;
        $prof->birthday = $request->birthday;
        $prof->address = $request->address;
        $prof->city = $request->city;
        $prof->postalcd = $request->postalcd;
        $prof->phone = $request->phone;
        $prof->save();
        $valider = 'Votre modification est prise en compte';


        // D> Test MG

        // F> Test MG

        return back();
    }
}
