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
    public function tambah(){
        return view('backend.blog.tambah');
    }
    public function aksi_tambah(Request $request){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'file'=>'required|file|mimes:jpeg,png|max:2048',
        ],[
            'title.required'=>'Silahkan isi judul blog',
            'file.required'=>'foto harus di isi',
            'file.mimes'=>'File harus berformat Jpeg atau png'
        ]
    );
        $data =[
            'title'=> $request->title,
            'description'=>$request->description,
            'slug'=>Str::slug($request->title), //Mengubah nilai title menjadi slug & mengubah string menjadi format url misalnya mengganti spasi dengan tanda hubung dan mengubah huruf menjadi huruf kecil
            'created_by'=> 0, //Menetapkan nilai 'created_by' ke 0, biasanya menunjukkan bahwa entri ini dibuat oleh pengguna default atau sistem.
            'created_at'=>date('Y-m-d h:i:s') //Mengambil timestamp saat ini menggunakan fungsi date() dalam format 'Y-m-d h:i,yang menghasilkan tanggal dan waktu saat ini.
        ];
        //skrip memeriksa apakah ada file yang diunggah dengan request menggunakan $request->hasFile('file)
        if ($request->hasFile('file')) { //Mengecek apakah ada file yang diunggah dengan kunci 'file' dalam permintaan (request). Jika ada, blok kode di dalam kurung kurawal akan dieksekusi
            $file = $request->file('file');
            $filename = time() .'.' . $file->getClientOriginalExtension();//Membuat nama file baru. time() menghasilkan timestamp saat ini, yang memastikan nama file unik.getClientOriginalExtension() mendapatkan ekstensi asli dari file yang diunggah (misalnya, jpg, png).
            $file->move(public_path('blogs'), $filename);//Memindahkan file yang diunggah ke direktori public/blogs dalam aplikasi. Metode move() mengambil dua argumen: tujuan direktori dan nama file baru
            //jika file sudah di upload masukan nama file/folder
            $data['file']='blogs/' .$filename;//ika file berhasil diunggah, nama file dan path-nya disimpan dalam array $data dengan kunci 'file'. Ini memungkinkan informasi tentang file diakses kemudian, misalnya, saat menyimpan data ke database.
        }
        Blogs::insert($data);
        return redirect()->route('backend.blog')->with('succes','Blog berhasil ditambahkan');//Setelah menyimpan data, skrip mengarahkan pengguna kembali ke rute backend.blog. Pesan sukses ('Blog berhasil ditambahkan') disertakan dalam sesi, yang biasanya ditampilkan kepada pengguna setelah dijalankan.
    }
}
