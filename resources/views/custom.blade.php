@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>

<body>
    <div id="wrapper">
        <div class="overlay-inner overlay-event"></div>
        <!-- メイン -->
        <main>
            <div class="inner_v">
                <div class="">
                    <h2>カスタム画面</h2>
                    <div class="btns submit"><a href="{{ asset('custom_delivery') }}">配送方法追加</a></div>
                    <div class="btns submit"><a href="{{ asset('custom_app') }}">フリマアプリの追加</a></div>
                    <div class="btns submit"><a href="{{ asset('custom_sendspot') }}">発送場所の追加</a></div>
                    <div class="btns submit"><a href="{{ asset('custom_getspot') }}">受取場所の追加</a></div>
                </div>
            </div>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>
</html>
@endsection

