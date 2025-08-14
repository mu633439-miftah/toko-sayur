<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validasi = $request->validate([
                'name' => ['string', 'required', 'min:2'],
                'username' => ['string', 'required', 'unique:users,username'],
                'email' => ['string', 'required', 'unique:users,email'],
                'no_wa' => ['string', 'max:13'],
                'password' => ['required', 'string', 'min:8'],
                'password_confirm' => 'required|string|min:8|same:password',
            ]);

            DB::beginTransaction();

            // hapus password confirm
            unset($validasi['password_confirm']);
            $validasi['role'] = 'user';
            $validasi['password'] = Hash::make($validasi['password']);

            User::create($validasi);

            DB::commit();
            return redirect()->back()->with('success', 'Berhasil menambahkan user');
        } catch (ValidationException $e) {
            // Tangani error validasi dengan menampilkan pesan error di halaman
            return redirect()->back()->withErrors($e->validator)->withInput()->with('error', 'Terdapat kesalahan validasi');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan user');
        }
    }

    // list user
    public function listUser()
    {

        $users = User::orderBy('created_at', 'desc')->paginate(20);

        return view('dashboard.users', compact('users'));
    }

    // detail user
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);

            return view('pages.users.index', [
                'user' => $user,
                'modalUser' => true
            ]);
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Data user tidak ditemukan');
        }
    }

    // update user
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $validasi = $request->validate([
                'name' => ['string', 'required', 'min:2'],
                'username' => ['string', 'required', 'unique:users,username,' . $id],
                'email' => ['string', 'required', 'unique:users,email,' . $id],
                'role' => ['required', 'in:admin,user'],
                'no_wa' => ['string', 'max:13'],
                'password' => ['nullable', 'string', 'min:8']
            ]);

            DB::beginTransaction();

            if (!empty($validasi['password'])) {
                $validasi['password'] = Hash::make($validasi['password']);
            } else {
                unset($validasi['password']);
            }

            $user->update($validasi);

            DB::commit();
            return redirect()->back()->with('success', 'Berhasil memperbarui user');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui user');
        }
    }

    // hapus user
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            DB::beginTransaction();

            $user->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Berhasil menghapus user');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus user');
        }
    }
}
