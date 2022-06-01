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
        $user= User::find(21);
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

    public function statsDemandsEstimates(){
        $stats = [];
        $categories = [];
        $results = DB::select(DB::raw("SELECT COUNT(*) AS nbTotalCommands FROM demands"));
        $stats['Total demandes'] = $results[0]->nbTotalCommands;
        $results = DB::select(DB::raw("SELECT COUNT(*) AS nbCommandsCancelled FROM demands WHERE status = 'cancelled'"));
        $stats['Demandes annulés'] = $results[0]->nbCommandsCancelled;
        $results = DB::select(DB::raw("SELECT COUNT(*) AS nbCommandsConfirmed FROM demands WHERE status = 'confirmed'"));
        $stats['Demandes acceptés'] = $results[0]->nbCommandsConfirmed;
        $results = DB::select(DB::raw("SELECT COUNT(*) AS nbTotalEstimates FROM estimates"));
        $stats['Total devis'] = $results[0]->nbTotalEstimates;
        $results = DB::select(DB::raw("SELECT COUNT(*) AS nbEstimatesCancelled FROM estimates WHERE status = 'cancelled'"));
        $stats['Devis annulés'] = $results[0]->nbEstimatesCancelled;
        $results = DB::select(DB::raw("SELECT COUNT(*) AS nbEstimatesConfirmed FROM estimates WHERE status = 'confirmed'"));
        $stats['Devis acceptés'] = $results[0]->nbEstimatesConfirmed;
        foreach ($stats as $categ => $stat) {
            $categories[] = [$categ => $stat];
        }
        return response()->json($categories);
    }
}
