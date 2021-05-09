<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function index()
    {
        $products = DB::table('products')->get();

        return view('product.index', [ //返回product根目錄下的index
            "products" => $products,
        ]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image']
        ]);
        unset($validatedData["image"]);

        if ($request->has('image')) {
            $diskName = "public";
            $name = $request->file('image')->getClientOriginalName(); //得到input的檔案名稱
            $path = $request->file('image')->storeAs(
                'products',
                $name,
                $diskName
            );
            //svae path
            $validatedData["image_url"] = $path;
        }
        DB::table('products')->insert($validatedData);

        return redirect()->route('products.index');
    }


    function show($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        if (is_null($product)) {
            abort(404);
        }
        return view('product.show', [
            "product" => $product
        ]);
    }


    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        if (is_null($product)) {
            abort(404);
        }

        return view('product.edit', [
            "product" => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        if (is_null($product)) {
            abort(404);
        }

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image']
        ]);
        unset($validatedData["image"]);

        if ($request->has('image')) {
            $diskName = "public";
            $disk = Storage::disk($diskName);
            //delete file 
            if ($disk->exists($product->image_url)) {
                $disk->delete($product->image_url);
            }

            //save file
            $name = $request->file('image')->getClientOriginalName(); //取得上傳檔案的原始名稱
            $path = $request->file('image')->storeAs(
                'products',
                $name,
                $diskName
            );
            //svae path
            $validatedData["image_url"] = $path;
        }

        $affected = DB::table('products')
            ->where('id', $id)
            ->update(
                $validatedData
            );
        return redirect()->route('products.edit', ['product' => $product->id]);
    }

    public function destroy($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if (is_null($product)) {
            return redirect()->route('products.index');
        }
        $diskName = "public";
        $disk = Storage::disk($diskName);
        if ($disk->exists($product->image_url)) {
            $disk->delete($product->image_url);
        }


        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('products.index');
    }
}
