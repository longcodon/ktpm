<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmuc;
use Illuminate\Support\Str;
class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $danhmuc = Danhmuc::orderBy('id','DESC')->get();
        $danhmuc=Danhmuc::all();
        return view('admin.danhmuc.index',compact('danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.danhmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required|unique:danhmuc|max:255',
            'description'=>'required|max:255',
            'image'=>'required',
            'status' => 'required',
            


        ],[
            'title.required'=>'Tiêu đề không được bỏ trống',
            'description.required'=>'Mô tả không được bỏ trống',
            'image.required'=>'vui lòng tải ảnh lên',
            'title.unique' => 'Tiêu đề đã có vui lòng nhập không trùng',
             'status.required'=>'check status',
            

        ]);


        $danhmuc=new Danhmuc();
        $danhmuc->title=$data['title'];
        $danhmuc->description=$data['description'];
        $danhmuc->status=$data['status'];
        $danhmuc->slug = Str::slug($data['title']);
        $danhmuc->country=$data['country'];
        $danhmuc->author=$data['author'];
        $danhmuc->transcribed=$data['transcribed'];
        $danhmuc->price=$data['price'];


        $get_image = $request->image;
        $path = 'uploads/danhmuc/';
        $get_name_image = $get_image->getClientOriginalName(); 
        $name_image = current(explode('.', $get_name_image));
        $new_image =  $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $danhmuc->image = $new_image;

        $danhmuc->save();
        // toastr()->success('Data has been saved successfully!', 'Congrats');
        return redirect()->route('danhmuc.index');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $danhmuc = Danhmuc::find($id);
        return view('admin.danhmuc.edit',compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $data=$request->validate([
            
            'description'=>'required|max:255',
            'title'=>'required',
            'status' => 'required',
            


        ],[
  
            'description.required'=>'Mô tả không được bỏ trống',
        'title.required'=>'Tiêu đềđề không được bỏ trống',
        
            'status.required'=>'check status',

        ]);


        $danhmuc= Danhmuc::find($id);
        $danhmuc->title=$data['title'];
        $danhmuc->description=$data['description'];
        $danhmuc->status=$data['status'];
        $danhmuc->slug = Str::slug($data['title']);
        
       
        if($request->image){
             $get_image = $request->image;
        $path = 'uploads/danhmuc/';
        $get_name_image = $get_image->getClientOriginalName(); 
        $name_image = current(explode('.', $get_name_image));
        $new_image =  $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $danhmuc->image = $new_image;

        }
      
        $danhmuc->save();
        // toastr()->success('Data has been saved successfully!', 'Congrats');
        return redirect()->route('danhmuc.index');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $danhmuc = Danhmuc::find($id);
        $danhmuc->delete();
          return redirect()->route('danhmuc.index');
       
    }
}
