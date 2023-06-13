<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
//return type View
use Illuminate\View\View;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


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
        $user = Auth::user();
        $posts = Post::all();

        // Kirim data posting ke tampilan
        return view('pagemateri', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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


        // Simpan data ke database
        $post = new Post;
        $post->file_name = $request->file_name;
        $post->material_type = $request->material_type;
        $post->material_description = $request->material_description;
        $post->upload_file = $request->file('upload_file')->store('uploads');
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
        $user = Auth::user();
        $post = Post::findOrFail($id);

        //render view with post
        return view('filepage', compact('post','user'));

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
        Storage::delete('storage/app/'.$post->upload_file);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
