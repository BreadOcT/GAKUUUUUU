<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('created_at','desc')->paginate(15);
        return view('admin.user.index', compact('users')); // folder user
    }

    public function create()
    {
        return view('admin.user.create');
    }

    // app/Http/Controllers/UserController.php

    public function store(Request $request)
    {
    // validasi bisa pakai FormRequest jika ada
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'role' => 'required|in:admin,tentor,siswa',
        'is_active' => 'sometimes|boolean',
    ]);
    // jika checkbox tidak dicentang, set 0
    $data['is_active'] = $request->has('is_active') ? 1 : 0;
    // hash password
    $data['password'] = bcrypt($data['password']);
    User::create($data);
    // redirect ke halaman index dengan flash message
    return redirect()->route('admin.users.index')
                     ->with('success', 'Akun berhasil ditambahkan!');
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function toggleStatus($id)
    {
    $user = User::findOrFail($id);
    $user->is_active = !$user->is_active;
    $user->save();

    return back()->with('success', 'Status user berhasil diubah.');
    }


    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
{
    $data = $request->only(['name', 'email', 'role', 'is_active']); // termasuk is_active

    // password hanya di-update jika diisi
    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    $user->update($data);

    return redirect()->route('admin.users.index')
                     ->with('success', 'Akun berhasil diperbarui!');
}


    public function destroy(User $user)
    {
        if (auth()->id() == $user->id) {
            return back()->with('error','Tidak dapat menghapus akun sendiri.');
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success','Akun dihapus.');
    }
}
