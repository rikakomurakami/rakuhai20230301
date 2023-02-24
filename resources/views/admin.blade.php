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
                                    <th><div class="fontBold_SP">ID</div></th>
                                    <th>名前</th>
                                    <th>Eメールアドレス</th>
                                    <th>登録日時</th>
                                    <th>更新日時</th>
                                </tr>
                                <tr>
                                    @foreach ($managements as $management)
                                    <td><div class="delivery-info"><div class="columnName"><div class="fontBold_SP">ID</div></div><div class="fontBold_SP"><div class="fontBold_SP">{{ $management->id }}</div></div></div></td>
                                    <td><div class="delivery-info"><div class="columnName">名前</div><div class="columnFlex">{{ $management->name }}</div></div></td>
                                    <td><div class="delivery-info"><div class="columnName">Eメールアドレス</div><div class="columnFlex">{{ $management->email }}</div></div></td>
                                    <td><div class="delivery-info"><div class="columnName">登録日時</div><div class="columnFlex">{{ $management->created_at }}</div></div></td>
                                    <td><div class="delivery-info"><div class="columnName">更新日時</div><div class="columnFlex">{{ $management->updated_at }}</div></div></td>
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
                                <div class="topContentsParent">
                                    <div>※1は◯、2は✕</div>
                                    <button class="additionWidth"> <a href="{{ asset('/custom') }}" class="btn btn-info">配送方法を追加</a></button>
                                </div>
                                </p>
                                <table class="tbl-r04">
                                    <tr class="thead">
                                        <th>ID</th>
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
                                        <td><div class="delivery-info"> <div class="columnName"><div class="confirmH2">ID</div></div> <div class="columnFlex"><div class="fontBold_SP">{{ $deliveryManagement->id }}</div></div></div></td>
                                        <td><div class="delivery-info"><div class="columnName">配送名</div><div class="columnFlex">{{ $deliveryManagement->name }}</div></div></td>
                                        <td><div class="delivery-info"><div class="columnName">URL</div><div class="columnFlex">{{ $deliveryManagement->url }}</div></div></td>
                                        <td><div class="delivery-info"><div class="columnName">画像URL</div><div class="columnFlex">{{ $deliveryManagement->image }}</div></div></td>
                                        <td><div class="delivery-info"><div class="columnName">箱</div><div class="columnFlex">{{ $deliveryManagement->boxFlag }}</div> </div></td>
                                        <td><div class="delivery-info"><div class="columnName">追跡</div><div class="columnFlex">{{ $deliveryManagement->trackFlag }}</div></div></td>
                                        <td><div class="delivery-info"><div class="columnName">匿名</div><div class="columnFlex">{{ $deliveryManagement->anonymousFlag }}</div></div></td>
                                        <td><div class="delivery-info"><div class="columnName">補償</div><div class="columnFlex">{{ $deliveryManagement->safetyFlag }}</div></div></td>
                                        <td><div class="delivery-info"><div class="columnName">縦</div><div class="columnFlex">{{ $deliveryManagement->height }}cm</div></div></td>
                                        <td><div class="delivery-info"><div class="columnName">横</div><div class="columnFlex">{{ $deliveryManagement->width }}cm</div></div></td>
                                        <td><div class="delivery-info"><div class="columnName">厚さ</div><div class="columnFlex">{{ $deliveryManagement->profound }}cm</div></div></td>
                                        <td><div class="delivery-info"><div class="columnName">詳細</div><div class="columnFlex">{{ $deliveryManagement->detail }}</div></div></td>
                                        <td><div class="textalineEnd">
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