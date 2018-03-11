@extends('master')
@section('content')
@if(count($errors->all()))
  <div class="alert alert-danger mt-4 text-white">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif

<form action="{{route('notes.store')}}" method="post" class="mt-5">
  @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control">
  </div>
  <div class="form-group">
    <label for="description">description</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-outline-primary">Add a note</button>
  </div>
</form>
@endsection