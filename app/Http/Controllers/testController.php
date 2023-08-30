<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facedes\DB;

class TestController extends Controller
{
    public function index()
    {
        $values = Test::all();

        $count = Test::count();

        $first = Test::findOrFail(1);

        $whereBBB = Test::where('text', '=', 'BBB')->get();


        $queryBuilder = DB::table('tests')->where('text', '=', 'BBB')
        ->select('id', 'text')->get();

        dd($values, $count, $first, $whereBBB, $queryBuilder);

        return view('tests.test', compact('values'));
    }
}
