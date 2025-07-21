<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;

class ProfileController extends Controller
{
    // عرض نموذج التعديل
    public function edit()
    {
        $user = Auth::user();

        return view('dashboard.profile.edit', [
            'user' => $user,
            'countries' => array_values(Countries::getNames('eg')), // ['Egypt', 'France', ...]
            'locales' => array_values(Languages::getNames('en')),   // ['English', 'Arabic', ...]
        ]);
    }

    // تنفيذ التحديث
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['nullable', 'date', 'before:today'],
            'gender' => ['nullable', 'in:male,female'],
            'street_addrees' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'postal_code' => ['nullable', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'local' => ['required', 'string', 'max:255'],
        ]);

        $user = $request->user();

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only([
                'first_name', 'last_name', 'birthday', 'gender',
                'street_addrees', 'city', 'state', 'postal_code',
                'country', 'local',
            ])
        );
        
        return redirect()->route('dashboard.profile.edit')
            ->with('success', 'Profile updated successfully!');
    }
}
