<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appls;
use App\Models\Getspots;
use App\Models\Sendspots;

class Delivery extends Model
{
    use HasFactory;
    protected $table = 'deliverys';

    public function getDeliveryDate($request)
    {
        $query = Delivery::query();
        
        if($request->has('track') && !$request->has('anonymous') && !$request->has('safety')) { 
        // 追跡にチェック
            // 箱にチェックが入っていたら
            if($request->has('box')) {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                ->select('*')
                ->where('deliverys.track-flag', '=', 1)
                ->where('deliverys.box-flag', '=', 1)
                ->where('appls.appls_name', '=', $request->selectApp) //利用しているアプリ
                ->where('getspots.getspot_name', '=', $request->selectGet) //受取場所
                ->where('sendspots.sendspot_name', '=', $request->selectSend) //発送場所
                ->where('deliverys.height', '>=', $request->height) // 縦
                ->where('deliverys.width', '>=', $request->width) // 横
                ->where('deliverys.profound', '>=', $request->thickness) // 厚さ
                ->orderBy('deliverys_appls.money', 'asc');
            } else {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                ->select('*')
                ->where('deliverys.track-flag', '=', 1)
                ->where('appls.appls_name', '=', $request->selectApp)
                ->where('getspots.getspot_name', '=', $request->selectGet)
                ->where('sendspots.sendspot_name', '=', $request->selectSend)
                ->where('deliverys.height', '>=', $request->height)
                ->where('deliverys.width', '>=', $request->width)
                ->where('deliverys.profound', '>=', $request->thickness)
                ->orderBy('deliverys_appls.money', 'asc');
            }
        } elseif ($request->has('anonymous') || $request->has('safety')) { 
        // 匿名または補償にチェック
            // 箱にチェックが入っていたら
            if($request->has('box')) {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                ->select('*')
                ->where('deliverys.anonymous-flag', '=', 1)
                ->where('deliverys.box-flag', '=', 1)
                ->where('appls.appls_name', '=', $request->selectApp)
                ->where('getspots.getspot_name', '=', $request->selectGet)
                ->where('sendspots.sendspot_name', '=', $request->selectSend)
                ->where('deliverys.height', '>=', $request->height)
                ->where('deliverys.width', '>=', $request->width)
                ->where('deliverys.profound', '>=', $request->thickness)
                ->orderBy('deliverys_appls.money', 'asc');
            } else {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                ->select('*')
                ->where('deliverys.anonymous-flag', '=', 1)
                ->where('appls.appls_name', '=', $request->selectApp)
                ->where('getspots.getspot_name', '=', $request->selectGet)
                ->where('sendspots.sendspot_name', '=', $request->selectSend)
                ->where('deliverys.height', '>=', $request->height)
                ->where('deliverys.width', '>=', $request->width)
                ->where('deliverys.profound', '>=', $request->thickness)
                ->orderBy('deliverys_appls.money', 'asc');
            }
        } elseif ($request->has('track') && ($request->has('anonymous') || $request->has('safety'))) { 
        //追跡と、匿名または補償にチェック
            // 箱にチェックが入っていたら
            if($request->has('box')) {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                ->select('*')
                ->where('deliverys.anonymous-flag', '=', 1)
                ->where('deliverys.box-flag', '=', 1)
                ->where('appls.appls_name', '=', $request->selectApp)
                ->where('getspots.getspot_name', '=', $request->selectGet)
                ->where('sendspots.sendspot_name', '=', $request->selectSend)
                ->where('deliverys.height', '>=', $request->height)
                ->where('deliverys.width', '>=', $request->width)
                ->where('deliverys.profound', '>=', $request->thickness)
                ->orderBy('deliverys_appls.money', 'asc');
            } else {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                ->select('*')
                ->where('deliverys.anonymous-flag', '=', 1)
                ->where('appls.appls_name', '=', $request->selectApp)
                ->where('getspots.getspot_name', '=', $request->selectGet)
                ->where('sendspots.sendspot_name', '=', $request->selectSend)
                ->where('deliverys.height', '>=', $request->height)
                ->where('deliverys.width', '>=', $request->width)
                ->where('deliverys.profound', '>=', $request->thickness)
                ->orderBy('deliverys_appls.money', 'asc');
            }
        } else {
        // 追跡、匿名、補償にチェックが入ってなかったら
            // 箱にチェックが入っていたら
            if($request->has('box')) {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                ->select('*')
                ->where('deliverys.box-flag', '=', 1)
                ->where('appls.appls_name', '=', $request->selectApp)
                ->where('getspots.getspot_name', '=', $request->selectGet)
                ->where('sendspots.sendspot_name', '=', $request->selectSend)
                ->where('deliverys.height', '>=', $request->height)
                ->where('deliverys.width', '>=', $request->width)
                ->where('deliverys.profound', '>=', $request->thickness)
                ->orderBy('deliverys_appls.money', 'asc');
            } else {
                $query->join('deliverys_getspots', 'deliverys_getspots.deliverys_id', '=', 'deliverys.id')
                ->join('getspots', 'getspots.id', '=', 'deliverys_getspots.getspots_id')
                ->join('deliverys_sendspots', 'deliverys_sendspots.deliverys_id', '=', 'deliverys.id')
                ->join('sendspots', 'sendspots.id', '=', 'deliverys_sendspots.sendspots_id')
                ->join('deliverys_appls', 'deliverys_appls.deliverys_id', '=', 'deliverys.id')
                ->join('appls', 'appls.id', '=', 'deliverys_appls.appls_id')
                ->select('*')
                ->where('appls.appls_name', '=', $request->selectApp)
                ->where('getspots.getspot_name', '=', $request->selectGet)
                ->where('sendspots.sendspot_name', '=', $request->selectSend)
                ->where('deliverys.height', '>=', $request->height)
                ->where('deliverys.width', '>=', $request->width)
                ->where('deliverys.profound', '>=', $request->thickness)
                ->orderBy('deliverys_appls.money', 'asc');
            }
        }

        return $query;
    }

    public function sendDeliveryDate($request) {

    }

}
