<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Match;
use App\Models\Category;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $matches = Match::all();
        return view('dashboard.matches.index',compact('matches'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.matches.create', compact('categories'));
    }

    public function store(Request $request)
    {
        dd($request);
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'start_time' => 'required',
            'url' => 'required',
        ]);
        $request_data = $request->all();

        Match::create($request_data);

        session()->flash('success', __('site.added_successfully'));

        return redirect()->route('dashboard.categories.index');
    }

    public function show(Match $match)
    {
        //
    }

    public function edit(Match $match)
    {
        //
    }

    public function update(Request $request, Match $match)
    {
        //
    }

    public function destroy(Match $match)
    {
        //
    }
}
