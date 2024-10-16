<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(){
        $blog=Blogs::get();
        return view('backend.blog.index',[
            'ManggilBlog'=>$blog
        ]);
    }
    public function aksi_tambah(Request $request){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'file'=>'required|file|mimes:png,jpg,jpeg'|'max:2048',
        ]);
        $data =[
            'title'=> $request->title,
            'description'=>$request->description,
            'slug'=>Str::slug($request->title),
            'created_by'=>auth()->user()->id,
            'created_at'=>date('Y-m-d h:i:s')
        ];
        //skrip memeriksa apakah ada file yang diunggah dengan request menggunakan $request->hasFile('file)
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() .'.' . $file->getClientOriginalExtension();
            $file->move(public_path('blogs'), $filename);
            //jika file sudah di upload masukan nama file/folder
            $data['file']='blogs/' .$filename;
        }
        Blogs::insert($data);
        return redirect()->route('backend.blog')->with('succes','Blog berhasil ditambahkan');
    }
}
