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
use App\Models\Folder;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($folderNama)
    {
        //
        $user = Auth::user();
        $ecak = Post::where('foldernama', $folderNama)->get();
        $folder = Folder::whereIn('folderSemester', [1, 2, 3, 4, 5, 6])->get();
        // Kirim data posting ke tampilan
        return view('pagemateri', compact('user', 'ecak', 'folderNama', 'folder',));
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
        $ecak= $request->file('upload_file')->getSize();
        // Konversi ukuran file ke format yang lebih mudah dibaca
        $formattedSize = $this->formatFileSize($ecak);
        //move ke directory lain
        $uploadDir = 'public/uploads';
        $path = $request ->file('upload_file')->storeAs($uploadDir,$eca);
        // Dapatkan ukuran file dalam byte

         // Simpan data ke database
        $post = new Post;
        $post->file_name = $request->file_name;
        $post->material_type = $request->material_type;
        $post->material_description = $request->material_description;
        $post->owner = $request->owner;
        $post->foldernama = $request->folderNama;
        $post->upload_file = $eca;
        $post->fileSize = $formattedSize; // Menyimpan ukuran file

        $post->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Post created successfully!');


    }

    /**
     * Fungsi untuk mengonversi ukuran file dalam byte menjadi format yang lebih mudah dibaca (MB, GB, dsb.)
     *
     * @param int $size Ukuran file dalam byte
     * @param int $precision Jumlah digit desimal yang diinginkan
     * @return string Ukuran file yang diformat
     */
    private function formatFileSize($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');

        return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
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

        //delete post
        Storage::delete('storage/uploads/'.$post->upload_file);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->input('keyword');
        $user = Auth::user();
    		// mengambil data dari table pegawai sesuai pencarian data
		$posts = DB::table('posts')
		->where('file_name','like',"%".$cari."%")
        ->get();

    		// mengirim data pegawai ke view index
		return view('search-results', compact('user','posts'));

	}

    public function download($id)
    {
        $uploadDir = 'storage/uploads/';
        $post = Post::findOrFail($id);
        $data = DB::table('posts')->where('id',$id)->first();
        $filepath ="$uploadDir{$post->upload_file}";
        return response()->download($filepath);
    }

}
