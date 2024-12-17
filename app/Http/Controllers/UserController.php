<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Menampilkan semua data user
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Menampilkan data user berdasarkan ID
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    // Menambahkan data user baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|unique:users,user_email',
            'user_nim' => 'required|string|unique:users,user_nim',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create($request->only(['user_name', 'user_email', 'user_nim']));

        return response()->json(['message' => 'User created successfully', 'data' => $user], 201);
    }

    // Mengupdate data user berdasarkan ID
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'user_name' => 'sometimes|string|max:255',
            'user_email' => 'sometimes|email|unique:users,user_email,' . $id . ',user_id',
            'user_nim' => 'sometimes|string|unique:users,user_nim,' . $id . ',user_id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user->update($request->only(['user_name', 'user_email', 'user_nim']));

        return response()->json(['message' => 'User updated successfully', 'data' => $user]);
    }

    // Menghapus data user
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
