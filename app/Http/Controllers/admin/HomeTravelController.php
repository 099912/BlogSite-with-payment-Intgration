<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelValidation;
use Illuminate\Http\Request;
use App\Models\HomeTravel;

class HomeTravelController extends Controller
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
        return view('admin.pages.home.travel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TravelValidation $request)
    {
        //
        $data=new HomeTravel;
        $data->title=$request->title;
        $data->location=$request->location;
        $data->price=$request->price;

        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('travelimage'),$imagename);
        $data->image=$imagename;

        $data->save();
    // dd($logoname);
        return redirect()->route('home.travel.show')->with('success', 'Data saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $data=HomeTravel::paginate(3);
        return view('admin.pages.home.travel.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data=HomeTravel::find($id);
        return view('admin.pages.home.travel.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data=HomeTravel::find($id);
        $data->title=$request->title;
        $data->location=$request->location;
        $data->price=$request->price;

        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('travelimage'),$imagename);
        $data->image=$imagename;

        $data->save();
    // dd($logoname);
        return redirect()->route('home.travel.show')->with('success', 'Data saved successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=HomeTravel::find($id);
        if ($data->image) {
            $imagesPath = public_path('travelimage/' . $data->image);

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
