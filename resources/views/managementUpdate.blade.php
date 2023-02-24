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
            <form method="POST" action="{{ route('managementEnd') }}" class="inner_v">
                <div class="managementBackColorUpdate">
                    @csrf
                    <h2>確認画面</h2>

                    <div class="contentsFlex">
                        <label for="url">配送名:</label>
                        <div> {{$name}}</div>
                        <input type="hidden" name="name" value="{{$name}}">
                        <input type="hidden" name="id" value="{{$id}}">
                    </div>

                    <div class="contentsFlex">
                        <label for="email">URL:</label>
                        <div>{{$url}}</div>
                        <input type="hidden" name="url" value="{{$url}}">
                    </div>

                    <div class="contentsFlex">
                        <label for="email">画像URL:</label>
                        <div>{{$image}}</div>
                        <input type="hidden" name="image" value="{{$image}}">
                    </div>

                    <div class="contentsFlex">
                        <label for="email">箱:</label>
                        <div>{{$boxFlag}}</div>
                        <input type="hidden" name="boxFlag" value="{{$boxFlag}}">
                    </div>

                    <div class="contentsFlex">
                        <label for="email">追跡:</label>
                        <div>{{$trackFlag}}</div>
                        <input type="hidden" name="trackFlag" value="{{$trackFlag}}">
                    </div>

                    <div class="contentsFlex">
                        <label for="email">匿名:</label>
                        <div>{{$anonymousFlag}}</div>
                        <input type="hidden" name="anonymousFlag" value="{{$anonymousFlag}}">
                    </div>

                    <div class="contentsFlex">
                        <label for="email">補償:</label>
                        <div>{{$safetyFlag}}</div>
                        <input type="hidden" name="safetyFlag" value="{{$safetyFlag}}">
                    </div>

                    <div class="contentsFlex">
                        <label for="email">縦:</label>
                        <div>{{$height}}</div>
                        <input type="hidden" name="height" value="{{$height}}">cm
                    </div>

                    <div class="contentsFlex">
                        <label for="email">横:</label>
                        <div>{{$width}}</div>
                        <input type="hidden" name="width" value="{{$width}}">cm
                    </div>

                    <div class="contentsFlex">
                        <label for="email">厚さ:</label>
                        <div>{{$profound}}</div>
                        <input type="hidden" name="profound" value="{{$profound}}">cm
                    </div>

                    <div class="contentsFlex">
                        <label for="email">詳細:</label>
                        <div>{{$detail}}</div>
                        <input type="hidden" name="detail" value="{{$detail}}">
                    </div>

                    <button type="submit" class="manegeupdateSibmitMargin">送信</button>
                </div>
            </form>

        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection