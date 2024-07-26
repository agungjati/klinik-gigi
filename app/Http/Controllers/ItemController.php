<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{

    public function store(Request $request)
    {
        $item = new Item();
        $item->item_name = $request->item_name;
        $item->item_price = $request->item_price;
        $item->item_description = $request->item_description;
        $item->item_image = $request->item_image;
        $item->item_category = $request->item_category;
        $item->item_stock = isset($request->item_stock) ?? 0;
        $item->item_status = $request->item_status;
        $item->is_examination = isset($request->is_examination) ?? false;
        $item->deleted = 0;
        $item->save();
        return response()->json($item);
    }

    public function findAllExams(Request $request)
    {
        $item = Item::where('is_examination', 1)->where('deleted', 0);
        if(isset($request->search)) {
            $item = $item->where(function($query) use ($request) {
                $query->where('item_name', 'like', '%'.$request->search.'%')
                        ->orWhere('item_description', 'like', '%'.$request->search.'%');
            });
        }
        
        $limit = $request->limit ? $request->limit : 10;
        $offset = $request->offset ? $request->offset : 0;
        $count = $item->count();
        $item = $item->limit($limit)->offset($offset)->get();

        $pagination = array(
            'total' => $count,
            'limit' => $limit,
            'offset' => $offset,
            'data' => $item,
        );

        return response()->json($pagination);
        
    }

    public function findAllItems(Request $request)
    {
        $item = Item::where('is_examination', 0)->where('deleted', 0);
        if(isset($request->search)) {
            $item = $item->where(function($query) use ($request) {
                $query->where('item_name', 'like', '%'.$request->search.'%')
                        ->orWhere('item_description', 'like', '%'.$request->search.'%');
            });
        }
        
        $limit = $request->limit ? $request->limit : 10;
        $offset = $request->offset ? $request->offset : 0;
        $count = $item->count();
        $item = $item->limit($limit)->offset($offset)->get();

        $pagination = array(
            'total' => $count,
            'limit' => $limit,
            'offset' => $offset,
            'data' => $item,
        );

        return response()->json($pagination);
        
    }
    public function Edit(Request $request)
    {
        $item = Item::find($request->item_id);
        $item->item_name = $request->item_name;
        $item->item_price = $request->item_price;
        $item->item_description = $request->item_description;
        $item->item_image = $request->item_image;
        $item->item_category = $request->item_category;
        $item->item_stock = $request->item_stock;
        $item->item_status = $request->item_status;
        $item->save();
        return response()->json($item);
       
    }

    public function Delete(Request $request)
    {
        $item = Item::find($request->item_id);
        $item->deleted = 1;
        $item->save();
        return response()->json($item);
    }
}