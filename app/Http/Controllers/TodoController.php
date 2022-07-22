<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Test;
use App\Models\Task;
use App\Models\Tag;
use App\Models\User;
use App\Http\Requests\TodoRequest;
use App\Http\Requests\UpdateRequest;

class TodoController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $items = Task::all();
        return view('index',['items' => $items,'tags' => $tags]);
    }
// create method
    public function create(TodoRequest $request)
    {   
        $item = [
            'content' => $request->content,
            'tag_id' => $request->tag,
            'user_id' =>$request->user,
        ];
        // return var_dump($item); 配列の中身を表示させる
        Task::create($item);
        return redirect('/');
    }
// update method
    public function update(UpdateRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $item = [
            'content' => $request->updatetext,
            'tag_id' => $request->tag,
        ];
        $items =Task::all();
        Task::where('id',$request->id)->update($item);
        return redirect('/');
    }
// remove method
    public function remove(Request $request)
    {

        Task::find($request->id)->delete();
        return redirect('/');
    }
// search method
    public function search(Request $request)
    {
        $tags = Task::where('tag_id',$request->tag)->get();
        $items = Task::where('content','LIKE BINARY',"%{$request->input}%")->get();
        $all = Task::all();
        return view('find',['items' => $items,'tags' => $tags,'all' => $all]);
    }
}