<?php
namespace App\Http\Controllers;

use App\Enums\StatusJoinUsEnum;
use App\Models\JoinUs;

class JoinUsController extends Controller
{
    public function index()
    {
        $joins = JoinUs::where('status', StatusJoinUsEnum::pending)->get();
        return view('dashboard.pages.join.list', compact('joins'));

    }
    public function indexApprove()
    {
        $approves = JoinUs::where('status', StatusJoinUsEnum::approve)->get();
        return view('dashboard.pages.join.approve', compact('approves'));

    }
    public function indexReject()
    {
        $rejects = JoinUs::where('status', StatusJoinUsEnum::reject)->get();
        return view('dashboard.pages.join.reject', compact('rejects'));

    }

    public function approve(JoinUs $join)
    {

        $join->user_id     = Auth()->user()->id;
        $join->status      = StatusJoinUsEnum::approve;
        $join->save();

        return redirect()->back()->with('success', trans('message.join_successfully'));

    }
    public function reject(JoinUs $join)
    {

        $join->user_id     = Auth()->user()->id;
        $join->status      = StatusJoinUsEnum::reject;
        $join->save();
        return redirect()->back()->with('error', trans('message.join_reject'));

    }
}
