<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::where('id', 1)->get();
        $setting = $setting->all();
        
        return view('dashboard.settings.index', compact('setting'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Setting $setting)
    {
        //
    }

    public function edit(Setting $setting)
    {
        //
    }

    public function update(Request $request, Setting $setting)
    {
        $rules = [
            'contact_phone' => 'required',
            'email' => 'required',
        ];

        $request->validate($rules);

        $request_data = $request->all();

        if ($request->logo) {

            if ($setting->logo != 'logo.png') {

                Storage::disk('public_uploads')->delete('/setting_images/' . $setting->logo);

            }//end of inner if

            Image::make($request->logo)
                /* ->resize(300, null, function ($constraint) {
                     $constraint->aspectRatio();
                 })*/
                ->save(public_path('uploads/setting_images/' . $request->logo->hashName()));
            $request_data['logo'] = $request->logo->hashName();
        }//end of external if
        if ($request->favicon) {

            if ($setting->favicon != 'favicon.png') {

                Storage::disk('public_uploads')->delete('/setting_images/' . $setting->favicon);

            }//end of inner if

            Image::make($request->favicon)
                /* ->resize(300, null, function ($constraint) {
                     $constraint->aspectRatio();
                 })*/
                ->save(public_path('uploads/setting_images/' . $request->favicon->hashName()));
            $request_data['favicon'] = $request->favicon->hashName();
        }//end of external if
        $setting->update($request_data);
        session()->flash('success', __('site.updated_successfully'));

        return redirect()->route('dashboard.settings.index');
    }

    public function destroy(Setting $setting)
    {
        //
    }
}
