<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialValidation;
use App\Models\HomeTestimonial;
use Illuminate\Http\Request;

class HomeTestimonialController extends Controller
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
        return view('admin.pages.home.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialValidation $request)
    {
        //
        $data = new HomeTestimonial;
        $data->name = $request->name;
        $data->profession = $request->profession;
        $data->discription = $request->discription;
        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('testimonialimage'),$imagename);
        $data->image=$imagename;
        $data->save();
        return redirect()->route('home.testimonial.show')->with('success', 'Data Saved Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $data=HomeTestimonial::paginate(3);
        return view('admin.pages.home.testimonial.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data=HomeTestimonial::find($id);
        return view('admin.pages.home.testimonial.update', compact('data'));
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
        $data=HomeTestimonial::find($id);
        $data->name = $request->name;
        $data->profession = $request->profession;
        $data->discription = $request->discription;
        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('testimonialimage'),$imagename);
        $data->image=$imagename;
        $data->save();
        return redirect()->route('home.testimonial.show')->with('success', 'Data Saved Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=HomeTestimonial::find($id);
        if ($data->image) {
            $imagesPath = public_path(' testimonialimage/' . $data->image);

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
