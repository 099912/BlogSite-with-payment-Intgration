<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExploreValidation;
use App\Models\HomeExplore;
use App\Models\HomeHeader;
use Illuminate\Http\Request;

class HomeExploreController extends Controller
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
        return view('admin.pages.home.explore.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExploreValidation $request)
    {
        //
        // $request->validate([
        //     'title' =>'required',
        //     'description' =>'required',
        //     'image' =>'required',
        // ]);

        $data = new HomeExplore();
        $data->title = $request->title;
        $data->discription = $request->discription;
        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('exploreimage'),$imagename);
        $data->image=$imagename;
        $data->save();

        return redirect()->route('home.explore.show')->with('success', 'Data Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $data=HomeExplore::all();
        return view('admin.pages.home.explore.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data=HomeExplore::find($id);
        return view('admin.pages.home.explore.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',

    ]);
        $data=HomeExplore::find($id);
        $data->title=$request->title;
        $data->discription=$request->discription;

        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('exploreimage'),$imagename);
        $data->image=$imagename;
        $data->save();

        return redirect()->route('home.explore.show')->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=HomeExplore::find($id);
        if ($data->image) {
            $imagesPath = public_path('exploreimage/' . $data->image);

            if (file_exists($imagesPath)) {
                unlink($imagesPath);
            }
        }
        if ($data) {
            $data->delete();
            return response(['status' => true]);
        } else {
            return response(['status' => false]);
        }
    }
}
