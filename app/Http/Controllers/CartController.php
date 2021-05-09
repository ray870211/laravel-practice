<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    //

    function index(Request $request) //當cart路徑被訪問到的時候執行
    {
        $cartItems = $this->getCartItems(); //呼叫getCartItems
        return view('cart.index', [
            "cartItems" => $cartItems
        ]);
    }

    public function updateCookie(Request $request) //當我們從cart頁面update時
    {
        $cart =  $this->getCartFromCookie();
        foreach ($cart as $productId => $currentQuantity) {
            $key = "product_" . $productId;
            if ($request->has($key)) {
                $cart[$productId] = $request->input($key); //在laravel中，可以從request裡面用input取得傳入值
            }
        }
        $cart = json_encode($cart, true);
        // Cookie::queue('cart',$cart);
        Cookie::queue(
            Cookie::make('cart', $cart, 60 * 24 * 7, null, null, false, false)
        );

        return redirect()->route('cart.index');
    }

    public function deleteCookie(Request $request)
    {
        if ($request->has('id')) {  //如果有id
            $cart = $this->getCartFromCookie(); //取得這個card
            $productId = $request->input('id'); //取得他的input id
            if (isset($cart[$productId])) {
                unset($cart[$productId]); //用于销毁给定的变量
                $cartToJson = empty($cart) ? "{}" : json_encode($cart, true);
            }
            $cart = json_encode($cart, true);
            Cookie::queue((Cookie::make('cart', $cartToJson, 60 * 24 * 7, null, null, false, false)));
        }
        return response('success');
    }


    private function getCartFromCookie() //抓到原本的cookie
    {
        $cart = Cookie::get('cart');  //抓到我們在商品頁面得到的cookie
        return (!is_null($cart) ? json_decode($cart, true) : []);
        //如果有，將cookie轉換回陣列的，沒有的話為空陣列
    }
    private function getCartItems() //從cookie中取得的資料做處理
    {
        $cart = $this->getCartFromCookie(); //先拿到cookie

        //[id=>quantity]

        $productIds = array_keys($cart); //把id抓出來

        //[id]

        $cartItems = array_map(function ($productId) use ($cart) { //他會把每個都拿去跑，傳入值是productId，use是當你需要使用到外部變量時，要這樣傳入
            $quantity = $cart[$productId];
            $product = $this->getProduct($productId);
            if ($product) {
                return [  //
                    "product" => $product,
                    "quantity" => $quantity,
                ];
            } else {
                return null;
            }
        }, $productIds); //第二個傳入值是我們整個要做處理的陣列

        //[["product" => $product , "quantity" => $quantity]]

        return $cartItems;
        // $products = $this->getProducts();
    }

    private function getProduct($id) //取得對應的商品資料
    {
        $products = $this->getProducts();
        foreach ($products as $product) {
            if ($product["id"] == $id) {
                return $product;
            }
        }
        return null;
    }

    private function getProducts() //我們要取用的資料，先用這個做測試
    {
        return [
            [
                "id" => 1,
                "name" => "杉林溪茶",
                "price" => 30,
                "imageUrl" => asset('imgs/tea.jpg')
            ],
            [
                "id" => 2,
                "name" => "阿里山茶",
                "price" => 40,
                "imageUrl" => asset('imgs/tea02.jpg')
            ]
        ];
    }
}
