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
        <main class="customMainStyle copyright">
            <form class="copyright">
                <div class="contentsBloc">
                    <p>登録が完了しました。</p>
                </div>
                <div class="btns submit"><a href="{{ asset('admin') }}" class="logoutColor "> 管理画面トップへ</a></div>
            </form>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection