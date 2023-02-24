@extends('layouts.app')

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
        <main class="contactMainStyle">
            <form method="POST" action="{{ asset('custom_end') }}">
                @csrf
                <h2>追加完了</h2>
                <div class="contactSub">以下の内容で登録が完了しました</div>
                <div class="contentsBloc">
                    <label for="name">配送名 : </label>
                    <input type="text" id="name" name="" value="" required>
                </div>
                <div class="contentsBloc">
                    <label for="email">クリック先のURL :</label>
                    <input type="email" id="email" name="" value="" required>
                </div>
                <div class="contentsBloc">
                    <label for="email">画像 :</label>
                    <input type="email" id="email" name="" value="" required>
                </div>
                <div class="contentsBloc">
                    <label for="email">オプション :</label>
                    <input type="checkbox" name="track" value="track">追跡
                    <input type="checkbox" name="anonymous" value="anonymous">匿名
                    <input type="checkbox" name="safety" value="safety">補償
                </div>
                <div class="contentsBloc">
                    <label for="email">梱包方法 :</label>
                    <div class="">
                        <input type="checkbox" name="" id="box" value="box">箱
                    </div>
                </div>
                <div class="contentsBloc">
                    <label for="message">詳細 :</label>
                    <textarea id="message" name="message" required style="resize: none;" required></textarea>
                </div>
                <div>
                    <button type="submit" class="btns submit">管理画面トップ</button>
                </div>
            </form>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection