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
            <form method="POST" action="{{ route('contact.confirm') }}">
                @csrf
                <h2>お問い合わせ</h2>
                <div class="contactSub">フォームにお問い合わせ内容と必要事項をご記入ください。<br>
                    1週間以内に返信いたします。</div>
                <div class="contentsBloc">
                    <label for="name">Name  <div class="Asterisk">*</div> </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                    <div>{{ $message }}</div>
                    @enderror
                </div>

                <div class="contentsBloc">
                    <label for="email">Email  <div class="Asterisk">*</div> </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                    <div>{{ $message }}</div>
                    @enderror
                </div>

                <div class="contentsBloc">
                    <label for="message">Message  <div class="Asterisk">*</div> </label>
                    <textarea id="message" name="message" required style="resize: none;" required>{{ old('message') }}</textarea>
                    @error('message')
                    <div>{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btns submit">送信</button>
            </form>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection