@extends('layouts.me')
@section('title', 'Profileの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Profileの編集</h2>
                <form action="{{ action('Me\MypageController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">Birthday</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="birthday" value="{{ Auth::user()->birthday }}">
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">Email</label>
                        <div class="col-md-10">
                            <input class="form-control" name="email" value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection