<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rakuhai; //データベース
use App\Models\Delivery; //データベース

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // ユーザーテーブルの取得
        $management = new Rakuhai();
        $managements = $management->get();
        // $role = Auth::user()->role;

        // 配送方法テーブルの取得
        $deliveryManagements = Delivery::all();

        return view('admin', [ 'managements' => $managements, 'deliveryManagements' => $deliveryManagements]);
    }
}
