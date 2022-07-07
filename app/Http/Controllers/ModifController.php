<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Enterprise;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ModifController extends Controller
{
    public function modifView() {

        return view('modif');
    }

    public function modifCollege($id) {

        $college = College::where('id', $id)->first();

        // dd($enterprise);

        return view('modifCollege', ['college' => $college]);
    }

    public function postModifCollege(Request $request, $id) {
        $result = Arr::except($request->input(), ['_token']);

        // dd($result);

        College::where('id', $id)->update([
            'name' => $result['NAME_'],
            'adresse' => $result['ADRESSE_'],
            'ville' => $result['VILLE_'],
        ]);

        $college = College::where('id', $id)->first();

        return redirect(route('modifCollege.get', ['id' => $college->id] ));
    }

    public function modifEnterprise($id) {

        $enterprise = Enterprise::where('id', $id)->first();

        // dd($enterprise);

        return view('modifEnterprise', ['enterprise' => $enterprise]);
    }

    public function postModifEnterprise(Request $request, $id) {
        $result = Arr::except($request->input(), ['_token']);

        // dd($result);

        Enterprise::where('id', $id)->update([
            'name' => $result['NAME_'],
            'number' => $result['NUMBER_'],
        ]);

        $enterprise = Enterprise::where('id', $id)->first();

        return redirect(route('modifEnterprise.get', ['id' => $enterprise->id] ));
    }

    public function viewAdd() {

        return view('add');
    }
}
