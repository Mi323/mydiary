{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'My page')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <h2>My page</h2>
        </div>
        
        <div class="row">
            <div class="col-md-4 mx-auto">
                
                <h3>Profile</h3>
                
                <p>{{ Auth::user()->name }}</p>
                <p>{{ Auth::user()->birthday }}</p>
                <p>{{ Auth::user()->email }}</p>
                
                <div class="col-md-8 mx-auto">
                    <div class="text-right">
                        <a href="{{ action('Admin\MypageController@edit') }}" role="button" class="btn btn-primary">Profileの編集</a>
                    </div>
                </div>
            </div>
        </div>
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
                                        <a class="button" href="{{ action('Admin\DiaryController@show', ['id' => $diary->id])}}" >Let’s see!</a>
                                    </div>
                                </div>
                            </body>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>                    
    </div>
    <script src="{{ secure_asset('js/hoge.js') }}"></script>
@endsection

