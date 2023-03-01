<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            // メニューを非表示にする
            $('.Menu').hide();

            // メニューボタンをクリックしたときの処理
            $('.Menu-OpenBtn').on('click', function() {
                // メニューを表示する
                $('.Menu').show();
            });

            // メニューの閉じるボタンをクリックしたときの処理
            $('.Menu-CloseBtn').on('click', function() {
                // メニューを非表示にする
                $('.Menu').hide();
            });
        });

        $(function() {
            // メニューボタンをクリックしたときの動作
            $('.Menu-OpenBtn').on('click', function() {
                $('.Menu').addClass('Menu-Open');
            });

            // 閉じるボタンをクリックしたときの動作
            $('.Menu-CloseBtn').on('click', function() {
                $('.Menu').removeClass('Menu-Open');
            });
        });
    </script>
    <!-- Scripts -->
    @vite([ 'resources/js/app.js'])

</head>

<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm header-height">
            <div class="container containerFlex">
                <a class="navbar-brand" href="{{ asset('admin') }}">
                    {{ __('らくらく配達') }}
                </a>

                <!-- PC -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('管理者用ログイン') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('登録') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ asset('admin') }}">
                                {{ __('管理者画面') }}
                            </a>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('ログアウト') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        </li>
                        @endguest
                        <li class="nav__item"><a href="{{ asset('index_admin') }}">トップ</a></li>
                        <li class="nav__item"><a href="{{ asset('search/searchTop_admin') }}">検索</a></li>
                        <li class="nav__item"><a href="https://rakuhai.myshopify.com/">オンラインストア</a></li>
                    </ul>
                </div>
                <!-- SP -->
                <div class="Menu-OpenBtn1">
                    <button type="button" class="Menu-OpenBtn">メニュー</button>
                    <nav class="Menu">
                        <button type="button" class="Menu-CloseBtn">
                            <svg xmlns="http://www.w3.org/2000/svg" class="Menu-CloseBtn-Icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <!-- Authentication Links -->
                        <ul>
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item Menu-Group-Item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item Menu-Group-Item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('登録') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown Menu-Group-Item">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ asset('admin') }}">
                                    {{ __('管理者画面') }}
                                </a>

                            <li class="nav-item Menu-Group-Item">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('ログアウト') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            </li>
                            @endguest
                            <li class="nav__item Menu-Group-Item"><a href="{{ asset('index_admin') }}">トップ</a></li>
                            <li class="nav__item Menu-Group-Item"><a href="{{ asset('search/searchTop_admin') }}">検索</a></li>
                            <li class="nav__item Menu-Group-Item"><a href="https://rakuhai.myshopify.com/">オンラインストア</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>