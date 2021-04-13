<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use RakutenRws_Client;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        //楽天APIを扱うRakutenRws_Clientクラスのインスタンスを作成します
        $client = new RakutenRws_Client();

        //定数化
        define("RAKUTEN_APPLICATION_ID"     , "1032675426362554221");
        define("RAKUTEN_APPLICATION_SEACRET", "a74627ee573003ece9c19363c60766b0963ae271");

        //アプリIDをセット
        $client->setApplicationId(RAKUTEN_APPLICATION_ID);

        //リクエストから検索キーワードを取り出し
        $keyword = $request->input('keyword');

        // IchibaItemSearch API から、指定条件で検索
        if(!empty($keyword)){ 
        $response = $client->execute('IchibaItemSearch', array(
            //入力パラメーター
            'keyword' => $keyword,
        ));
        // レスポンスが正しいかを isOk() で確認することができます
        if ($response->isOk()) {
            $items = array();
            //配列で結果をぶち込んで行きます
            foreach ($response as $item){
                $items[] = array(
                    'itemName' => $item['itemName'],
                    'itemPrice' => $item['itemPrice'],
                    'itemUrl' => $item['itemUrl'],
                    'mediumImageUrls' => $item['mediumImageUrls'][0]['imageUrl'],
                    'siteIcon' => "../images/rakuten_logo.png",
                );
            }
        return view('search.index', [
            'items' => $items,
            'keyword' => $keyword
        ]);
        } else {
            echo 'Error:'.$response->getMessage();
          }
        }
    }
    
    
    public function form(){
        return view('search.form');
    }
}