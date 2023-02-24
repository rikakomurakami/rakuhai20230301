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
                <h2>配送方法入力画面</h2>
                <div class="contactSub">フォームにお問い合わせ内容と必要事項をご記入ください。<br>
                    1週間以内に返信いたします。</div>
                <div class="contentsBloc">
                    <label for="name">配送名 <div class="Asterisk">*</div> </label>
                    <input type="text" id="" name="name" value="" required>
                </div>
                <div class="contentsBloc">
                    <label for="url">クリック先のURL <div class="Asterisk">*</div> </label>
                    <input type="text" id="" name="url" value="" required>
                </div>
                <div class="contentsBloc">
                    <label for="image">画像 <div class="Asterisk">*</div> </label>
                    <input type="text" id="" name="image" value="" required>
                </div>
                <div class="contentsBloc">
                    <label for="option">オプション <div class="Asterisk">*</div> </label>
                    <input type="checkbox" name="track" value="track">追跡
                    <input type="checkbox" name="anonymous" value="anonymous">匿名
                    <input type="checkbox" name="safety" value="safety">補償
                </div>
                <div class="contentsBloc">
                    <label for="box">梱包方法 <div class="Asterisk">*</div> </label>
                    <div class="">
                        <input type="checkbox" name="box" id="box" value="box">箱
                    </div>
                </div>
                <div class="contentsBloc">
                    <label for="detail">詳細 <div class="Asterisk">*</div> </label>
                    <textarea id="message" name="detail" required style="resize: none;" required></textarea>
                </div>
                <div>
                    <button type="submit" class="btns submit">戻る</button>
                    <button type="submit" class="btns submit">入力内容を追加</button>
                </div>
            </form>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection