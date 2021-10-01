<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $page = Page::where('id', 1)->get();
        //dd($page);
        return view('dashboard/pages/policy', compact('page'));
    }

    public function create()
    {
        $page = Page::where('id', 1)->get();
        //dd($page);
        return view('dashboard/pages/term', compact('page'));
    }
    

    public function store(Request $request)
    {

        $page = Page::where('id', 1)->get();

        $request->validate([
            'policy_name' => 'required',
            'policy_description' => 'required',
        ]);

        $request_data = $request->all();


        //dd($request_data);
        $page[0]->update($request_data);
        session()->flash('success', __('site.updated_successfully'));



        return redirect()->route('dashboard.pages.policy');
    }

    public function show(Page $page)
    {
        //
    }

    public function edit(Page $page)
    {
        //
    }

    public function update(Request $request, Page $page)
    {
        $page = Page::where('id', 1)->get();

        $request->validate([
            'term_name' => 'required',
            'term_description' => 'required',
        ]);

        $request_data = $request->all();


        //dd($request_data);
        $page[0]->update($request_data);
        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.pages.term');
    }

    public function destroy(Page $page)
    {
        //
    }
}
