@extends('layouts.main')

@section('title', 'Новости')

@section('content')
    @if(!empty($record))
    <h1>{{$record->title}}</h1>
    <p>{{$record->content}}</p>
    @endif
@endsection
