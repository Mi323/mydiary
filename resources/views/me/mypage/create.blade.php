{{-- layouts/Me.blade.phpを読み込む --}}
@extends('layouts.me')


{{-- Me.blade.phpの@yield('title')に'プロフィールの新規作成'を埋め込む --}}
@section('title', 'My page')

{{-- Me.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My page</h2>
                
                    <form action="{{ action('Me\MypageController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2"for="name">Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="birthday">Birthday</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" >
                            @if($errors->has('birthday'))
                            <p class="text-danger" style="margin-bottom: 50px;">{{ $errors->first('birthday') }}</p>
                            @endif
                            </div>
                    </div>
            
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection

