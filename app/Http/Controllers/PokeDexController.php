<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokeDexController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $query = Pokemon::search($search);

        $pokeinfos = $query->get();

        // dd($pokeinfos);

        return view('pokedex/index', compact('pokeinfos'));
    }

}
