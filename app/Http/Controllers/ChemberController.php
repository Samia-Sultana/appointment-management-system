<?php

namespace App\Http\Controllers;

use App\Models\Chember;
use Illuminate\Http\Request;

class ChemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.createChember');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Chember::create([
            'name' => $request->name,
            'location' => $request->address,
            'telephone' => $request->telephone
        ]);

        return redirect()->route('admin.chemberPage');
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
     * @param  \App\Models\Chember  $chember
     * @return \Illuminate\Http\Response
     */
    public function show(Chember $chember)
    {
        $chembers = Chember::all();
        return view('admin.chemberList', compact('chembers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chember  $chember
     * @return \Illuminate\Http\Response
     */
    public function edit(Chember $chember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chember  $chember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chember $chember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chember  $chember
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chember $chember)
    {
        //
    }
}
