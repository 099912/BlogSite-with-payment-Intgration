<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PositionValidation;
use App\Models\AboutPosition;
use Illuminate\Http\Request;

class AboutPositionController extends Controller
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
        return view('admin.pages.about.position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PositionValidation $request)
    {

        $data=new AboutPosition();
        // $data->save($request->validated());
        $data->title=$request->title;
        $data->category=$request->category;

        $data->job_type=$request->job_type;
        $data->save();
        return redirect()->route('about.position.show')->with('success', 'Data saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $data=AboutPosition::paginate(3);
        return view('admin.pages.about.position.view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data=AboutPosition::find($id);
        return view('admin.pages.about.position.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data=AboutPosition::find($id);

        ///shorter way
        $data->update($request->validated());
        // $data->title=$request->title;
        // $data->category=$request->category;

        // $data->job_type=$request->job_type;
        // $data->save();
        return redirect()->route('about.position.show')->with('success', 'Data saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=AboutPosition::find($id);

        if ($data) {
            $data->delete();
            return response(['status' => true]);
        } else {
            return response(['status' => false]);
        }
}
}
