<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('item.index', compact('items'));
    }

    public function create(ItemRequest $request)
    {
        // POST
        if ($request->isMethod('POST')) {

            // 商品情報の保存
            $item = Item::create(['jan'=> $request->jan, 'name'=> $request->name]);

            // 商品画像の保存
            foreach ($request->file('files') as $index=> $e) {
                $ext = $e['photo']->guessExtension();
                $filename = "{$request->jan}_{$index}.{$ext}";
                $path = $e['photo']->storeAs('photos', $filename);
                // photosメソッドにより、商品に紐付けられた画像を保存する
                $item->photos()->create(['path'=> $path]);
            }

            return redirect('/items')->with(['success'=> '保存しました！']);
        }

        // GET
        return view('item.create');
    }
}
