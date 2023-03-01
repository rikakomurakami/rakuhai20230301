@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>配送方法入力画面</title>
</head>

<body>
    <div id="wrapper">
        <div class="overlay-inner overlay-event"></div>
        <!-- メイン -->
        <main class="customMainStyle customMainStyle_margin">
            <form method="POST" action="{{ asset('custom_delivery_confirm') }}" enctype=”multipart/form-data”>
                @csrf
                <h2>配送方法入力画面</h2>
                <div>
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div>
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                </div>
                <div>
                    @if(session('error2'))
                    <div class="alert alert-danger">
                        {{ session('error2') }}
                    </div>
                    @endif
                </div>
                <div class="custom_delivery_bottom_margin">
                    <div class="contentsBloc">
                        <label for="app" class="customSubTitle">3, その他の情報を入力し、確認画面へ進んでください。</label>
                    </div>
                    <table>
                        <tr>
                            <th>
                                <div class="custom_delivery_bottom_flex_sub">
                                    <label for="name">・配送名</label>
                                    <div class="Asterisk"> *</div>
                                </div>
                            </th>
                            <td><input type="text" id="" name="name" value="{{ old('name') }}" required></td>
                        </tr>
                        <tr>
                            <th>
                                <div class="custom_delivery_bottom_flex_sub">
                                    <label for="name">・発送場所(複数可)</label>
                                    <div class="Asterisk"> *</div>
                                </div>
                            </th>
                            <td>
                                @foreach($sendspots as $sendspot)
                                @if($sendspot->sendspot_name !== "どこでも良い")
                                <input type="checkbox" name="sendspot_name[]" value="{{ $sendspot->sendspot_name }}" id="appple">{{ $sendspot->sendspot_name }}
                                @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                            <div class="custom_delivery_bottom_flex_sub">
                                    <label for="name">・受取場所(複数可)</label>
                                    <div class="Asterisk"> *</div>
                                </div>
                            </th>
                            </th>
                            <td>
                                @foreach($getspots as $getspot)
                                @if($getspot->getspot_name !== "どこでも良い")
                                <input type="checkbox" name="getspot_name[]" value="{{ $getspot->getspot_name }}" id="appple">{{ $getspot->getspot_name }}
                                @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div class="custom_delivery_bottom_flex_sub">
                                    <label for="url">・クリック先のURL</label>
                                    <div class="Asterisk"> *</div>
                                </div>
                            </th>
                            <td>
                                <input type="text" class="urlInput_width" name="url" value="{{ old('url') }}" required>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div class="custom_delivery_bottom_flex_sub">
                                    <label for="image">・画像</label>
                                    <div class="Asterisk"> *</div>
                                </div>
                            </th>
                            <td><input type="file" name="image" required></td>
                        </tr>
                        <tr>
                            <th>
                                <div class="custom_delivery_bottom_flex_sub">
                                    <label for="image">・オプション</label>
                                    <div class="Asterisk"> *</div>
                                </div>
                            </th>
                            <td>
                                <input type="checkbox" name="track">追跡
                                <input type="checkbox" name="anonymous">匿名
                                <input type="checkbox" name="safety">補償
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div class="custom_delivery_bottom_flex_sub">
                                    <label for="image">・梱包方法</label>
                                    <div class="Asterisk"> *</div>
                                </div>
                            </th>
                            <td>
                                <input type="checkbox" name="box" id="box">箱
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div class="custom_delivery_bottom_flex_sub">
                                    <label for="image">・サイズ</label>
                                    <div class="Asterisk"> *</div>
                                </div>
                            </th>
                            <td>
                                <label for="height">縦</label>
                                <input type="text" class="custom_delivery_bottom_sizeInput" name="height" value="{{ old('height') }}" required>cm
                                <label for="width">横</label>
                                <input type="text" class="custom_delivery_bottom_sizeInput" name="width" value="{{ old('width') }}" required>cm
                                <label for="thickness">厚さ</label>
                                <input type="text" class="custom_delivery_bottom_sizeInput" name="thickness" value="{{ old('width') }}" required>cm
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div class="custom_delivery_bottom_flex_sub">
                                    <label for="image">・詳細</label>
                                    <div class="Asterisk"> *</div>
                                </div>
                            </th>
                            <td><textarea id="message" name="detail" required style="resize: none;" required>{{ old('detail') }}</textarea></td>
                        </tr>
                    </table>
                    <div class="copyright">
                        <input type="button" name="submit" class="btns submit" value="戻る" onclick="history.back();">
                        <button type="submit" class="btns submit">次へ</button>
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