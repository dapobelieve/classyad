@extends('layouts.app')

@section('content')

    <div class="container">
        @foreach($categories as $category)
            <div class="col-md-4">
                <h3>{{ $category->name }}</h3>
                <hr>
                @foreach($category->children as $sub)
                    <h5><a href="{{ route('category.listings.index', [$area, $sub->slug]) }}">{{ $sub->name }}</a> ({{ $sub->listings->count() }})</h5>
                @endforeach
            </div>
            
        @endforeach
    </div>

@stop