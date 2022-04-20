<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    
   public function show($id)
    {
        $user = User::find($id);
        $tasks = $user->tasks()->orderBy('id', 'desc')->get();
        //共有しているタスクを取得
            $shares = $user->shares()->get();

        return view('users.show', [
            'user' => $user,
            'tasks' => $tasks,
            //共有しているタスクをviewに表示
                'shares' => $shares,
        ]);
    }
    //フォロー一覧表示の為に必要
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);
        $data = [
            'user' => $user,
            'users' => $followings,
        ];
        $data += $this->counts($user);

        return view('users.followings', $data);
    }
    //タスク共有一覧の為に必要
    public function shares($id)
    {
        $user = User::find($id);
        $shares = $user->shares()->paginate(10);

        $data = [
            'user' => $user,
            'shares' => $shares,
        ];

        $data += $this->counts($user);
        
        return view('users.shares',$data);
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }
}