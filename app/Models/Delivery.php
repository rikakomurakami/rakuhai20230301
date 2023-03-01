<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Appls;
use App\Models\Getspots;
use App\Models\Sendspots;

class Delivery extends Model
{
    use HasFactory;
    protected $table = 'deliverys';
    protected $fillable = ['name', 'url', 'image', 'box_flag', 'track_flag', 'anonymous_flag', 'safety_flag', 'height', 'width', 'profound', 'detail', 'created_at', 'updated_at'];

    public function getDeliveryDate($request)
    {
        $query = Delivery::query();

        // リクエストの値をセッションに保存
        $request->session()->put('selectApp', $request->selectApp);
        $request->session()->put('selectGet', $request->selectGet);
        $request->session()->put('selectSend', $request->selectSend);
        $request->session()->put('track', $request->track);
        $request->session()->put('anonymous', $request->anonymous);
        $request->session()->put('safety', $request->safety);
        $request->session()->put('box', $request->box);
        $request->session()->put('height', $request->height);
        $request->session()->put('width', $request->width);
        $request->session()->put('thickness', $request->thickness);
        // 取得
        $selectApp = $request->session()->get('selectApp');
        $selectGet = $request->session()->get('selectGet');
        $selectSend = $request->session()->get('selectSend');
        $track = $request->session()->get('track');
        $anonymous = $request->session()->get('anonymous');
        $safety = $request->session()->get('safety');
        $box = $request->session()->get('box');
        $height = $request->session()->get('height');
        $width = $request->session()->get('width');
        $thickness = $request->session()->get('thickness');


        if (empty($track) && empty($anonymous) && empty($safety)) {
            // 追跡にチェック
            // 箱にチェックが入っていたら
            if (!empty($box)) {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                    ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                    ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                    ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                    ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                    ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                    ->select('*')
                    ->where('deliverys.track_flag', '=', 1)
                    ->where('deliverys.box_flag', '=', 1)
                    ->where('appls.appls_name', '=', $selectApp) //利用しているアプリ
                    ->where('getspots.getspot_name', '=', $selectGet) //受取場所
                    ->where('sendspots.sendspot_name', '=', $selectSend) //発送場所
                    ->where('deliverys.height', '>=', $height) // 縦
                    ->where('deliverys.width', '>=', $width) // 横
                    ->where('deliverys.profound', '>=', $thickness) // 厚さ
                    ->orderBy('deliverys_appls.money', 'asc');
            } else {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                    ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                    ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                    ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                    ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                    ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                    ->select('*')
                    ->where('deliverys.track_flag', '=', 1)
                    ->where('appls.appls_name', '=', $selectApp)
                    ->where('getspots.getspot_name', '=', $selectGet)
                    ->where('sendspots.sendspot_name', '=', $selectSend)
                    ->where('deliverys.height', '>=', $height)
                    ->where('deliverys.width', '>=', $width)
                    ->where('deliverys.profound', '>=', $thickness)
                    ->orderBy('deliverys_appls.money', 'asc');
            }
        } elseif (!empty($anonymous) || !empty($safety)) {
            // 匿名または補償にチェック
            // 箱にチェックが入っていたら
            if (!empty($box)) {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                    ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                    ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                    ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                    ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                    ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                    ->select('*')
                    ->where('deliverys.anonymous_flag', '=', 1)
                    ->where('deliverys.box_flag', '=', 1)
                    ->where('appls.appls_name', '=', $selectApp)
                    ->where('getspots.getspot_name', '=', $selectGet)
                    ->where('sendspots.sendspot_name', '=', $selectSend)
                    ->where('deliverys.height', '>=', $height)
                    ->where('deliverys.width', '>=', $width)
                    ->where('deliverys.profound', '>=', $thickness)
                    ->orderBy('deliverys_appls.money', 'asc');
            } else {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                    ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                    ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                    ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                    ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                    ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                    ->select('*')
                    ->where('deliverys.anonymous_flag', '=', 1)
                    ->where('appls.appls_name', '=', $selectApp)
                    ->where('getspots.getspot_name', '=', $selectGet)
                    ->where('sendspots.sendspot_name', '=', $selectSend)
                    ->where('deliverys.height', '>=', $height)
                    ->where('deliverys.width', '>=', $width)
                    ->where('deliverys.profound', '>=', $thickness)
                    ->orderBy('deliverys_appls.money', 'asc');
            }
        } elseif (empty($track) && (empty($anonymous) || empty($safety))) {
            //追跡と、匿名または補償にチェック
            // 箱にチェックが入っていたら
            if (!empty($box)) {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                    ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                    ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                    ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                    ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                    ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                    ->select('*')
                    ->where('deliverys.anonymous_flag', '=', 1)
                    ->where('deliverys.box_flag', '=', 1)
                    ->where('appls.appls_name', '=', $selectApp)
                    ->where('getspots.getspot_name', '=', $selectGet)
                    ->where('sendspots.sendspot_name', '=', $selectSend)
                    ->where('deliverys.height', '>=', $height)
                    ->where('deliverys.width', '>=', $width)
                    ->where('deliverys.profound', '>=', $thickness)
                    ->orderBy('deliverys_appls.money', 'asc');
            } else {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                    ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                    ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                    ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                    ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                    ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                    ->select('*')
                    ->where('deliverys.anonymous_flag', '=', 1)
                    ->where('appls.appls_name', '=', $selectApp)
                    ->where('getspots.getspot_name', '=', $selectGet)
                    ->where('sendspots.sendspot_name', '=', $selectSend)
                    ->where('deliverys.height', '>=', $height)
                    ->where('deliverys.width', '>=', $width)
                    ->where('deliverys.profound', '>=', $thickness)
                    ->orderBy('deliverys_appls.money', 'asc');
            }
        } else {
            // 追跡、匿名、補償にチェックが入ってなかったら
            // 箱にチェックが入っていたら
            if (!empty($box)) {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                    ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                    ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                    ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                    ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                    ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                    ->select('*')
                    ->where('deliverys.box_flag', '=', 1)
                    ->where('appls.appls_name', '=', $selectApp)
                    ->where('getspots.getspot_name', '=', $selectGet)
                    ->where('sendspots.sendspot_name', '=', $selectSend)
                    ->where('deliverys.height', '>=', $height)
                    ->where('deliverys.width', '>=', $width)
                    ->where('deliverys.profound', '>=', $thickness)
                    ->orderBy('deliverys_appls.money', 'asc');
            } else {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                    ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                    ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                    ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                    ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                    ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                    ->select('*')
                    ->where('appls.appls_name', '=', $selectApp)
                    ->where('getspots.getspot_name', '=', $selectGet)
                    ->where('sendspots.sendspot_name', '=', $selectSend)
                    ->where('deliverys.height', '>=', $height)
                    ->where('deliverys.width', '>=', $width)
                    ->where('deliverys.profound', '>=', $thickness)
                    ->orderBy('deliverys_appls.money', 'asc');
            }
        }

        return $query;
    }

    public function createDeliveryDate($name,$url,$image,$box,$track,$anonymous,$safety,$height,$width,$thickness,$detail)
    {

        Delivery::create([
            'name' => $name,
            'url' => $url,
            'image' => $image,
            'box_flag' => ($box == 'on') ? 1 : 0,
            'track_flag' => ($track == 'on') ? 1 : 0,
            'anonymous_flag' => ($anonymous == 'on') ? 1 : 0,
            'safety_flag' => ($safety == 'on') ? 1 : 0,
            'height' => $height ?? 0,
            'width' => $width ?? 0,
            'profound' => $thickness ?? 0,
            'detail' => $detail
        ]);

        return;
    }
}
