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
        <main class="contactMainStyle">
            <form method="POST" action="{{ route('contact.complete') }}">
                @csrf
                <h2 class="confirmH2">お問い合わせ内容の確認</h2>
                @foreach ($validatedData as $key => $value)
                <div class="managementFlex2">
                    <label>{{ ucfirst($key) }}:</label>
                    <div class="confirmInput">{{ $value }}</div>
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                </div>
                @endforeach

                <div class="confirmButtonFlex">
                    <button type="button" class="btns submit" onclick=history.back()>戻る</button>
                    <button type="submit" name="action" class="btns submit" value="submit">送信</button>
                </div>
            </form>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection