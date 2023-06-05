<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Models\User;
use App\Models\Facture;
use App\Models\Assurance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function show()
    {
        $users = User::all();
        $factures = Facture::all();
        $assurance = Assurance::all();
        $tot = Facture::whereDate('created_at', \Carbon\Carbon::now())->sum('price');

        return view('admin.dashboard', compact('users', 'factures', 'assurance', 'tot'));
    }
}
