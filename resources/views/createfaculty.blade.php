@extends('layouts.app')

@section('content')

    <form action="{{route('faculty.store')}}" method="POST">
@csrf
        <div class="form-row">
            <div class="col-sm-6">
                <input class="form-control" type="text" name="name" id="" placeholder="Enter Name">
            </div>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="email" id="" placeholder="Enter email">
            </div>


        </div>


        <div class="form-row">
            <div class="col-sm-6">
                <input class="form-control" type="text" name="emailsecondary" id="" placeholder="Enter secondary email">
            </div>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="phone" id="" placeholder="Enter phone">
            </div>


        </div>
        <div class="form-row">
            <div class="col-sm-6">
                <input class="form-control" type="text" name="fax" id="" placeholder="Enter fax">
            </div>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="address" id="" placeholder="Enter address">
            </div>


        </div>



        <div class="form-row">
            <div class="col-sm-6">
                <select name="location_id" id="" class="form-control">
@foreach($locations as $location)
                    <option value="{{$location->id}}">{{$location->state}}</option>
@endforeach
                </select>
            </div>



        </div>




        <input type="submit" value="submit">


    </form>




@endsection