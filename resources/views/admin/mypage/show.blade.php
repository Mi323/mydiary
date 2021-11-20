{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'My page')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My page</h2>
                
                <h3>Profile</h3>
                
                <p>{{ Auth::user()->name }}</p>
                <p>{{ Auth::user()->birthday }}</p>
                <p>{{ Auth::user()->email }}</p>
                
                <div class="col-md-4">
                <div class="text-right">
                <a href="{{ action('Admin\MypageController@edit') }}" role="button" class="btn btn-primary">Profileの編集</a>
                </div>
                
                <div class="card" style="width: 18rem;">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect fill="#868e96" width="100%" height="100%"/><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text></svg>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>
@endsection