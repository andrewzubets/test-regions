@extends('layouts.main')

@section('title', 'О нас')

@section('content')
    <h1>О нас</h1>
    @if(!empty($record))
        <p>{{$record->content}}</p>
    @endif
@endsection
