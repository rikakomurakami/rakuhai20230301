@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録内容の確認</title>
</head>

<body>
    <div id="wrapper">
        <div class="overlay-inner overlay-event"></div>
        <!-- メイン -->
        <main class="contactMainStyle">
            <form method="POST" action="{{ asset('custom_end') }}">
                @csrf
                <h2>登録内容の確認</h2>
                <div class="contentsBloc">
                    <label for="name">配送名 : </label>
                    <div class="name">{{ $requestSend['name'] }}</div>
                </div>
                <div class="contentsBloc">
                    <label for="sendspot">発送場所 :</label>
                    @foreach($requestSendSpot as $sendspot)
                    {{ $sendspot }}
                    @endforeach
                </div>
                <div class="contentsBloc">
                    <label for="sendspot">受取場所 :</label>
                    @foreach($requestGetSpot as $getspot)
                    {{ $getspot }}
                    @endforeach
                </div>
                <div class="contentsBloc">
                    <label for="email">クリック先のURL :</label>
                    <div class="url">{{ $requestSend['url'] }}</div>
                </div>
                <div class="contentsBloc">
                    <label for="email">画像 :</label>
                    <div class="image">{{ $requestSend['image'] }}</div>
                </div>
                <div class="contentsBloc">
                    <label for="email">オプション :</label>
                    <div class="track">{{ $requestSend['track'] }}</div>
                    <div class="anonymous">{{ $requestSend['anonymous'] }}</div>
                    <div class="safety">{{ $requestSend['safety'] }}</div>
                </div>
                <div class="contentsBloc">
                    <label for="email">梱包方法 :</label>
                    <div class="">
                    <div class="box">{{ $requestSend['box'] }}</div>
                    </div>
                </div>
                <div class="contentsBloc">
                    <label for="message">詳細 :</label>
                    <div class="detail">{{ $requestSend['detail'] }}</div>                    
                </div>
                <div>
                    <button type="submit" class="btns submit">登録</button>
                </div>
            </form>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection