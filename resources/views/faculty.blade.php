@extends('layouts.app')

@section('content')
@if(Session::has('message'))
  <div class="alert alert-success">
{{Session::get('message')}}

  </div>
@endif

@if(Session::has('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}

    </div>
@endif




{{--    <div class="form-group">--}}
{{--        <div class="col-sm-4">--}}
{{--            <input type="search" name="search" class="form-control" id="search" placeholder="Search here">--}}

{{--        </div>--}}
{{--    </div>--}}

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

        <tbody>


        </tbody>
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

{{--    <script>--}}
{{--        $(document).ready(function(){--}}


{{--                var search = $('#search').val();--}}
{{--                $.ajax({--}}
{{--                   url : "{{route('faculty.search')}}" ,--}}
{{--                    method:'GET',--}}
{{--                   data:{search:search},--}}
{{--                    dataType:'json',--}}
{{--                    success:function(data){--}}
{{--                        $('tbody').html(data.table_data);--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}



{{--    </script>--}}

{{$faculties->links()}}
@endsection