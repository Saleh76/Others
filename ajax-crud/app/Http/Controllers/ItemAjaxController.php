<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;


class ItemAjaxController extends Controller

{
    public function manageItemAjax()
    {
        return view('manage-item-ajax', [
        'items' => Item::orderBy('created_at', 'asc')->get(),
        'items' => Item::paginate(5)
    ]);

    }


    public function index(Request $request)
    {
        $items = Item::latest()->paginate(5);
        return response()->json($items);
    }


    public function store(Request $request)
    {
        $create = Item::create($request->all());
        return response()->json($create);
    }


    public function update(Request $request, $id)
    {
        $edit = Item::find($id)->update($request->all());
        return response()->json($edit);
    }


    public function destroy($id)
    {
        Item::find($id)->delete();
        return response()->json(['done']);
    }

}
