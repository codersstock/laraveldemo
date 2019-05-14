<?php


use App\Faculty;
use App\Location;
Route::get('/', function () {

    $faculties = Faculty::paginate(5);

    return view("faculty",compact('faculties',));
});

Route::get('/create', function () {

    $locations = Location::all();
    return view("createfaculty",compact('locations'));
});



Route::get('/faculty/Search','FacultyController@search')->name('faculty.search');



Route::get('/faculties',function(){
   $l = Location::find(1);
   echo $l->faculties()->get();
});

Route::resource('faculty','FacultyController');
