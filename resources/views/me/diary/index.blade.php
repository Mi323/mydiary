@extends('layouts.mypage')
@section('title', 'My memories')

@section('content')
    <div class="container">
        <div class="row">
            <h2>My memories</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Me\DiaryController@add') }}" role="button" class="btn btn-primary">Write a diary</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Me\DiaryController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">Title</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
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
                        <tbody>
                            @foreach($posts as $diary)
                                <tr>
                                    <th>{{ $diary->date }}</th>
                                    <td>{{ \Str::limit($diary->title, 100) }}</td>
                                    <td>{{ \Str::limit($diary->body, 250) }}</td>
                                    <td>     
                                        <div>
                                            <a href="{{ action('Me\DiaryController@edit', ['id' => $diary->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Me\DiaryController@delete', ['id' => $diary->id]) }}">削除</a>
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
