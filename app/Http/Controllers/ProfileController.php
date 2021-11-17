<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();

        return view('profile.edit', [
            'user' => $user,
            'userInfo' => $user->info,
            'userPreferences' => $user->preference
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        $user = Auth::user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $user->info()->update([
            'occupation' => $request->occupation,
            'bio' => $request->bio,
            'relationship_status' => $request->relationship_status,
            'country_of_birth' => $request->country_of_birth
        ]);

        $user->preference->update([
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'smokers_ok' => $request->smokers_ok,
            'pets_ok' => $request->pets_ok,
            'min_age' => $request->min_age,
            'max_age' => $request->max_age,
            'preferred_gender' => $request->preferred_gender,
            'location' => $request->location

        ]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/');
    }
}

