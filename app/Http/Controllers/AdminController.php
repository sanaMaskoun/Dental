<?php
namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        $num_doctors         = User::where('type', UserTypeEnum::doctor)->where('is_active', true)->count();
        $num_patients        = User::where('type', UserTypeEnum::patient)->where('is_active', true)->count();
        $num_specializations = Specialization::count();
        $num_services        = Service::count();
        $allMonths = collect(range(1, 12))->mapWithKeys(function ($month) {
            return [$month => 0];
        });

        $doctorsData = User::where('type', UserTypeEnum::doctor)
            ->where('is_active', true)
            ->where('created_at', '>=', now()->subMonths(12))
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $doctorsData = array_replace($allMonths->toArray(), $doctorsData);
        ksort($doctorsData);

        $patientsData = User::where('type', UserTypeEnum::patient)
        ->where('is_active', true)
        ->where('created_at', '>=', now()->subMonths(12))
        ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->pluck('count', 'month')
        ->toArray();

    $patientsData = array_replace($allMonths->toArray(), $patientsData);
    ksort($patientsData);

    $months = [
        1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun',
        7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
    ];
    return view('dashboard.pages.admin.dashboard', compact(
        'num_doctors',
        'num_patients',
        'num_specializations',
        'num_services',
        'doctorsData',
        'patientsData',
        'months'
    ));
    }
    public function toggleStatus(Request $request, User $user)
    {

        $user->is_active = ! $user->is_active;
        $user->save();

        return redirect()->back()->with('success', 'Status updated successfully.');

    }
}
