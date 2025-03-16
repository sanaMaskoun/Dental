<?php

namespace App\Http\Controllers;

use App\Http\Requests\FAQRequest;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = FAQ::all();
        return view('dashboard.pages.faq.list', compact('faqs'));

    }

    public function create()
    {
        return view('dashboard.pages.faq.create');
    }


    public function store(FAQRequest $request)
    {

        FAQ::create($request->validated());

        return redirect()->route('faq_list')
        ->with('success', 'Added successfully');

    }
    public function edit(FAQ $faq)
    {
        return view('dashboard.pages.faq.edit',compact('faq'));
    }


    public function update(FAQRequest $request, FAQ $faq)
    {

        $faq->update($request->validated());

        return redirect()->route('faq_list')
        ->with('success', 'Modified successfully');

    }


 public function destroy(FAQ $faq)
    {

        $faq->delete();

        return redirect()->route('faq_list')
            ->with('success', 'delete successfully');

    }
}
