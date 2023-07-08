@extends('master')

@section('content')
   
    <form action="{{ route('departments.destroy', $department) }}" method="POST" class="narrow container text-center">
        @csrf
        @method('DELETE')
        <h3 class="alert alert-warning" >Other recordings will be deleted if you delete these department</h3>
        <h1>Delete department</h1>
        <input type="submit" name="delete" value="Confirm" class="btn btn-primary">
        <a href="{{ route('departments.index') }}" class="btn btn-danger">Cancel</a>

      </form>

@endsection
