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
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="20%">Date</th>
                                <th width="20%">Title</th>
                                <th width="50%">Boby of diary</th>
                            </tr>
                        </thead>
                        <div class="row">
                            <h4>My memories</h4>
                        <tbody>
                            @foreach(Auth::user()->diaries as $diary)
                                <tr>
                                    <td>{{ $diary->created_at}}</td>
                                    <td>{{ $diary->title }}</td>
                                    <td>{{ $diary->body }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\DiaryController@show', ['id' => $diary->id]) }}">詳細</a>
                                        </div>
                                    </td>
                                </tr>    
                            @endforeach 
                        </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

