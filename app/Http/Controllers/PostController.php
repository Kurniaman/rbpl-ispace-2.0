<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
//return type View
use Illuminate\View\View;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ecak = Post::all();

        // Kirim data posting ke tampilan
        return view('pagemateri', compact('ecak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $validatedData = $request->validate([
            'file_name' => 'required',
            'material_type' => 'required',
            'material_description' => 'required',
            'upload_file' => 'required|file',
        ]);


       //biar dpt file name aslinya
        $eca= $request->file('upload_file')->getClientOriginalName();
        //move ke directory lain
        $uploadDir = 'public/uploads';
        $path = $request ->file('upload_file')->storeAs($uploadDir,$eca);
         // Simpan data ke database
        $post = new Post;
        $post->file_name = $request->file_name;
        $post->material_type = $request->material_type;
        $post->material_description = $request->material_description;
        $post->upload_file = $eca;
        $post->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Post created successfully!');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('filepage', compact('post'));

    }

    // method untuk hapus data pegawai
    /*public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('posts')->where('id',$id)->delete();

        // alihkan halaman ke halaman pegawai
        return redirect('/materi');
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //delete image
        Storage::delete('storage/uploads/'.$post->upload_file);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function download($id)
    {
        $uploadDir = 'storage/uploads/';
        $post = Post::findOrFail($id);
        $data = DB::table('posts')->where('id',$id)->first();
        $filepath ="$uploadDir{$post->upload_file}";
        return response()->download($filepath);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->input('keyword');

    		// mengambil data dari table pegawai sesuai pencarian data
		$posts = DB::table('posts')
		->where('file_name','like',"%".$cari."%")
        ->get();

    		// mengirim data pegawai ke view index
		return view('search-results', compact('posts'));

	}

}
