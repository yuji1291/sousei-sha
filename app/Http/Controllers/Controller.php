<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
     public function counts($user) {
        $count_tasks = $user->tasks()->count();
        $count_followings = $user->followings()->count();
        $count_shares = $user->shares()->count();
        return [
            'count_tasks' => $count_tasks,
            'count_followings' => $count_followings,
            'count_shares' => $count_shares,
        ];
    }
    
}