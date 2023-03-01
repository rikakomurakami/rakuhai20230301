@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>配送方法追加画面</title>
</head>

<body>
    <div id="wrapper">
        <div class="overlay-inner overlay-event"></div>
        <!-- メイン -->
        <main class="customMainStyle">
            <form method="POST" action="{{ asset('custom_delivery_bottom') }}" enctype=”multipart/form-data”>
                @csrf
                <h2>配送方法の追加</h2>
                <!-- <div class="contactSub">新規配送方法の情報を入力してください。</div> -->
                <div>
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="contentsBloc">
                    <label for="app" class="customSubTitle">2, 配送料金を入力してください。(税込)</label>
                    <!-- アプリ選択欄で複数チェックされていたら -->
                    @if(count($selectedItems) > 1)
                        @foreach($selectedItems as $selectedItem)
                        <div class="contentsBloc_flex contentsBloc_flex_Padding">
                            @if($selectedItem == "利用していない")
                            <div>アプリを利用しない場合</div>
                            @else
                            {{ $selectedItem }}を利用した場合
                            @endif
                            <input type="number" name="arrayMoney[{{ $selectedItem }}]" class="customInputStyle" required>円
                        </div>
                        @endforeach
                    @else <!-- それ以外 -->
                        @foreach($selectedItems as $selectedItem)
                        <div class="contentsBloc_flex contentsBloc_flex_Padding">
                            @if($selectedItem !== "利用していない")
                            {{ $selectedItem }}を利用した場合
                            @endif
                            <input type="number" name="arrayMoney[{{ $selectedItem }}]" class="customInputStyle" required>円
                        </div>
                        @endforeach
                    @endif
                </div>
                <div class="customYellowBtn">
                    <input type="button" name="submit" class="btns submit" value="戻る" onclick="history.back();">
                    <button type="submit" class="btns submit">次へ</button>
                </div>
            </form>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection