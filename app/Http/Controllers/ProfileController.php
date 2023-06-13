<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

// class ProfileController extends Controller
// {
//     public function show()
//     {
//         $user = Auth::user();

//         return view('profile', compact('user'));
//     }

//     public function update(Request $request)
//     {
//         $user = Auth::user();

//         $validatedData = $request->validate([
//             'name' => ['required', 'string', 'max:255'],
//             'email' => [
//                 'required',
//                 'string',
//                 'email',
//                 'max:255',
//                 Rule::unique('users')->ignore($user->id),
//             ],
//             'password' => ['nullable', 'string', 'min:8', 'confirmed'],
//             'nrp' => ['required', 'numeric', 'digits_between:1,20'],
//             'date' => ['required', 'date'],
//         ]);

//         $user->name = $request->input['name'];
//         $user->email = $request->input['email'];
//         if ($request->filled('password')) {
//             $user->password = Hash::make($validatedData['password']);
//         }
//         $user->nrp = $request->input['nrp'];
//         $user->date = $request->input['date'];
//         // $user->password = $request->input['password'];
//         $user->save();

//         return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
//     }
// }

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    /**
     * Mengupdate data profil.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'nrp' => ['required', 'numeric', 'digits_between:1,20'],
            'date' => ['required', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nrp = intval($request->nrp);
        $user->date = $request->date;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('profile_images', 'public'); // Menyimpan gambar ke direktori 'storage/app/public/profile_images'
            $user->image = $imagePath;
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }
}
