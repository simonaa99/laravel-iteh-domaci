<?php

namespace App\Http\Controllers;

use App\Http\Resources\AutoResource;
use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static $wrap = 'autos';

    public function index()
    {
        $autos=Auto::all();

        $my_autos=array();
        foreach($autos as $auto){
            array_push($my_autos,new AutoResource($auto));
        }

        return $my_autos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getByProizvodjac($proizvodjac_id){
        $autos=Auto::get()->where('proizvodjac_id',$proizvodjac_id);

        if(count($autos)==0){
            return response()->json('Author with this id does not exist!');
        }

        $my_autos=array();
        foreach($autos as $auto){
            array_push($my_books,new AutoResource($auto));
        }

        return $my_autos;
    }

    public function myAutos(Request $request){
        $autos=Auto::get()->where('user_id',Auth::user()->id);
        if(count($autos)==0){
            return 'Nemate sacuvana kola!';
        }
        $my_autoss=array();
        foreach($autos as $auto){
            array_push($my_autos,new AutoResource($auto));
        }

        return $my_autos;
    }

    public function getByCategory($kategorija_id){
        $autos=Auto::get()->where('kategorija_id',$kategorija_id);

        if(count($autos)==0){
            return response()->json('ID ove kategorije ne postoji!');
        }

        $my_autos=array();
        foreach($autos as $auto){
            array_push($my_autos,new AutoResource($auto));
        }

        return $my_autos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'model'=>'required|String|max:255',
            'motor'=>'required|String|max:255',
            'godinaProizvodnje'=>'required|Integer|max:4',
            'proizvodjac_id'=>'required',
            'kategorija_id'=>'required'
           
           
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $auto=new Auto;
        $auto->model=$request->model;
        $auto->motor=$request->motor;
        $auto->godinaProizvodnje=$request->godinaProizvodnje;
        $auto->user_id=Auth::user()->id;
        $auto->kategorija_id=$request->kategorija_id;
        $auto->proizvodjac_id=$request->proizvodjac_id;

        $auto->save();

        return response()->json(['Auto je uspesno sacuvan!',new AutoResource($auto)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function show(Auto $auto)
    {
        return new AutoResource($auto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function edit(Auto $auto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auto $auto)
    {
        $validator=Validator::make($request->all(),[
            'model'=>'required|String|max:255',
            'motor'=>'required|String|max:255',
            'godinaProizvodnje'=>'required|Integer|max:4',
            'proizvodjac_id'=>'required',
            'kategorija_id'=>'required',
            'user_id'=> 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $auto=new Auto;
        $auto->model=$request->model;
        $auto->motor=$request->motor;
        $auto->godinaProizvodnje=$request->godinaProizvodnje;
        $auto->user_id=Auth::user()->id;
        $auto->kategorija_id=$request->kategorija_id;
        $auto->proizvodjac_id=$request->proizvodjac_id;

        $result=$auto->update();

        if($result==false){
            return response()->json('Problem pri azuriranju auta!');
        }
        return response()->json(['Auto je uspesno azuriran!',new AutoResource($auto)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auto  $auto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auto $auto)
    {
        $auto->delete();

        return response()->json('Auto '.$auto->model .'je uspesno obrisan!');
    }
}
