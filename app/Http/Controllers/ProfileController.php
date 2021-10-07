<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Profile;
// use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        if ($user->profile ==null) {
            $profile = Profile::create([
            'province' => 'Najaf',
            'user_id' => $id,
            'gender' => 'Male',
            'bio' => 'Hello World',
            'facebook' => 'https://www.facebook.com',
            ]);
        }
        return view('users.profile')->with('user',$user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'province' => 'required',
            'gender' => 'required',
            'bio' => 'required',
            // 'facebook' =>  'required',
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->profile->province = $request->province;
        $user->profile->gender = $request->gender;
        $user->profile->bio = $request->bio;
        $user->save();
        $user->profile->save();

        dd($request->all());
        if ($request->has('password')){
            $user->password = Hash::make($request->password);
            $user->save();
        }
    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
