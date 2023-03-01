@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>検索画面</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
</head>

<body id="search">
    <div id="wrapper">
        <div class="overlay-inner overlay-event"></div>
        <!-- メイン -->
        <main class="inner_v">
            <h2>検索画面</h2>
            <div class="subtextSearch">商品の特徴を入力してください。</div>
            <form action="{{ asset('search2_admin') }}" method="post">
                @csrf
                <section>
                    <h3>利用しているアプリ</h3>
                    <div class="check App">
                        <select name="selectApp" class="selectAppStyle">
                            <option value="利用していない">利用していない</option>
                            <option value="メルカリ">メルカリ</option>
                            <option value="ラクマ">ラクマ</option>
                            <option value="ヤフオク">ヤフオク</option>
                            <option value="PayPayフリマ">PayPayフリマ</option>
                        </select>
                    </div>
                </section>
                <section>
                    <h3>受け取り場所</h3>
                    <div class="check receive">
                        <select name="selectGet" class="selectAppStyle">
                            <option value="どこでも良い">どこでも良い</option>
                            <option value="郵便受け">郵便受け</option>
                            <option value="コンビニ">コンビニ</option>
                            <option value="郵便局">郵便局</option>
                            <option value="対面受取">対面受取</option>
                        </select>
                    </div>
                </section>
                <section>
                    <h3>発送場所</h3>
                    <div class="check send">
                        <select name="selectSend" class="selectAppStyle">
                            <option value="どこでも良い">どこでも良い</option>
                            <option value="郵便局">郵便局</option>
                            <option value="郵便ポスト">郵便ポスト</option>
                            <option value="ヤマト営業所">ヤマト営業所</option>
                            <option value="セブン-イレブン">セブン-イレブン</option>
                            <option value="ファミリーマート">ファミリーマート</option>
                            <option value="ローソン">ローソン</option>
                            <option value="スマリボックス">スマリボックス</option>
                            <option value="宅急便ロッカーPUDO">宅急便ロッカーPUDO</option>
                            <option value="メルカリポスト">メルカリポスト</option>
                        </select>
                    </div>
                </section>
                <section>
                    <h3>オプション</h3>
                    <div class="check option ">
                        <input type="checkbox" name="track" value="track">追跡
                        <input type="checkbox" name="anonymous" value="anonymous">匿名
                        <input type="checkbox" name="safety" value="safety">補償
                    </div>
                </section>
                <section>
                    <h3>封筒より箱が良い</h3>
                    <div class="check box">
                        <input type="checkbox" name="box" id="box" value="box">はい
                    </div>
                </section>
                <section>
                    <h3>サイズ</h3>
                    <div class="check size">
                        <label for="height">
                            縦
                            <input type="text" name="height" value="10">cm
                        </label>
                        <label for="width">
                            横
                            <input type="text" name="width" value="20">cm
                        </label>
                        <label for="thickness">
                            横
                            <input type="text" name="thickness" value="3">cm
                        </label>
                    </div>
                </section>
                <div class="formbottom">
                    <input type="submit" name="submit" class="btns submit" value="検索結果を見る" >
                </div>
            </form>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection
