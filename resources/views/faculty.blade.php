@extends('layouts.app')

@section('content')


    <table class="table table-stripped">

        <tr>
            <th>id</th>
            <th>name</th>
            <th>phone</th>
            <th>email</th>
            <th>address</th>
            <th>fax</th>
            <th>options</th>
        </tr>
        @if(count($faculties))
            @foreach($faculties as $faculty)
                <tr>
                    <td>{{$faculty->id}}</td>
                    <td><a href="faculty/{{$faculty->id}}/edit">{{$faculty->name}}</a></td>
                    <td>{{$faculty->phone}}</td>
                    <td>{{$faculty->email}}</td>
                    <td>{{$faculty->address}}</td>
                    <td>{{$faculty->fax}}</td>
                    <td>
                        <form action="{{route('faculty.destroy',[$faculty->id])}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">

                            <input type="submit"  value="delete">

                        </form>

                    </td>
                </tr>
            @endforeach
        @endif
    </table>

{{$faculties->links()}}
@endsection