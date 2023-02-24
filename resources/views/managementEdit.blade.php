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
                    <h2>編集画面</h2>
                    <div class="contentsBlocManege">
                        <label for="name">配送名:</label>
                        <input type="text" id="name" name="name" value="{{$managements->name}}{{ old('name') }}" required>
                        <input type="hidden" id="name" name="id" value="{{$managements->id}}" required>
                        @error('name')
                        <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class=" contentsBlocManege">
                        <label for="url">URL:</label>
                        <input type="text" id="url" name="url" value="{{$managements->url}}{{ old('url') }}" required>
                    </div>

                    <div class="contentsFlex">
                        <label for="email">画像URL:</label>
                        <input type="text" id="image" name="image" value="{{$managements->image}}{{ old('image') }}" required>
                    </div>

                    <div class="contentsFlex">
                        <label for="email">箱:</label>
                        <input type="text" id="boxFlag" name="boxFlag" value="{{$managements->boxFlag}}{{ old('boxFlag') }}" required>
                    </div>

                    <div class="contentsFlex">
                        <label for="email">追跡:</label>
                        <input type="text" id="trackFlag" name="trackFlag" value="{{$managements->trackFlag}}{{ old('trackFlag') }}" required>
                    </div>

                    <div class="contentsFlex">
                        <label for="email">匿名:</label>
                        <input type="text" id="anonymousFlag" name="anonymousFlag" value="{{$managements->anonymousFlag}}{{ old('anonymousFlag') }}" required>
                    </div>

                    <div class="contentsFlex">
                        <label for="email">補償:</label>
                        <input type="text" id="safetyFlag" name="safetyFlag" value="{{$managements->safetyFlag}}{{ old('safetyFlag') }}" required>
                    </div>

                    <div class="contentsFlex">
                        <label for="email">縦:</label>
                        <input type="text" id="height" name="height" value="{{$managements->height}}{{ old('height') }}" required> cm
                    </div>

                    <div class="contentsFlex">
                        <label for="email">横:</label>
                        <input type="text" id="width" name="width" value="{{$managements->width}}{{ old('width') }}" required> cm
                    </div>

                    <div class="contentsFlex">
                        <label for="email">厚さ:</label>
                        <input type="text" id="profound" name="profound" value="{{$managements->profound}}{{ old('profound') }}" required> cm
                    </div>

                    <div class="contentsFlex">
                        <label for="email">詳細:</label>
                        <input type="text" id="detail" name="detail" value="{{$managements->detail}}{{ old('detail') }}" required>
                    </div>

                    <button type="submit" class="manegeSibmitMargin ">送信</button>
                    </div>
            </form>

        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection