{{-- layouts/Me.blade.phpを読み込む --}}
@extends('layouts.mypage')


{{-- Me.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'My page')

{{-- Me.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <h1>My page</h1>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                
                <h2>Profile</h2>
                
                <p>{{ Auth::user()->name }}</p>
                <p>{{ Auth::user()->birthday }}</p>
                <p>{{ Auth::user()->email }}</p>
                
                <div class="col-md-8 mx-auto">
                    <div class="text-right">
                        <a href="{{ action('Me\MypageController@edit') }}" role="button" class="btn btn-primary">Profileの編集</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h2 id="hogehoge">My memories</h2>
                <div class="row">
                    <div class="d-flex flex-row ">
                        @foreach(Auth::user()->diaries->sortByDesc('date') as $diary)
                            <body class="body-card">
                                <div class="card" style="width: 18rem; background-image: url({{ secure_asset('storage/image/' . $diary->image_path) }});">
                                    <div class="card-content">
                                        {{--<img src="{{ secure_asset('storage/image/' . $diary->image_path) }}">--}}
                                                
                                        <h4 class="card-title">{{ $diary->title }}</h4>
                                        <h4 class="card-subtitle mb-2 text-muted">{{ $diary->date->format('Y年m月d日')}}</h4>
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
        <div class="row">
            <div class="col-md-4">
                <h2>Where I went</h2>
                    
            </div>
        </div>
    </div>
    <script src="{{ secure_asset('js/hoge.js') }}"></script>
@endsection

