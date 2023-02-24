@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson Sample Site</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const query = `{
            shop {
                name
            }
        }`;

        function apiCall(query) {
            return fetch("https://rakuhai.myshopify.com/api/2020-10/graphql.json", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-Shopify-Storefront-Access-Token": "c6b10a6435dc28993085f84b809d24d2", //Storefront APIのアクセストークンを入力します
                },
                body: JSON.stringify({
                    query
                }),
            }).then((response) => response.json());
        }

        apiCall(query).then((response) => {
            console.log(response);
        });

        function getProducts() {
            const query = `{
            products(first: 20) {
                edges {
                node {
                    title
                    description
                    images(first: 1) {
                    edges{
                        node {
                        altText
                        transformedSrc(maxWidth: 400, maxHeight: 400)
                        }
                    }
                    }
                }
                }
            }
            }`;
            return apiCall(query);
        }

        $(document).ready(function() {
            const $app = $("#app");
            getProducts().then((response) => {
                console.log(response);
                $app.append("<div class='products'></div>");
                const $products = $(".products");
                response.data.products.edges.forEach((product) => {
                    const template = `<div class="product"> <h2>${product.node.title}</h2> <img alt="${product.node.images.edges[0].node.altText}" src="${product.node.images.edges[0].node.transformedSrc}"> <p>${product.node.description}</p> </div>`;
                    $products.append(template);
                });
            });
        });

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
</head>

<body class="searchResult">
    <div id="wrapper">
        <div class="overlay-inner overlay-event"></div>
        <!-- メイン -->
        <main class="inner_v">
            <form action="{{ asset('') }}" method="post">
                <h2>おすすめ順</h2>
                @csrf
                <section>
                    <!-- 検索結果が0だった場合 -->
                    <?php
                    if ($deliverys->isEmpty()) {
                        echo "<div class='isEmpty'>検索に当てはまる配送方法がありませんでした。<br>検索内容を変えてもう一度お試しください。</div>";
                    }
                    ?>
                    <!-- オススメ配送表示 -->
                    @foreach ($deliverys as $delivery)
                    <div class="contents">
                        <a href="{{ $delivery->url }}" target="_blank">
                            <div class="log">
                                <img src="{{ $delivery->image }}">
                            </div>
                            <h3>{{ $delivery->name }}</h3>
                            <div class="subcontents subcontents_font">
                                <span>縦 {{ $delivery->height }}cm</span>
                                <span>横 {{ $delivery->width }}cm</span>
                                <span>厚さ {{ $delivery->profound }}cm</span>
                            </div>
                            <div class="subcontents subcontents_font">
                                <span>料金 {{ $delivery->money }}円</span>
                            </div>
                            <div class="subcontents subcontents_color">
                                <?php
                                if ($delivery->trackFlag == 1) {
                                    echo "<span>追跡</span>";
                                }
                                ?>
                                <?php
                                if ($delivery->anonymousFlag == 1) {
                                    echo "<span>匿名</span>";
                                }
                                ?>
                                <?php
                                if ($delivery->safetyFlag == 1) {
                                    echo "<span>補償</span>";
                                }
                                ?>
                            </div>
                            <div class="subcontents subcontents_detail">
                                <span>特徴 {{ $delivery->detail }}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </section>
                <div class="formbottom backbutton">
                    <input type="button" name="submit" class="btns submit" value="戻る" onclick="history.back();">
                </div>
                <!-- 梱包材紹介 -->
                <section>
                    <h4>梱包材オンラインストア</h4>
                    <div id="app"></div>
                </section>
            </form>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection