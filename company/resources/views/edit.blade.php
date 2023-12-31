@extends('master')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

    @endforeach
    </ul>
</div>

@endif

<div class="card">
    <div class="card-header">Edit department</div>
    <div class="card-body">
        <form method="post" action="{{ route('departments.update',$department->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{ $department->name }}" />
                </div>
            </div>
            {{--  --}}
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Location</label>
                <div class="col-sm-10">
                    <input type="text" name="location" class="form-control"  value="{{ $department->location }}"/>
                </div>
            </div>
            
            
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $department->id}}" />
                <input type="submit" class="btn btn-primary" value="SAVE" />
            </div>
        </form>
    </div>
</div>

@endsection('content')
