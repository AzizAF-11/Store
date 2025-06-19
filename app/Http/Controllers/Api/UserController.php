<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUsersData()
    {
        $users = User::where('role', 'pencari bahan baku')->pluck('id');

        return response()->json([
            'data' => $users,
            'count' => $users->count(),
        ], 200);
    }

    public function checkUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'exists' => false,
                'message' => 'User not found',
            ], 404);
        }

        if ($user->role === 'pencari bahan baku') {
            return response()->json([
                'exists' => true,
                'message' => 'User found with correct role',
            ], 200);
        }

        return response()->json([
            'exists' => false,
            'message' => 'User role mismatch',
        ], 403);
    }
}
