<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $current_user_id = Auth::user()->id;

        $sent_request_user_id = DB::table('friend_requests')
            ->where('sender_id', '=', $current_user_id)
            ->pluck('receiver_id');

        $friend_user_id = DB::table('friends')
            ->where('user_id', '=', $current_user_id)
            ->pluck('friend_id');

        $data_user = User::join('friend_requests', 'users.id', '=', 'friend_requests.sender_id')
            ->where('friend_requests.receiver_id', '!=', $current_user_id)
            ->whereNotIn('users.id', $sent_request_user_id)
            ->join('friends', 'users.id', '=', 'friends.friend_id')
            ->whereNotIn('users.id', $friend_user_id)
            ->where('users.id', '!=', $current_user_id)
            ->get(['users.*']);

        return view('page.home', compact('data_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
    public function destroy(string $id)
    {
        //
    }
}
