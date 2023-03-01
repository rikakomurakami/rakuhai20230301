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
            <form method="POST" action="{{ asset('custom_delivery_middle') }}" enctype=”multipart/form-data”>
                @csrf
                <h2>配送方法の追加</h2>
                <!-- <div class="contactSub">新規配送方法の情報を入力してください。</div> -->
                <div class="contentsBloc_flex_Padding">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                </div>
                <div class="contentsBloc">
                    <label for="app" class="customSubTitle">1, 連携しているアプリにチェックを入れて次に進んでください。(複数可)</label>
                    @foreach($apps as $app)
                    <div class="contentsBloc_flex contentsBloc_flex_Padding">
                        <input type="checkbox" name="appArray[]" value="{{ $app->appls_name }}" id="app_{{ $app->id }}" class="app-checkbox">
                        @if($app->appls_name == "利用していない")
                        連携しなくても利用可能
                        @else
                        {{ $app->appls_name }}
                        @endif
                    </div>
                    @endforeach
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