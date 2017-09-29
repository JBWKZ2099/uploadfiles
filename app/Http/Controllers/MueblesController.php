<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\MueblesModel;
use Carbon\Carbon;
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

    	$files_array = count( $request->path );
    	if( $request->hasFile("path") ) {
    		$array = [];

	    	for( $i=0; $i<$files_array; $i++ ) {
	    		$path_name = "";
	    		$path_name = $request->path[$i];
    			$name = str_random(10)."-".Carbon::now()->second."_".$path_name->getClientOriginalName();
    			\Storage::disk('muebles')->put( $name, \File::get($path_name) );

    			/*array_push($array, ["path".$i => $name]);*/
    			$array["path".$i] = $name;
	    	}
	    }
    	
    	MueblesModel::create($array);
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
