<?php

namespace App\Http\Controllers;

use App\Models\Appoitment;
use App\Models\Designation;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $total_patient = Patient::count();
        $total_doctor = Doctor::count();
        $total_designation = Designation::count();
        $today_appoitments  = Appoitment::whereDate('date', Carbon::today())->orderBy('date', 'DESC')->get();
        return view('home', compact('total_patient', 'total_doctor', 'total_designation', 'today_appoitments'));
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
