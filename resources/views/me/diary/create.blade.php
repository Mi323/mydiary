@extends('layouts.me')
@section('title', 'Write a diary')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Write a diary</h2>
                <form action="{{ action('Me\DiaryController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">Date</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">Title</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">Body of diary</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">Picture</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">I went...</label>
                        <div class="col-md-10">
                            
                                <input type="text" value="長野県松本市" id="address">
                                <button type="button" value="検索" id="map_button">検索</button>
                            
                            <!-- 地図を表示させる要素 -->
                            <div class="map_box01">
                                <div id="map-canvas" style="width: 500px;height: 350px;"></div>
                                <script src="{{ asset('/js/diary.js') }}"></script>
                            </div>
                            <p>マーカーのある位置の<br>
                            緯度 <input type="text" id="lat" value=""><br>
                            経度 <input type="text" id="lng" value=""><br>
                            地図上をクリックするとマーカーを移動できます。</p>
                            
                            <!-- APIを取得 -->
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMRelByKAUAEdayqCkWDBEkRo52gH4goM&callback=initMap&v=weekly" async>
                        </script>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}"> 
                    <input type="hidden" name="lat" value="緯度">
                    <input type="hidden" name="lng" value="経度">
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection