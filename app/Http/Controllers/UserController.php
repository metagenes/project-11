<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function profil()
    {
        return view('user.profil');
    }

    public function create()
    {
        return view('user.create',);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:64',
            'email'=> 'required|string|max:64|unique:users',
            'password'=> 'required|string|min:8'
        ]);
        $request = User::create([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);
        return redirect()->route('profil')->with('success', 'Admin berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DTKSd  $dtksd
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    public function kelolaAdmin(Request $request)
    {
        $user = User::latest()->paginate(10);
        $user->appends(request()->input())->links();
        return view('user.kelola-admin', compact('user'));
    }
   
    public function edit(User $user)
    {
        return view('user.edit', [
            'user'                          => $user,
        ]);
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Amdin berhasil diperbarui');     
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfil(Request $request, User $user)
    {
        if (request()->ajax()) {
            $validator = Validator::make($request->all(),[
                'foto_profil'   => ['required', 'image','mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error'     => true,
                    'message'   => $validator->errors()->all()
                ]);
            }

            if ($user->foto_profil != 'noavatar.png') {
                File::delete(storage_path('app/'.$user->foto_profil));
            }
            $user->foto_profil = $request->file('foto_profil')->store('public/foto_profil');
            $user->save();

            return response()->json([
                'error'     => false,
                'data'      => ['foto_profil'   => $user->foto_profil]
            ]);
        } else {
            $data = $request->validate([
                'nama'          => ['required', 'max:32', 'string'],
            ]);

            if ($request->nama != $user->nama) {
                $user->update($data);
                return redirect()->back()->with('success','Profil berhasil di perbarui');
            } else {
                return redirect()->back()->with('error','Tidak ada perubahan yang berhasil disimpan');
            }
        }
    }

    public function pengaturan()
    {
        return view('user.pengaturan');
    }

    public function updatePengaturan(Request $request, User $user)
    {
        $email = false;
        $password = false;
        $request->validate([
            'email'         => ['nullable','string','email','max:32',Rule::unique('users','email')->ignore($user)],
            'password'      => ['nullable','string','min:8','confirmed'],
            'password_lama' => ['required','string','min:8'],
        ]);
        if (Hash::check($request->password_lama, $user->password)) {
            if ($request->email == '' && $request->password == '') {
                return redirect()->back()->with('error','Tidak ada perubahan yang berhasil disimpan');
            } else {
                if($request->email){
                    $user->email = $request->email;
                    $user->email_verified_at = null;
                    $email = true;
                }

                if ($request->password && $request->password_confirmation) {
                    $user->password = Hash::make($request->password);
                    $password = true;
                }
                $user->save();

                if ($email && $password) {
                    return redirect()->back()->with('success','Email dan password berhasil diperbarui');
                } elseif ($email) {
                    return redirect()->back()->with('success','Email berhasil diperbarui');
                } elseif($password){
                    return redirect()->back()->with('success','Password berhasil diperbarui');
                }
            }
        } else {
            return redirect()->back()->with('error','Password yang anda masukkan salah');
        }
    }
}
