<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title','start_date','start_time','end_date','end_time','place','content', 'user_id'];
    
    public $timestamps = false;
    //フォロー機能の為必要
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //タスク共有機能の為必要
    public function share_users()
    {
        return $this->belongsToMany(Task::class, 'share', 'task_id','user_id')->withTimestamps();
    }
    
}
