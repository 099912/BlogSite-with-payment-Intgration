<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemoriesValidation;
use App\Models\HomeMemories;
use Illuminate\Http\Request;

class HomeMemoriesController extends Controller
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
        return view('admin.pages.home.memories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemoriesValidation $request)
    {
        //
        $data = new HomeMemories;
        $data->title = $request->title;
        $data->discription = $request->discription;
        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('memoriesimage'),$imagename);
        $data->image=$imagename;
        $data->save();

        return redirect()->route('home.memories.show')->with('success', 'Data Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $data=HomeMemories::all();
        return view('admin.pages.home.memories.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data=HomeMemories::find($id);
        return view('admin.pages.home.memories.update', compact('data'));
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
        $data=HomeMemories::find($id);
        $data->title=$request->title;
        $data->discription=$request->discription;

        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('memoriesimage'),$imagename);
        $data->image=$imagename;
        $data->save();

        return redirect()->route('home.memories.show')->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=HomeMemories::find($id);
        if ($data->image) {
            $imagesPath = public_path('memoriesimage/' . $data->image);

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
