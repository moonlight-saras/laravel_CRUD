<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::get([
            'id', 'facebook', 'twitter', 'linkedin', 'google'
        ]);
        return view('blog.show', compact('settings'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'facebook' => 'required',
            'twitter' => 'required'
        ]);
        $setting = new Settings([
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'linkedin' => $request->input('linkedin'),
            'google' => $request->input('google'),
        ]);
        $setting->save();
        return redirect()->route('blog.index')->with('success', 'Settings Created');
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
    public function edit($id)
    {
        $setting = Settings::find($id, [
            'facebook', 'twitter', 'linkedin', 'google'
        ]);
        return view('blog.form', compact('id', 'setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = Settings::find($id);
        $setting->facebook = $request->input('facebook');
        $setting->twitter = $request->input('twitter');
        $setting->linkedin = $request->input('linkedin');
        $setting->google = $request->input('google');
        $setting->save();
        return redirect()->route('blog.index')->with('success', 'Settings Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Settings::find($id);
        $setting->delete();
        return redirect()->route('blog.index')->with('success', 'Settings Delete');
    }
}
