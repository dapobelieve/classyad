@extends('layouts.app')

@section('content')

    <div class="container">
        <h5>{{ $category->parent->name }}  &nbsp; > &nbsp; {{ $category->name }}</h5>
        <hr>
        @if ($listings->count())

            @foreach($listings as $listing)
                @include('listing.partials._listing', $listing)
            @endforeach
            
            
        @else
            <p>No listings found</p>
        @endif
    </div>

@stop