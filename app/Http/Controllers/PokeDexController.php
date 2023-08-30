<?php

namespace App\Http\Controllers;
use App\Models\Pokemon;

use Illuminate\Http\Request;

class PokeDexController extends Controller
{
    public function index()
    {
        // $hello = 'Hello,World';
        // return view('pokedex/index', compact('hello'));

        $pokeinfos = Pokemon::all();

        // dd($pokeinfos);

        return view('pokedex/index', compact('pokeinfos'));
    }

}
