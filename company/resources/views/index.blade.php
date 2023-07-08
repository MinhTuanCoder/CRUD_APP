@extends('master')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
    {{ $message }}
</div>

@endif

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>department Data</b></div>
            <div class="col col-md-6">
                <a href="{{ route('departments.create') }}" class="btn btn-success float-end">+ Add</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th class="text-center">Action</th>
            </tr>
            @if(count($data) > 0)

                @foreach($data as $row)

                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name}}</td>
                        <td>{{ $row->location}}</td>
                      
                        <td class="text-center">
                            <form method="get" action="{{ route('departments.confirm', $row->id) }}">
                                @csrf
                                <a href="{{ route('departments.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('departments.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
                            </form>
                        </td>
                        
                        
                    </tr>

                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
            @endif
        </table>
        {!! $data->render('pagination::bootstrap-5') !!}
    </div>
</div>

@endsection
