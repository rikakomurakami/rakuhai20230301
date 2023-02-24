@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson Sample Site</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
</head>

<body class="End">
    <div id="wrapper">
        <div class="overlay-inner overlay-event"></div>
        <!-- メイン -->
        <main>
            <form class="inner_v">
                <div class="managementBackColor managementBackColorButtom">
                    <div class="managementPadding">
                        <p>情報が更新されました。</p>
                        <a href="{{ asset('/management') }}" class="btns submit managementButton">管理画面一覧へ戻る</a>
                    </div>
                </div>
            </form>
    </main>
    <!-- フッター -->
    @include('footer')
    </div>
</body>

</html>
@endsection