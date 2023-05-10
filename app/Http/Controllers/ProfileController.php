<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Division;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit-test', [
            'user' => $request->user(),
            'division' => Division::all()
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        if ($request->photo) {
            $path_photo = $request->file('photo')->store('photo-profile', 'public');   
            
            if($request->oldImage && is_string($request->oldImage) && Storage::disk('public')->exists($request->oldImage)) {
                Storage::disk('public')->delete($request->oldImage);
            }

            $request->merge(['photo' => $path_photo]);
        }

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        // harus di update dulu nilai photonya, jadi nyimpennya ngga pake directory temporary-nya laravel. agak ribet kalo ngoding di bawaannya laravel
        if ($request->photo) {
            $request->user()->update(['photo' => $path_photo, 'oldImage' => $request->oldImage]);
        }
        
        Alert::toast('User profile updated successfully', 'success')->timerProgressBar();
        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
