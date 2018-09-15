@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Auth::check())
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <nav class="nav nav-stacked">
                            <li>
                                <a href="#">Email to a friend</a>
                            </li>
                            <li><a href="#">Add to favorites</a></li>
                        </nav>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ $listing->title }} <small>in</small>  <span class="text-muted">{{ $listing->area->name }}</span></h4>
                </div>

                <div class="panel-body">
                    {!! nl2br($listing->body)  !!}
                    <hr>
                    <p>viewed x times</p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Contact  {{ $listing->user->name }}
                </div>

                <div class="panel-body">
                    @if (Auth::check())
                    <form action="post">
                        <div class="form-group">
                            <label for="message-name">Message</label>
                            <textarea class="form-control" name="message-name" id="message-name" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn default">Send</button>
                            <span class="help-block">
                                This will email {{ $listing->user->name }} and they'll reply to you by email.
                            </span>
                        </div>

                        {{ csrf_field() }}
                    </form>
                    @else
                        <p>Sign up or Sign in to contact listing owners</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@stop