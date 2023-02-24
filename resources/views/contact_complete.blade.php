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
        <main class="contactMainStyle completeMainStyle">
            <form method="POST" action="{{ route('contact.complete') }}">
                @csrf
                <h2 class="confirmH3">メール送信完了</h2>
                <div class="confirmButtonFlex">
                    <a href="{{ asset('index') }}" class="btns submit">トップへ戻る</a>
                </div>
            </form>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection