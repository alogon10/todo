<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Test;

class TodoController extends Controller
{
    public function index()
    {
        $items = DB::select('select * from tasks');
        return view('index',['items' => $items]);
    }
    public function create(Request $request)
    {   
        $validate_rule = [
            'content' =>'required|max:20',
        ];
        $item = [
            'content' => $request->content,
        ];
        $this->validate($request,$validate_rule);
        DB::insert('insert into tasks (content) values (:content)', $item);
        return redirect('/');
    }
    public function update(Request $request)
    {
        $item = [
            'content' => $request->updatetext,
            'id' => DB::select('select id from tasks where id=:id')
        ];
        DB::update('update tasks set content=:content where id=:id', $item);
        return redirect('/');
    }
    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        DB::delete('delete from authors where id =:id', $param);
        return redirect('/');
    }
}