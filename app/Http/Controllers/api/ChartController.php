<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\User;
use App\Post;

class ChartController extends Controller
{
    public function index()
    {
        return [
            'userArr' => $this->registeredUserByMonth(),
            'postArr' => $this->publishedPostsByMonth()
        ];
    }

    public function registeredUserByMonth()
    {
        $users = User::select('id', 'created_at')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('m');
            });

        $usermcount = [];
        $userArr = [];

        foreach ($users as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }

        for ($i = 0; $i <= 11; $i++) {
            if (!empty($usermcount[$i])) {
                $userArr[$i] = $usermcount[$i];
            } else {
                $userArr[$i] = 0;
            }
        }
        return $userArr;
    }

    public function publishedPostsByMonth()
    {
        $posts = Post::select('id', 'created_at')
            ->get()
            ->groupBy(function ($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $usermcount = [];
        $userArr = [];

        foreach ($posts as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }

        for ($i = 0; $i <= 11; $i++) {
            if (!empty($usermcount[$i])) {
                $userArr[$i] = $usermcount[$i];
            } else {
                $userArr[$i] = 0;
            }
        }
        return $userArr;
    }
}
