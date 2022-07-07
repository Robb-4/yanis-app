<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Enterprise;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class EnterpriseController extends Controller
{
    public function enterpriseView($id) {

        // dd($id);

        $enterprise = Enterprise::where('id', $id)->with('works')->first();

        // dd($enterprise);

        return view('enterprise', ['enterprise' => $enterprise]);
    }

    public function devisGet($id) {

        $enterprise = Enterprise::where('id', $id)->with('works')->with('marches')->first();

        $colleges = College::all();

        // dd($enterprise);

        return view('devis', ['enterprise' => $enterprise, 'colleges' => $colleges]);
    }

    public function devisPost($id, Request $request) {

        $result = Arr::except($request->input(), ['_token']);

        $enterprise = Enterprise::where('id', $id)->with('works')->first();

        $college = College::where('name', $result['college'])->first();

        return view('result', ['enterprise' => $enterprise, 'college' => $college]);
    }
}
