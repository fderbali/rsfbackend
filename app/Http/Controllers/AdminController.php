<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(){
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);
        $permission = Permission::create(['name' => 'access backoffice']);
        $roleAdmin->givePermissionTo($permission);
        $user= User::find(2);
        $user->assignRole('admin');
        return response()->json('roles set up successfully !');
    }

    public function statsCategories(){
        $results = DB::select(DB::raw("select categories.title, count(*) as nb from orders left join trainings on orders.training_id = trainings.id left join categories on categories.id = trainings.category_id group by categories.id"));
        $stats = [];
        $categories = [];
        $total = 0;
        foreach ($results as $result) {
            $stats[$result->title] = $result->nb;
            $total+=$result->nb;
        }

        foreach ($stats as $categ => $stat) {
            $categories[] = [$categ => ($stat/$total)*100];
        }
        return response()->json($categories);
    }
}
