<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Session;
use App\Tags;


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

    public function search(Request $request){
global $output;
global $data;
        if($request->ajax()){

        $query = $request->get('search');
        if($query!=''){
            $data = DB::table('faculties')->where('name','like','%' .  $query .'%')
                ->orwhere('address','like','%' .  $query .'%')->get();
        }
        else{
            $data = DB::table('faculties')->get();
        }

        $total_row = $data->count();
if($total_row>0){
foreach($data as $row){
    $output = "<tr>";
    $output.= "<td>" .  $row->name ."</td></tr>";
}

   }
else{
    $output = '<tr><td>No results found</td></tr>';
}
$data = array(
  'table_data' => $output
);

echo json_encode($data);



        }
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

        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'location_id' => 'required'
        ]);


      //  $t = Location::find();
          $f = new Faculty(['name'=>$request->input('name'),'email'=>$request->input('email'),'address'=>$request->input('address'),'emailsecondary'=>$request->input('emailsecondary'),
          'fax'=> $request->input('fax'),
                'phone'=> $request->input('phone'),
              'location_id'=>$request->input('location_id')
          ]);

             if ($f->save()) {

                 $tag = $request->input('mytag');
                 $tags = explode(',' ,$tag);
                 $length = count($tags);




                 for ($i = 0; $i < $length; $i++) {

                     if ($tags[$i] != '') {
                         $t = new Tags();
                         $t->title = $tags[$i];
                         $f->tags()->save($t); // will save the tags for the faculty.
                     }
                 }



                 Session::flash('message', 'your post added');
                 return redirect('/');
             }
             else{


                     Session::flash('fail','failed to add post');

                     return redirect('/create');
                 }



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
        $tags = DB::table('tags')->where('faculty_id','=',$id)->get();
        $locations = Location::all();
        return view("editfaculty",compact('locations','faculty','tags'));
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

        if($f->save()){




            $tag = $request->input('mytag');
            $tags = explode(',' ,$tag);
            $length = count($tags);




                for ($i = 0; $i < $length; $i++) {

                    if ($tags[$i] != '') {
                        $t = new Tags();
                        $t->title = $tags[$i];
                        $f->tags()->save($t); // will save the tags for the faculty.
                    }
                }





        }


            return redirect('faculty/' .$id .'/edit');



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
