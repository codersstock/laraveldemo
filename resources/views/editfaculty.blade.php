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
        <h4>tags</h4>

        <div class="label-group">
            @foreach($tags as $tag)

                <span class="badge badge-primary">
                    {{$tag->title}}
                </span>
            @endforeach

        </div>
        <br><br>
        <div class="form-row">
            <div class="col-sm-6">
                <select name="tags" id="tags" class="form-control">
                    @foreach($tag_list as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <input type="submit" class="mt-3" value="update">


    </form>


</div>

@endsection