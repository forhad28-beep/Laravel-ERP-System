<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view(
            'admin.settings.index',
            compact('setting')
        );
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        $data = $request->only([
            'company_name',
            'email',
            'phone',
            'address'
        ]);

        if ($request->hasFile('logo')) {

            $data['logo'] = $request
                ->file('logo')
                ->store('settings', 'public');
        }

        $setting->fill($data);

        $setting->save();

        activityLog(
            'Settings',
            'Settings updated'
        );

        return back()->with(
            'success',
            'Settings updated.'
        );
    }
}