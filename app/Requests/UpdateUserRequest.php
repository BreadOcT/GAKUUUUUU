<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize() { return auth()->check() && auth()->user()->role === 'admin'; }
   public function rules()
{
    $id = $this->route('user') ? $this->route('user')->id : null;

    return [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|string|min:6',
        'role' => 'required|in:admin,tentor,siswa',
        'is_active' => 'required|boolean',
    ];
}

}
