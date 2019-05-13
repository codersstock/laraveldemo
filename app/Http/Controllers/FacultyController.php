<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Location;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $t = Location::find($request->input('location_id'));
          $f = new Faculty(['name'=>$request->input('name'),'email'=>$request->input('email'),'address'=>$request->input('address'),'emailsecondary'=>$request->input('emailsecondary'),
          'fax'=> $request->input('fax'),
                'phone'=> $request->input('phone')
          ]);
$t->faculties()->save($f);

//
//
//        $f->name = ;
//        $f->phone = $request->input('phone');
//        $f->email = $request->input('email');
//        $f->emailsecondary = $request->input('emailsecondary');
//        $f->fax = $request->input('fax');
//        $f->address = $request->input('address');
//        $f->location_id = 1;
//
//        $f->save();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $faculty = Faculty::find($id);
        $locations = Location::all();

        return view("editfaculty",compact('locations','faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $f = Faculty::find($id);
        $f->name = $request->input('name');
        $f->phone = $request->input('phone');
        $f->email = $request->input('email');
        $f->emailsecondary = $request->input('emailsecondary');
        $f->fax = $request->input('fax');
        $f->address = $request->input('address');
        $f->location_id = $request->input('location_id');

        $f->save();
return redirect('/');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fac = Faculty::find($id);
        $fac->delete();
        return redirect('/');
    }
}
