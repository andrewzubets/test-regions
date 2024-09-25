@extends('layouts.main')

@section('title', 'Главная')

@section('content')
    <h1>Список городов</h1>
    <div class="region-list-wrapper">
    <div class="region-list">
        @if(!empty($regions))
        @foreach($regions as $region)
            <div @class([
                    'region' => true,
                    'active' => $region->is_active,
                    ])>
                <a href="{{$region->href}}">{{$region->name}}</a>
            </div>
        @endforeach
        @endif
    </div>
    </div>
    {{$regions->links()}}
@endsection
