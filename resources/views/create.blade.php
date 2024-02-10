
@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <form method="POST" action="{{route('tasks.store')}}">
        @csrf
        <input type="text" name="title" id="title">
        <textarea type="text" name="description" id="description"></textarea>
        <textarea type="text" name="long_description" id="long_description"></textarea>
        <button type="submit">Send</button>
    </form>
@endsection
