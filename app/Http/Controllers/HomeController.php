<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Enterprise;
use App\Models\EnterpriseWork;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $works = Work::all();

        $enterprises = Enterprise::with(['works'])->get();

        $colleges = College::all();

        // dd($enterprises);
        return view('home', ['works' => $works, 'enterprises' => $enterprises, 'colleges' => $colleges]);
    }

    public function searchPost(Request $request)
    {
        $result = Arr::except($request->input(), ['_token']);
        // dd($result);

        // check travaux entreprise
        if($result['travaux'] === 'Type de travaux' && $result['entreprise'] === 'Entreprise' ){
            $works = Work::all();

            $enterprises = Enterprise::with(['works'])->get();

            return view('home', ['works' => $works, 'enterprises' => $enterprises]);
        }elseif ($result['travaux'] === 'Type de travaux') {
            $resultEntreprise = $result['entreprise'];

            // dd($resultEntreprise);

            return redirect(route('search.get', ['result' => $resultEntreprise]));
        }elseif ($result['entreprise'] ===  'Entreprise' ) {
            $resultTravaux = $result['travaux'];

            return redirect(route('search.get', ['result' => $resultTravaux]));
        }else {
            $resultFinal = $result['travaux'] .'+' .$result['entreprise'];
            // dd($resultFinal);

            return redirect(route('search.get', ['result' => $resultFinal]));
        }

        dd($result);

        return redirect(route('search.get', []));
    }

    public function searchGet($result)
    {
        $resultSplit = explode('+', $result);

        $works = Work::all();

        $enterprises = Enterprise::with(['works'])->get();

        $work = NULL;
        $enterprise = NULL;

        if(count($resultSplit) === 1){
            // $resultFinal = $resultSplit[1];

            $enterprise = Enterprise::where('name', $resultSplit[0])->with(['works'])->first();
            $work = Work::where('name', $resultSplit[0])->with(['enterprises'])->first();

        }else {
            $enterprise = Enterprise::where('name', $resultSplit[1])->first();
            $work = Work::where('name', $resultSplit[0])->first();
        }

        return view('search', ['enterprises' => $enterprises, 'works' => $works, 'enterprise' => $enterprise, 'work' => $work]);

    }

    public function searchCollegePost(Request $request)
    {
        $result = Arr::except($request->input(), ['_token']);

        $college = $result['college'];

        return redirect(route('searchCollege.get', ['result' => $college]));
    }

    public function searchCollegeGet($result)
    {

        $works = Work::all();

        $enterprises = Enterprise::with(['works'])->get();

        $colleges = College::all();

        $college = College::where('name', $result)->first();

        return view('searchCollege', ['enterprises' => $enterprises, 'works' => $works, 'colleges' => $colleges, 'college' => $college]);

    }


}
