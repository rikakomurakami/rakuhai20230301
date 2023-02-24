<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Rakuhai; //データベース
use App\Models\Delivery; //データベース
use App\Models\CustomDelivery; //データベース
use Illuminate\Support\Facades\Auth;


class RakuhaiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    // ホーム画面
    public function index(Request $request)
    {
        //ログインしたらメインへ飛ぶ

        // $rakuhai = Rakuhai::all();
        // $role = Auth::user()->role;

        return view('index');
    }

    // 検索画面トップ
    public function searchTop()
    {
        // $role = Auth::user()->role;
        return view('search/searchTop');
    }

    // 検索画面２
    public function search2(Request $request)
    {

        // $role = Auth::user()->role;
        $delivery = new Delivery();
        $deliverys = $delivery->getDeliveryDate($request)->get();


        return view('search/search2', ['deliverys' => $deliverys]);
    }

    // ============= 管理者画面 ============= //
    // ユーザー管理画面
    public function management(Request $request)
    {

        // ユーザーテーブルの取得
        $management = new Rakuhai();
        $managements = $management->get();
        // $role = Auth::user()->role;

        // 配送方法テーブルの取得
        $deliveryManagements = Delivery::all();

        return view('management', ['managements' => $managements, 'deliveryManagements' => $deliveryManagements]);
    }

    // ユーザー削除ボタンが押されたら
    public function delete($id)
    {
        $user = Rakuhai::find($id);
        $user->delete();
        return redirect()->back();
    }

    // 配送編集画面
    public function managementEdit($id)
    {
        // $role = Auth::user()->role;
        $managements = Delivery::find($id);

        return view('managementEdit', ['managements' => $managements]);
    }

    // 配送編集確認画面
    public function managementUpdate(Request $request)
    {
        // $role = Auth::user()->role;
        $id = $request->id;
        $name = $request->name;
        $url = $request->url;
        $image = $request->image;
        $boxFlag = $request->boxFlag;
        $trackFlag = $request->trackFlag;
        $anonymousFlag = $request->anonymousFlag;
        $safetyFlag = $request->safetyFlag;
        $height = $request->height;
        $width = $request->width;
        $profound = $request->profound;
        $detail = $request->detail;

        return view('managementUpdate', ['id' => $id, 'name' => $name, 'url' => $url, 'image' => $image, 'boxFlag' => $boxFlag, 'trackFlag' => $trackFlag, 'anonymousFlag' => $anonymousFlag, 'safetyFlag' => $safetyFlag, 'height' => $height, 'width' => $width, 'profound' => $profound, 'detail' => $detail]);
    }

    // 配送編集完了画面
    public function managementEnd(Request $request)
    {
        // $role = Auth::user()->role;

        Delivery::where('id', $request->id)->update([
            "id" => $request->id,
            'name' => $request->name,
            'url' => $request->url,
            'image' => $request->image,
            'boxFlag' => $request->boxFlag,
            'trackFlag' => $request->trackFlag,
            'anonymousFlag' => $request->anonymousFlag,
            'safetyFlag' => $request->safetyFlag,
            'height' => $request->height,
            'width' => $request->width,
            'profound' => $request->profound,
            'detail' => $request->detail
        ]);

        return view('managementEnd');
    }

    public function managementEdit2()
    {
        // $role = Auth::user()->role;

        return view('managementEdit');
    }

    // 配送方法追加入力画面
    public function custom_end(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $custom = new CustomDelivery();
        $customs = $custom->custom_INSERT($request)->get();

        return view('custom_end', ['customs' => $customs]);
    }
}
