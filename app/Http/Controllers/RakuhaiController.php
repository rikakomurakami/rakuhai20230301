<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Rakuhai; //データベース
use App\Models\Delivery;
use App\Models\CustomApp;
use App\Models\CustomSendspot;
use App\Models\CustomGetspot;
use App\Models\Deliverys_appls;
use App\Models\Deliverys_sendspots;
use App\Models\Deliverys_getspots;
use App\Models\Getspots;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class RakuhaiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    // ホーム画面
    public function index()
    {

        return view('index');
    }

    // 検索画面トップ
    public function searchTop()
    {

        return view('search/searchTop');
    }

    // 検索画面２
    public function search2(Request $request)
    {

        $delivery = new Delivery();
        $deliverys = $delivery->getDeliveryDate($request)->get();

        return view('search/search2', ['deliverys' => $deliverys]);
    }

    // ============= 管理者画面 ============= //
    // 管理者用ホーム画面
    public function index_admin()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        return view('index_admin');
    }

    // 管理者用検索画面トップ
    public function searchTop_admin()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        return view('search/searchTop_admin');
    }

    // 管理者用検索画面２
    public function search2_admin(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $delivery = new Delivery();
        $deliverys = $delivery->getDeliveryDate($request)->get();

        return view('search/search2_admin', ['deliverys' => $deliverys]);
    }

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

    /**
     * 配送方法追加入力画面 アプリ選択
     * 
     * 
     */
    public function custom_delivery()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // アプリ名を取得
        $apps = CustomApp::select('appls_name')->get();

        return view('custom_delivery', ['apps' => $apps]);
    }
    /**
     * 配送方法追加入力画面2　配送料入力
     * 
     * 
     */
    public function custom_delivery_middle(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // アプリ名を取得
        $apps = CustomApp::select('appls_name')->get();
        // 発送場所を取得
        $sendspots = CustomSendspot::select('sendspot_name')->get();
        // 受取場所を取得
        $getspots = CustomGetspot::select('getspot_name')->get();

        // 入力された配送料の配列
        $selectedItems = $request->input('appArray');  //Array ( [0] => ヤフオク [1] => PayPayフリマ [2] => 利用していない )

        if (empty($selectedItems)) {
            return redirect()->back()->with('error', '必ずどれかにチェックを入れてください。');
        }


        return view('custom_delivery_middle', ['selectedItems' => $selectedItems, 'getspots' => $getspots, 'sendspots' => $sendspots, 'apps' => $apps]);
    }
    /**
     * 配送方法追加入力画面3　他全部入力
     * 
     * 
     */
    public function custom_delivery_bottom(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        // 発送場所を取得
        $sendspots = CustomSendspot::select('sendspot_name')->get();
        // 受取場所を取得
        $getspots = CustomGetspot::select('getspot_name')->get();

        // 入力された配送料を配列で取得
        $selectedMoneys = $request->input('arrayMoney');
        $request->session()->put('selectedMoneys', $selectedMoneys); //Array ( [ラクマ] => 22 [PayPayフリマ] => 22 [利用していない] => 22)
        print_r($selectedMoneys);

        return view('custom_delivery_bottom', ['getspots' => $getspots, 'sendspots' => $sendspots, 'selectedMoneys' => $selectedMoneys]);
    }
    /**
     * 配送方法追加入力画面４　確認画面
     * 
     * 
     */
    public function custom_delivery_confirm(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $existing_name = Delivery::where('name', $request->name)->first();
        if ($existing_name && (empty($request->sendspot_name) || empty($request->getspot_name))) {

            return redirect()->back()->with('error', 'この配送名は既に登録されています。')->with('error2', 'チェックしていない箇所があります。');
        } elseif ($existing_name) {

            return redirect()->back()->with('error', 'この配送名は既に登録されています。');
        } elseif (empty($request->sendspot_name) || empty($request->getspot_name)) {

            return redirect()->back()->with('error2', 'チェックしていない箇所があります。');
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100'],
            'height' => ['required', 'string', 'max:100', 'regex:/^\d+(\.\d+)?$/'],
            'width' => ['required', 'string', 'max:100', 'regex:/^\d+(\.\d+)?$/'],
            'thickness' => ['required', 'string', 'max:100', 'regex:/^\d+(\.\d+)?$/'],
            // 他のフィールドのバリデーションルールもここに定義する
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $requestSend['name'] = $request->name;
        $requestSendSpot = $request->sendspot_name;
        $requestGetSpot = $request->getspot_name;
        $requestSend['url'] = $request->url;
        $requestSend['image'] = $request->image;
        $requestSend['track'] = $request->track;
        $requestSend['anonymous'] = $request->anonymous;
        $requestSend['safety'] = $request->safety;
        $requestSend['box'] = $request->box;
        $requestSend['detail'] = $request->detail;

        $request->session()->put('name', $request->name);
        $request->session()->put('url', $request->url);
        $request->session()->put('image', $request->image);
        $request->session()->put('track', $request->track);
        $request->session()->put('anonymous', $request->anonymous);
        $request->session()->put('safety', $request->safety);
        $request->session()->put('box', $request->box);
        $request->session()->put('height', $request->height);
        $request->session()->put('width', $request->width);
        $request->session()->put('thickness', $request->thickness);
        $request->session()->put('detail', $request->detail);

        $request->session()->put('sendspot_name', $request->sendspot_name);
        $request->session()->put('getspot_name', $request->getspot_name);

        // applsテーブルから指定のアプリ名のidを取得
        $selectedMoneys_tmps = $request->session()->get('selectedMoneys');
        foreach ($selectedMoneys_tmps as $key => $selectedMoneys_tmp) {
            $selectedMoneyKeys[] = $key;
            $selectedMoneys[] = $selectedMoneys_tmp;
        }

        foreach ($selectedMoneyKeys as $selectedMoneyKey) {
            $existing_app_id[] = CustomApp::where('appls_name', $selectedMoneyKey)->value('id'); //Array ( [0] => 3 [1] => 4 [2] => 5 )
        }

        $app_money_arrays = array_combine($existing_app_id, $selectedMoneys); //Array ( [ラクマ] => 22 [PayPayフリマ] => 22 [利用していない] => 22 ) →　Array ( [3] => 3 [4] => 3 [5] => 3 ) 
        $request->session()->put('app_money', $app_money_arrays);

        // 画像を保存

        Storage::disk('local')->put('example.txt', $request->image);

        return view('custom_delivery_confirm', ['selectedMoneys' => $selectedMoneys, 'requestSendSpot' => $requestSendSpot, 'requestGetSpot' => $requestGetSpot, 'requestSend' => $requestSend]);
    }
    /**
     * 配送方法追加入力画面４
     * 
     * 
     */
    public function custom_end(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $name = $request->session()->get('name');
        $url = $request->session()->get('url');
        $image = $request->session()->get('image');
        $track = $request->session()->get('track');
        $anonymous = $request->session()->get('anonymous');
        $safety = $request->session()->get('safety');
        $box = $request->session()->get('box');
        $height = $request->session()->get('height');
        $width = $request->session()->get('width');
        $thickness = $request->session()->get('thickness');
        $detail = $request->session()->get('detail');


        $existing_id = null;


        if ($request->session()->has('name')) {


            // ======================　deliverysテーブルの更新
            $delivery_create = new Delivery();
            $delivery_create->createDeliveryDate($name, $url, $image, $box, $track, $anonymous, $safety, $height, $width, $thickness, $detail);

            // ======================　deliverys_applsテーブルの更新
            // applsテーブルから指定のアプリ名のidを取得
            $app_money_rrays = $request->session()->get('app_money'); //Array ( [3] => 3 [4] => 3 [5] => 3 ) 
            $selectedMoneyKeys = $request->input('selectedMoneyKey'); //Array ( [0] => ヤフオク [1] => PayPayフリマ [2] => 利用していない )
            // deliverysテーブルから新規登録した配送のidを取得
            $existing_id = Delivery::where('name', $name)->value('id');
            // ====== deliverys_applsテーブルに新規レコードを挿入　｜deliverys_id | appls_id | money |
            foreach ($app_money_rrays as $key => $app_money_rray) {
                Deliverys_appls::create([
                    'deliverys_id' => $existing_id,
                    'appls_id' => $key,
                    'money' => $app_money_rray,
                ]);
            }

            // ======================　deliverys_sendspotsテーブルの更新
            $sendspot_names = $request->session()->get('sendspot_name');
            // sendspots_id を取得
            if (!empty($sendspot_names)) {
                foreach ($sendspot_names as $sendspot_name) {
                    $sendspots_ids[] = CustomSendspot::where('sendspot_name', $sendspot_name)->value('id');
                }
                // ====== deliverys_sendspotsテーブルに新規レコードを挿入　｜deliverys_id | sendspots_id |
                foreach ($sendspots_ids as $sendspots_id) {
                    Deliverys_sendspots::create([
                        'deliverys_id' => $existing_id,
                        'sendspots_id' => $sendspots_id
                    ]);
                }
            }
            Deliverys_sendspots::create([
                'deliverys_id' => $existing_id,
                'sendspots_id' => 10 //「どこでも良い」は必須, sendspots_id==10
            ]);

            // ======================　deliverys_getspotsテーブルの更新
            $getspot_names = $request->session()->get('getspot_name'); //Array ( [0] => 郵便受け [1] => 郵便局 [2] => どこでも良い )
            // sendspots_id を取得
            if (!empty($getspot_names)) {
                foreach ($getspot_names as $getspot_name) {
                    $getspot_ids[] = CustomGetspot::where('getspot_name', $getspot_name)->value('id');
                }
                // ====== deliverys_getspotsテーブルに新規レコードを挿入　｜deliverys_id | getspots_id |
                foreach ($getspot_ids as $getspot_id) {
                    Deliverys_getspots::create([
                        'deliverys_id' => $existing_id,
                        'getspots_id' => $getspot_id
                    ]);
                }
            }
            Deliverys_getspots::create([
                'deliverys_id' => $existing_id,
                'getspots_id' => 5
            ]);

            $request->session()->forget('name');
        }


        return view('custom_end');
    }


    // アプリ追加画面
    public function custom_app()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $apps = CustomApp::select('appls_name')->get();

        return view('custom_app', ['apps' => $apps]);
    }

    public function CustomApp(Request $request)
    {
        $existing_app = CustomApp::where('appls_name', $request->name)->first();
        if ($existing_app) {
            $apps = CustomApp::select('appls_name')->get();
            $request->session()->put('error', 'このアプリ名は既に登録されています。');
            return view('custom_app', ['apps' => $apps]);
        }

        // 削除ボタンが押されたら
        if ($request->has('delete')) {
            $deleteApp_names = $request->deleteApp_name;
            foreach ($deleteApp_names as $deleteApp_name) {
                $DeleteApp_name = NULL;
                $DeleteApp_name = $deleteApp_name;
            }

            CustomApp::where('appls_name', $DeleteApp_name)->delete();
            $apps = CustomApp::select('appls_name')->get();
            return view('custom_app', ['apps' => $apps]);
        }

        // 追加ボタンが押されたら
        if ($request->has('add')) {
            $app_name = new CustomApp();
            $app_name->AddApplsColumn($request);

            $apps = CustomApp::select('appls_name')->get();
        }



        return view('custom_app', ['apps' => $apps]);
    }

    // 発送場所追加画面
    public function custom_sendspot()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }


        $sendspots = CustomSendspot::select('sendspot_name')->get();

        return view('custom_sendspot', ['sendspots' => $sendspots]);
    }

    public function CustomSendspot(Request $request)
    {
        $existing_send = CustomSendspot::where('sendspot_name', $request->name)->first();
        if ($existing_send) {
            return redirect()->back()->with('error', 'この発送場所は既に登録されています。');
        }
        // 削除ボタンが押されたら
        if ($request->has('delete')) {
            $deleteSend_names = $request->deleteSend_name;
            foreach ($deleteSend_names as $deleteSend_name) {
                $DeleteSend_name = NULL;
                $DeleteSend_name = $deleteSend_name;
            }

            CustomSendspot::where('sendspot_name', $DeleteSend_name)->delete();
            $sendspots = CustomSendspot::select('sendspot_name')->get();
            return view('custom_sendspot', ['sendspots' => $sendspots]);
        }

        // 追加ボタンが押されたら
        if ($request->has('add')) {
            $sendspot_name = new CustomSendspot();
            $sendspot_name->AddSendColumn($request);

            $sendspots = CustomSendspot::select('sendspot_name')->get();
        }

        return view('custom_sendspot', ['sendspots' => $sendspots]);
    }

    // 受け取り場所追加画面
    public function custom_getspot()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $getspots = CustomGetspot::select('getspot_name')->get();

        return view('custom_getspot', ['getspots' => $getspots]);
    }

    public function CustomGetspot(Request $request)
    {
        $existing_get = CustomGetspot::where('getspot_name', $request->name)->first();
        if ($existing_get) {
            return redirect()->back()->with('error', 'この受取場所は既に登録されています。');
        }

        // 削除ボタンが押されたら
        if ($request->has('delete')) {
            $deleteGet_names = $request->deleteGet_name;
            foreach ($deleteGet_names as $deleteGet_name) {
                $DeleteGet_name = NULL;
                $DeleteGet_name = $deleteGet_name;
            }

            CustomGetspot::where('getspot_name', $DeleteGet_name)->delete();
            $getspots = CustomGetspot::select('getspot_name')->get();
            return view('custom_getspot', ['getspots' => $getspots]);
        }

        // 追加ボタンが押されたら
        if ($request->has('add')) {
            $getspot_name = new CustomGetspot();
            $getspot_name->AddGetColumn($request);

            $getspots = CustomGetspot::select('getspot_name')->get();
        }

        return view('custom_getspot', ['getspots' => $getspots]);
    }
}
