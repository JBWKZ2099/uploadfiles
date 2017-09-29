<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\MueblesModel;
use Redirect;

class MueblesController extends Controller
{
    public function index() {
    	$muebles = MueblesModel::all();

    	/*Check if there are results*/
    	if( MueblesModel::get()->first()==null )
    		$muebles = null;

    	return view("welcome", compact("muebles"));
    }

    public function store(Request $request) {
    	// dd($request->path);
    	MueblesModel::create( $request->all() );
    	return redirect::to("/mueble");
    }

    public function edit($id) {
    	$mueble = MueblesModel::find($id);
    	return view("edit", compact("mueble"));
    }

    public function update(Request $request, $id) {
        $mueble = MueblesModel::find($id);
        $mueble->fill( $request->all() );
        $mueble->save();

        return Redirect::to("/mueble");
    }
}
