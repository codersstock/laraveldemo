@extends('layouts.app')

@section('content')
<div class="container">


    <a href="/" class="btn btn-warning m-3">Go Back</a>

    <form action="{{route('faculty.update',$faculty->id)}}" method="POST">
        @csrf

        <input type="hidden" name="_method" value="PUT">
        <div class="form-row">
            <div class="col-sm-6">
                <input class="form-control" type="text"  value="{{$faculty->name}}" name="name" id="" value="{{$faculty->name}}" placeholder="Enter Name">
            </div>
            <div class="col-sm-6">
                <input class="form-control" type="email" value="{{$faculty->email}}" name="email" id="" value="{{$faculty->email}}" placeholder="Enter email">
            </div>


        </div>


        <div class="form-row mt-3">
            <div class="col-sm-6">
                <input class="form-control" type="email" name="emailsecondary" value="{{$faculty->emailsecondary}}" id="" placeholder="Enter secondary email">
            </div>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="phone" id="" value="{{$faculty->phone}}" placeholder="Enter phone">
            </div>


        </div>
        <div class="form-row mt-3">
            <div class="col-sm-6">
                <input class="form-control" type="text" name="fax" id="" value="{{$faculty->fax}}" placeholder="Enter fax">
            </div>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="address" value="{{$faculty->address}}" id="" placeholder="Enter address">
            </div>


        </div>



        <div class="form-row mt-3">
            <div class="col-sm-6">
                <select name="location_id" id="" class="form-control">
                    @foreach($locations as $location)
                        <option value="{{$location->id}}">{{$location->state}}</option>
                    @endforeach
                </select>
            </div>



        </div>


        <div><input type="text" name="mytag"></div>


{{--        <div><input type="text" name="mytag[]" id="mytags"></div>--}}
{{--        <div><input type="text" name="mytag[]" id="mytags"></div>--}}


        <input type="submit" class="mt-3" value="update">


    </form>
</div>

        @foreach($tags as $tag)
            <form action="{{route('tag.destroy',[$tag->id])}}" method="POST">

<div class="col-sm-3">

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{$tag->title}}



            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="facultyid" value="{{$faculty->id}}">

        <button type="submit">
                <span aria-hidden="true">&times;</span>
            </button>



    </div>

</div>
            </form>

        @endforeach










@endsection