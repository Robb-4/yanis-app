<?php

namespace App\Http\Controllers;

use App\Models\College;

class CollegeController extends Controller
{
    public function collegeView($id) {

        // dd($id);

        $college = College::where('id', $id)->first();

        // dd($enterprise);

        return view('college', ['college' => $college]);
    }
}
