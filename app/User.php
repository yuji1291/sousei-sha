<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //タスク投稿の為必要
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
     
     //ユーザーフォロー機能
     public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    public function follow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $userId;
    
        if ($exist || $its_me) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $userId;
    
        if ($exist && !$its_me) {
            // 既にフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }
    
    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    //タスク共有機能
    public function shares()
    {
        return $this->belongsToMany(Task::class, 'shares', 'user_id', 'task_id')->withTimestamps();
    }
     public function share($taskId)
    {
        // 既にタスク共有しているかの確認
        $exist = $this->is_shares($taskId);
       
    
        if ($exist) {
            // 既にタスク共有していれば何もしない
            return false;
        } else {
            // 共有していなければ共有する
            $this->shares()->attach($taskId);
            return true;
        }
    }
        public function unshare($taskId)
    {
        // 既にタスク共有しているかの確認
        $exist = $this->is_shares($taskId);
    
        if ($exist) {
            // 既にタスク共有していれば共有を外す
            $this->shares()->detach($taskId);
            return true;
        } else {
            // 共有していなければ何もしない
            return false;
        }
    }
    public function is_shares($taskId)
    {
        return $this->shares()->where('task_id', $taskId)->exists();
    }
   
}

