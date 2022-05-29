<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(){
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);
        $permission = Permission::create(['name' => 'access backoffice']);
        $roleAdmin->givePermissionTo($permission);
        $user= User::find(21);
        $user->assignRole('admin');
        return response()->json('roles set up successfully !');
    }

    public function getChiffreAffaire(){
        return response()->json('here');
    }
}
