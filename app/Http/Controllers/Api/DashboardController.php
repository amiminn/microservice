<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Secret\ClientModel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userCount = User::count();
        $clientCount = ClientModel::count();

        return compact("userCount", "clientCount");
    }
}
