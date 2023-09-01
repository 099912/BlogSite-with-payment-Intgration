<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeaderValidation;
use App\Models\HomeHeader;
use Illuminate\Http\Request;

class HomeHeaderController extends Controller
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
        return view('admin.pages.home.header.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HeaderValidation $request)
    {
        //
        $data=new HomeHeader;
        $data->title=$request->title;
        $data->discription=$request->discription;

        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('headerimage'),$imagename);
        $data->image=$imagename;

        $data->save();
    // dd($logoname);
        return redirect()->route('home.head.show')->with('success', 'Data saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $data=HomeHeader::all();
        return view('admin.pages.home.header.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data=HomeHeader::find($id);
        return view('admin.pages.home.header.update',compact('data'));
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
        $data=HomeHeader::find($id);
        $data->title=$request->title;
        $data->discription=$request->discription;

        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('headerimage'),$imagename);
        $data->image=$imagename;
        $data->save();

        return redirect()->route('home.head.show')->with('success', 'Data updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=HomeHeader::find($id);
        if ($data->image) {
            $imagesPath = public_path('headerimage/' . $data->image);

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
