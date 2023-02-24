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

<body>
    <div id="wrapper">
        <div class="overlay-inner overlay-event"></div>
        <!-- メイン -->
        <main>
            <form method="POST" action="{{ route('managementUpdate') }}" class="inner_v">
                <div class="managementBackColor">
                    @csrf
                    <button type="submit" class="btns submit">送信</button>
                </div>
            </form>

        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection