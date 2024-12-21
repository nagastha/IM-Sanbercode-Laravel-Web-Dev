<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CastsController extends Controller
{
    public function create() {
        return view('cast.create');
    }
    public function store(Request $request) {
        //insert data to db
        DB::table('casts')->insert([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'bio' => $request->input('bio'),
        ]);

        //redirect ke halaman database
        return redirect('/cast');
    }
    public function index() {
        $casts = DB::table('casts')->get();
        dd($casts);
        return view('cast.index', ['casts' => $casts]);
    }
}
