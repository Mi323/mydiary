@extends('layouts.admin')
@section('title', 'One days diary')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>One day's diary</h2>
                        <tr>
                            <th scope="row">{{$diary->id}}</th>
                            <td>{{$diary->created_at}}</td>
                            <td>{{$diary->title}}</td>
                            <td>{{$diary->body}}</td>
                            <td>{{$diary->image_path}}</td>
                            <div>
                                <a href="{{ action('Admin\DiaryController@edit', ['id' => $diary->id]) }}">編集</a>
                            </div>
                            <div>
                                <a href="{{ action('Admin\DiaryController@delete', ['id' => $diary->id]) }}">削除</a>
                            </div>
                        </tr>
                
            </div>
        </div>
    </div>
@endsection
 