<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceHead;
use App\Models\BlogDetail;
use App\Models\User;
use Illuminate\Http\Request;

class BlogDetailController extends Controller
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
        $data=User::all();
        return view('admin.pages.blog.detail.create',compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceHead $request)
    {
        //
        $data=new BlogDetail();
        $data->title=$request->title;
        $data->discription=$request->discription;
        $data->user_id=$request->user_id;
        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('blogdetail_image'),$imagename);
        $data->image=$imagename;

        $data->save();
    // dd($logoname);
        return redirect()->route('blog.detail.show')->with('success', 'Data saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $data=BlogDetail::paginate(3);
        return view('admin.pages.blog.detail.view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data=BlogDetail::find($id);
        return view('admin.pages.blog.detail.update',compact('data'));
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
        $data=BlogDetail::find($id);
        $data->title=$request->title;
        $data->discription=$request->discription;
        $data->user_id=$request->user_id;
        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('blogdetail_image'),$imagename);
        $data->image=$imagename;

        $data->save();
        return redirect()->route('blog.detail.show')->with('success', 'Data updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=BlogDetail::find($id);
        if ($data->image) {
            $imagesPath = public_path('blogdetail_image/' . $data->image);

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
