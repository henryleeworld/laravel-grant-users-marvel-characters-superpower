<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inani\Maravel\Ability;
use Inani\Maravel\RoleBuilder;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $user = User::first();
        echo '使用者姓名：' . $user->name . PHP_EOL;
        echo '建立「使用者管理員」角色及能力：更新使用者。' . PHP_EOL;
        $userManager = RoleBuilder::create('User Manager')->havingPower([
            'name' => 'can_update',
            'description' => 'The abilitiy to update a user',
            'action' => 'update',
            'entity' => User::class,
        ]);
        echo '加入「使用者管理員」能力：新增使用者。' . PHP_EOL;
        $userManager = RoleBuilder::of($userManager)->grant([
            'name' => 'can_create',
            'description' => 'The abilitiy to create a user',
            'action' => 'create',
            'entity' => User::class,
        ]);
        echo '移除「使用者管理員」能力：更新使用者。' . PHP_EOL;
        $ability = Ability::first();
        $storm = RoleBuilder::of($userManager)->takeOff($ability);
        echo '祝福使用者姓名：' . $user->name . '擁有「使用者管理員」能力：新增使用者。' . PHP_EOL;
        // bless the user with the abilities of the role
        $user->roleManager()->blessWith($storm);
    }
}
