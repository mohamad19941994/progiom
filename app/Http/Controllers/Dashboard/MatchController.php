<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Match;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        if($request->ajax())
        {
            $request->validate([
                'category_id'  => 'required',
                'start_time'  => 'required',
                'name.*'  => 'required',
                'url.*'  => 'required'
            ]);

            $name = $request->name;
            $url = $request->url;
            $category_id = $request->category_id;
            $start_time = $request->start_time;


            for($count = 0; $count < count($name); $count++)
            {
                if ($count == 0){
                    $new_date = Carbon::parse($start_time);
                    //$new_date->addHours(1);
                }else{
                    $new_date = Carbon::parse($new_date);
                    $new_date->addHours(1);
                }


                $data = array(
                    'name' => $name[$count],
                    'url'  => $url[$count],
                    'category_id'  => $category_id,
                    'start_time'  => $new_date


                );
                $insert_data[] = $data;
            }

            //dd($insert_data);
            Match::insert($insert_data);
            return response()->json([
                'success'  => 'تم الإضافة بنجاح'
            ]);
        }
    }

    public function show(Match $match)
    {
        //
    }

    public function edit(Match $match)
    {
        $categories = Category::all();
        return view('dashboard.matches.edit', compact('match', 'categories'));
    }

    public function update(Request $request, Match $match)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'url' => 'required',

        ]);

        $request_data = $request->all();

        //dd($request_data);
        $match->update($request_data);
        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.matches.index');
    }

    public function destroy(Match $match)
    {
        $match->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.matches.index');
    }

}
