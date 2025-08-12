<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // List users for DataTable (AJAX)
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::withCount('blogs')->get();
            return datatables()->of($users)
                ->addColumn('action', function ($user) {
                    return '
                        <button class="btn btn-info edit-btn" data-id="'.$user->id.'">Edit</button>
                        <button class="btn btn-danger delete-btn" data-id="'.$user->id.'">Delete</button>
                    ';
                })
                ->make(true);
        }
        return view('users.index');
    }

    // Show user edit form (AJAX)
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // Update user (AJAX)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email,'.$id,
            'mobile' => 'required|digits:10',
            'gender' => 'required|in:Male,Female,Other',
            'status' => 'required|in:Active,Inactive',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'mobile', 'gender', 'status'));

        return response()->json(['success' => true, 'message' => 'User updated successfully.']);
    }

    // Delete user (AJAX)
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['success' => true, 'message' => 'User deleted successfully.']);
    }

    // Show user details (optional, AJAX)
    public function show($id)
    {
        $user = User::withCount('blogs')->findOrFail($id);
        return response()->json($user);
    }
}