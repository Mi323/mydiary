@extends('layouts.admin')
@section('title', '登録済みProfile')

@section('content')
    <div class="container">
        <div class="row">
            <h2>My Profile</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('Admin\MypageController@index') }}" method="get">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="admin-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="40%">Name</th>
                                <th width="20%">Birthday</th>
                                <th width="20%">Email</th>
                                <th width="20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $mypage)
                                <tr>
                                    <th>{{ $mypage->name }}</th>
                                    <td>{{ \Str::limit($mypage->birthday, 100) }}</td>
                                    <td>{{ \Str::limit($mypage->email, 250) }}</td>
                                    <td>
                                
                                        <div>
                                            <a href="{{ action('Admin\MypageController@edit', ['id' => $mypage->id]) }}">編集</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection