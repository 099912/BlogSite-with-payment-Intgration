<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceFeature;
use App\Models\ServiceFeatures;
use Illuminate\Http\Request;

class ServiceFeatureController extends Controller
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
        return view('admin.pages.service.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceFeature $request)
    {
        //
        $data=new ServiceFeatures();

        $data->title=$request->title;
        $data->discription=$request->discription;

        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('feature_image'),$imagename);
        $data->image=$imagename;

        $data->save();
    // dd($logoname);
        return redirect()->route('service.feature.show')->with('success', 'Data saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $data=ServiceFeatures::paginate(3);
        return view('admin.pages.service.feature.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         //
        $data=ServiceFeatures::find($id);
        return view('admin.pages.service.feature.update', compact('data'));
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
        $data=ServiceFeatures::find($id);

        $data->title=$request->title;
        $data->discription=$request->discription;

        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('feature_image'),$imagename);
        $data->image=$imagename;

        $data->save();

        return redirect()->route('service.feature.show')->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=ServiceFeatures::find($id);
        if ($data->image) {
            $imagesPath = public_path('feature_image/' . $data->image);

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
