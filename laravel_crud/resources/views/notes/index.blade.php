@extends('master')
@section('content')
@foreach($notes as $note)
<div class="card my-2">
  <div class="card-body">
    <h4>
      <a href="{{route('notes.show', $note->id)}}">
        {{$note->title}}
      </a>

      @auth
      <a href="{{route('notes.edit', $note->id)}}" class="btn btn-outline-info">Edit</a>
      <form class="d-inline" action="{{route('notes.destroy', $note->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger">Delete</button>
      </form>
      @endauth

    </h4>
  </div>
</div>
@endforeach
{{$notes->links()}}
@endsection