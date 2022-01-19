<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserPreference;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => ['required'],
            'occupation' => ['required'],
            'bio' => ['required'],
            'relationship_status' => ['required'],
            'country_of_birth' => ['required'],
            'min_price' => ['required'],
            'max_price' => ['required'],
            'smokers_ok' => ['required'],
            'pets_ok' => ['required'],
            'min_age' => ['required'],
            'max_age' => ['required'],
            'preferred_gender' => ['required'],
            'location' => ['required'],
            'mobile' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile
        ]);

        event(new Registered($user));

        UserInfo::create([
            'gender' => $request->gender,
            'occupation' => $request->occupation,
            'bio' => $request->bio,
            'relationship_status' =>$request->relationship_status,
            'country_of_birth' => $request->country_of_birth,
            'age' => $request->age,
            'user_id' => $user->id
            
        ]);

        UserPreference::create([
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'smokers_ok' => $request->smokers_ok,
            'pets_ok' => $request->pets_ok,
            'min_age' => $request->min_age,
            'max_age' => $request->max_age,
            'preferred_gender' => $request->preferred_gender,
            'location' => $request->location,
            'user_id' => $user->id
        ]);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
