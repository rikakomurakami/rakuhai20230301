@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html>

<body>
    <div id="wrapper">
        <div class="overlay-inner overlay-event"></div>
        <!-- メイン -->
        <main>
            <div id="topFlex" class="inner_v">
                <div class="topImg">
                    <div class="catchCopy1">小物特化型</div>
                    <div class="catchCopy2">30秒で最適な配送方法を検索!</div>
                    <img src="{{ asset('storage/top.svg') }}">
                </div>
                <div class="aFlex">
                    <a href="{{ asset('search/searchTop') }}" class="btn_v1 btn-border_v btn-color1 btnTop">
                        <span>配送方法検索</span>
                    </a>
                    <a href="https://rakuhai.myshopify.com/" class="btn_v btn-border_v btn-color btnTop">
                        <span>梱包材を購入</span>
                    </a>
                </div>
            </div>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection