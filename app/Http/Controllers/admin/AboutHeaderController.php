<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutHeaderValidation;
use App\Models\AboutHeader;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;
use App\Traits\DeleteImgTrait;

class AboutHeaderController extends Controller
{
   use ImageTrait;
   use DeleteImgTrait;
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
        return view('admin.pages.about.header.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutHeaderValidation $request)
    {
        //
        $data=new AboutHeader();
        $data->title=$request->title;
        $data->discription=$request->discription;
        $data->image= $this->uploadImage('image', 'aboutheaderimage');
        $data->save();
        // dd($data);

        return redirect()->route('about.header.show')->with('success', 'Data saved successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data=AboutHeader::all();
        return view('admin.pages.about.header.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data=AboutHeader::find($id);
        return view('admin.pages.about.header.update',compact('data'));
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
        $data=AboutHeader::find($id);
        $data->title=$request->title;
        $data->discription=$request->discription;
        $data->image= $this->uploadImage('image', 'aboutheaderimage');
        $data->save();

        return redirect()->route('about.header.show')->with('success', 'Data updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // used traits for delete image
        $data=AboutHeader::find($id);
        $del=$this->DeleteImg($data,'image','aboutheaderimage/');
        return $del;


    }

}
