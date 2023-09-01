<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutTeamValidation;
use App\Models\AboutTeam;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pages.about.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutTeamValidation $request)
    {
        //
        $data = new AboutTeam;
        $data->name = $request->name;
        $data->profession = $request->profession;
        $data->discription = $request->discription;
        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('teamimage'),$imagename);
        $data->image=$imagename;
        $data->save();
        return redirect()->route('about.team.show')->with('success', 'Data Saved Successfully');
    }

    /**
     * Display the view of the crud
     */

    public function show(AboutTeam $aboutTeam)
    {
        //
        $aboutTeam = AboutTeam::paginate(3);
        return view('admin.pages.about.team.view',compact('aboutTeam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutTeam $aboutTeam)
    {
        // dd($aboutTeam);
        return view('admin.pages.about.team.update',compact('aboutTeam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutTeam $aboutTeam)
    {
        $aboutTeam->name = $request->name;
        $aboutTeam->profession = $request->profession;
        $aboutTeam->discription = $request->discription;
        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('teamimage'),$imagename);
        $aboutTeam->image=$imagename;
        $aboutTeam->save();
        return redirect()->route('about.team.show')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutTeam $aboutTeam)
    {
        if ($aboutTeam->image) {
            $imagesPath = public_path('teamimage/' . $aboutTeam->image);

            if (file_exists($imagesPath)) {
                unlink($imagesPath);
            }
        }
        if ($aboutTeam) {
            $aboutTeam->delete();
            return response(['status' => true]);
        } else {
            return response(['status' => false]);
        }


    }
}
