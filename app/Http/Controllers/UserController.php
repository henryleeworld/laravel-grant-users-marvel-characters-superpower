<?php

namespace App\Http\Controllers;

use App\User;
use Inani\Maravel\Spectre;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Having a user
        $user = User::first();
        echo '使用者姓名：' . $user->name . PHP_EOL;
        echo '建立「暴風女」角色及能力：天氣操縱、地球心靈感應、高感、看到未來。' . PHP_EOL;
        // Create a new marvel
        $storm = Spectre::create('storm')->havingPower([
	        'weather_manipulation',
  	        'earth_telepathy',
  	        'high_sens',
  	        'see_the_future'
        ]);
        echo '加入「暴風女」能力：飛行。' . PHP_EOL;
        // we can grant a power to it
        $storm = Spectre::of($storm)->grant('flying');

        echo '移除「暴風女」能力：看到未來。' . PHP_EOL;
        // Or take it off
        $storm = Spectre::of($storm)->takeOff('see_the_future');
        echo '祝福使用者姓名：' . $user->name . '擁有「暴風女」能力：看到未來。' . PHP_EOL;
        // bless the user with the abilities of the marvel
        $user->cerebro()->blessWith($storm);
        echo '檢查使用者姓名：' . $user->name . ' ' . '，是否擁有天氣操縱能力：' . ($user->cerebro()->owns('weather_manipulation') == 'true' ? '是' : '否') . PHP_EOL;
        echo '檢查使用者姓名：' . $user->name . ' ' . '，是否擁有其中一個地球心靈感應、飛行、X 光能力：' . ($user->cerebro()->ownsOneOf([
	        'earth_telepathy',
  	        'flying',
  	        'x-ray',
        ]) == 'true' ? '是' : '否') . PHP_EOL;
        echo '移除使用者姓名：' . $user->name . '超能力。' . PHP_EOL;
        // make it human again (remove its role)
        $user->cerebro()->humanize();
        echo '檢查使用者姓名：' . $user->name . ' ' . '，是否擁有天氣操縱能力：' . ($user->cerebro()->owns('weather_manipulation') == 'true' ? '是' : '否') . PHP_EOL;
    }
}
