@extends('layouts.front')
auth diary index.blade.php
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4 id="hogehoge">My memories</h4>
                <div class="row">
                    <div class="d-flex flex-row">
                        @foreach(Auth::user()->diaries->sortByDesc('date') as $diary)
                            <body class="body-card">
                                <div class="card" style="width: 18rem; background-image: url({{ secure_asset('storage/image/' . $diary->image_path) }});">
                                    <div class="card-content">
                                        {{--<img src="{{ secure_asset('storage/image/' . $diary->image_path) }}">--}}
                                                
                                        <h5 class="card-title">{{ $diary->title }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $diary->date->format('Y年m月d日')}}</h6>
                                        <p class="card-body">{{ $diary->body }}</p>
                                        <a class="button" href="{{ action('Me\DiaryController@show', ['id' => $diary->id])}}" >Let’s see!</a>
                                    </div>
                                </div>
                            </body>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection