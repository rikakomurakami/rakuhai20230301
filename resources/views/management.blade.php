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
                <div class="tab_container">
                    <input id="tab1" type="radio" name="tab_item" checked>
                    <label class="tab_item" for="tab1">全ユーザー管理</label>
                    <input id="tab2" type="radio" name="tab_item">
                    <label class="tab_item" for="tab2">配送方法管理</label>
                    <div class="tab_content" id="tab1_content">
                        <div class="tab_content_description">
                            <p class="c-txtsp">
                            <table class="tbl-r04">
                                <tr class="thead">
                                    <th>id</th>
                                    <th>名前</th>
                                    <th>Eメールアドレス</th>
                                    <th>登録日時</th>
                                    <th>更新日時</th>
                                </tr>
                                <tr>
                                    @foreach ($managements as $management)
                                    <td>{{ $management->id }}</td>
                                    <td>{{ $management->name }}</td>
                                    <td>{{ $management->email }}</td>
                                    <td>{{ $management->created_at }}</td>
                                    <td>{{ $management->updated_at }}</td>
                                    <td>
                                        <form action="{{ route('userDelete', ['id' => $management->id ]) }}" method="POST">
                                            @csrf
                                            <div class="managementText"><button type="submit" name="userDelete">削除</button></div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            </p>
                        </div>
                    </div>
                    <div class="tab_content" id="tab2_content">
                        <div class="tab_content_description">
                            <form action="{{ asset('managementEdit') }}" method="post">
                                <p class="c-txtsp">
                                <div class="suntexts">※1は◯、2は✕</div>
                                <table class="tbl-r04">
                                    <tr class="thead">
                                        <th>id</th>
                                        <th>配送名</th>
                                        <th>URL</th>
                                        <th>画像URL</th>
                                        <th class="textWidth">箱</th>
                                        <th class="textWidth">追跡</th>
                                        <th class="textWidth">匿名</th>
                                        <th class="textWidth">補償</th>
                                        <th class="textWidth">縦</th>
                                        <th class="textWidth">横</th>
                                        <th class="textWidth">厚さ</th>
                                        <th>詳細</th>
                                    </tr>
                                    @foreach ($deliveryManagements as $deliveryManagement)
                                    <tr>
                                        <td>{{ $deliveryManagement->id }}</td>
                                        <td>{{ $deliveryManagement->name }}</td>
                                        <td>{{ $deliveryManagement->url }}</td>
                                        <td>{{ $deliveryManagement->image }}</td>
                                        <td>{{ $deliveryManagement->boxFlag }} </td>
                                        <td>{{ $deliveryManagement->trackFlag }}</td>
                                        <td>{{ $deliveryManagement->anonymousFlag }}</td>
                                        <td>{{ $deliveryManagement->safetyFlag }}</td>
                                        <td>{{ $deliveryManagement->height }}cm</td>
                                        <td>{{ $deliveryManagement->width }}cm</td>
                                        <td>{{ $deliveryManagement->profound }}cm</td>
                                        <td>{{ $deliveryManagement->detail }}</td>
                                        <td class="textalineEnd">
                                            <button class="detailWidth"> <a href="{{ route('managementEdit', ['id'=>$deliveryManagement->id]) }}" class="btn btn-info">編集</a></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- フッター -->
        @include('footer')
    </div>
</body>

</html>
@endsection