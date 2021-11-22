@extends('layouts.me')
views/me/diary/show.blade.php
@section('title', 'One days diary')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>One day's diary</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ secure_asset('storage/image/' . $diary->image_path) }}">
                            <div class="card-body text-dark">
                                {{--<th scope="row">{{$diary->id}}</th>--}}
                                <td class="text-dark">{{$diary->date->format('Y年m月d日')}}</td>
                                <h5 class="card-title">{{$diary->title}}</h5>
                                <p class="card-text">{{$diary->body}}</p>
                                <div class="text-right">
                                    <a href="{{ action('Me\DiaryController@edit', ['id' => $diary->id]) }}">編集</a>
                                    <a href="{{ action('Me\DiaryController@delete', ['id' => $diary->id]) }}">削除</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        {{--<tr>
                            <th scope="row">{{$diary->id}}</th>
                            <td>{{$diary->date->format('Y年m月d日')}}</td>
                            <td>{{$diary->title}}</td>
                            <td>{{$diary->body}}</td>
                            <td><img src="{{ secure_asset('storage/image/' . $diary->image_path) }}"></td>
                            <div>
                                <a href="{{ action('Me\DiaryController@edit', ['id' => $diary->id]) }}">編集</a>
                            </div>
                            <div>
                                <a href="{{ action('Me\DiaryController@delete', ['id' => $diary->id]) }}">削除</a>
                            </div>
                        </tr>--}}
                
@endsection
 