@extends('master')
@section('content')
@if(count($errors->all()))
  <div class="alert alert-danger mt-4 text-white">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif

<form action="{{route('notes.update', $note->id)}}" method="post" class="mt-5">
  @csrf
  @method('put')
  <div class="form-group">
    <label for="title">Title</label>
    <input value="{{$note->title}}" type="text" name="title" id="title" class="form-control">
  </div>
  <div class="form-group">
    <label for="description">description</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$note->description}}</textarea>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-outline-primary">Update a note</button>
  </div>
</form>
@endsection