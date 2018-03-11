@extends('master')
@section('content')
<div class="card mt-5">
  <div class="card-header">
    <h2>{{$note->title}}</h2>
  </div>
  <div class="card-body">
    <p>
      {{$note->description}}
    </p>
  </div>
</div>
@endsection