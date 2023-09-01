<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailFeature;
use App\Models\FeatureBlog;
use Illuminate\Http\Request;

class ServiceBlogController extends Controller
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
        return view('admin.pages.service.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DetailFeature $request)
    {
        //
        $data = new FeatureBlog();

        $data->title = $request->title;
        $data->discription = $request->discription;

        $imagename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('featureblog_image'), $imagename);
        $data->image = $imagename;

        $data->save();
        // dd($logoname);
        return redirect()->route('service.blog.show')->with('success', 'Data saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $data = FeatureBlog::paginate(3);
        return view('admin.pages.service.blog.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = FeatureBlog::find($id);
        return view('admin.pages.service.blog.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);
        $data = FeatureBlog::find($id);

        $data->title = $request->title;
        $data->discription = $request->discription;

        $imagename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('featureblog_image'), $imagename);
        $data->image = $imagename;

        $data->save();

        return redirect()->route('service.blog.show')->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = FeatureBlog::find($id);

        if ($data->image) {
            $imagesPath = public_path('featureblog_image/' . $data->image);

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
