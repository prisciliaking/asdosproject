<?php

namespace App\Http\Controllers;

use App\Models\Role;

class RoleController extends Controller
{
    // Menampilkan semua data role
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    // Menampilkan data role berdasarkan ID
    public function show($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        return response()->json($role);
    }
}


// // Menambahkan data role baru
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'role_name' => 'required|string|max:255',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $role = Role::create($request->only(['role_name']));

    //     return response()->json(['message' => 'Role created successfully', 'data' => $role], 201);
    // }
    // // Mengupdate data role berdasarkan ID
    // public function update(Request $request, $id)
    // {
    //     $role = Role::find($id);

    //     if (!$role) {
    //         return response()->json(['message' => 'Role not found'], 404);
    //     }

    //     $validator = Validator::make($request->all(), [
    //         'role_name' => 'sometimes|string|max:255',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $role->update($request->only(['role_name']));

    //     return response()->json(['message' => 'Role updated successfully', 'data' => $role]);
    // }
    // // Menghapus data role
    // public function destroy($id)
    // {
    //     $role = Role::find($id);

    //     if (!$role) {
    //         return response()->json(['message' => 'Role not found'], 404);
    //     }

    //     $role->delete();

    //     return response()->json(['message' => 'Role deleted successfully']);
    // }