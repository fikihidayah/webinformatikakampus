<?php

namespace App\Http\Controllers;

use App\Models\OtherSetting;
use Illuminate\Http\Request;

class OtherSettingController extends Controller
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
     * @param  \App\Models\OtherSetting  $otherSetting
     * @return \Illuminate\Http\Response
     */
    public function show(OtherSetting $othersetting)
    {
        // dd($otherSetting);
        return view('admin.settings.show-other', [
            'title' => 'Pengaturan Halaman Website | Profil',
            'subtitle' => 'edit',
            'oset' => $othersetting
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OtherSetting  $otherSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(OtherSetting $otherSetting)
    {
        return $otherSetting;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OtherSetting  $otherSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OtherSetting $othersetting)
    {
        $validate = $request->validate([
            'isi' => 'required'
        ]);
        if ($validate) {
            OtherSetting::where('id', $othersetting->id)->update($validate);

            return back()->with('success', "Berhasil mengubah halaman $othersetting->name");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OtherSetting  $otherSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtherSetting $otherSetting)
    {
        //
    }
}
