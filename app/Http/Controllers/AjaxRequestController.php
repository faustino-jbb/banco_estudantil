<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipio;

class AjaxRequestController extends Controller
{
    public function getMunicipios(Request $request){

        $request->validate([
            'id_provincia'=>['required', 'integer'],
        ]);
        $municipios = Municipio::where(['id_provincia'=>$request->id_provincia])->pluck('municipio', 'id');
        $data = [
            'getMunicipios'=>$municipios,
        ];
        return view('ajax.getMunicipios', $data);
    }
}
