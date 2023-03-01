@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="wrapper">
        <div class="overlay-inner overlay-event"></div>
        <!-- メイン -->
        <main class="contactAppStyle inner_v">
            <form method="POST" action="{{ asset('CustomApp') }}" enctype=”multipart/form-data”>
                @csrf
                <div class="app_sendspot_getspot_top">
                    <div class="text-align_start">追加済みアプリ一覧</div>
                    @foreach($apps as $app)
                    <div class="managementFlex2">
                        <li class="appls_name_width">{{ $app->appls_name }}</li>
                        <div>
                            <button type="submit" name="delete" class="contactAppStyleDeleteBtn">削除</button>
                            <input type="hidden" name="deleteApp_name[]" value="{{ $app->appls_name }}">
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="app_sendspot_getspot_bottom">
                    <div class="text-align_start">アプリを追加</div>
                    <div class="contactSub">新しく追加するアプリ名を入力し追加ボタンを押して下さい。</div>
                    <div>
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>
                    <div class="contentsBloc">
                        <label for="name" class="">アプリ名</label>
                        <input type="text" id="" name="name">
                        <button type="submit" name="add" class="">追加</button>
                    </div>
                    <div class="btnsBack"><a href="{{ asset('custom') }}" class="logoutColor "> 戻る</a></div>
                </div>
            </form>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
<?php 
session()->forget('error');
?>
@endsection