<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return UserResource::collection(User::all());
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(UserRequest $request)
	{	
		$data = $request->all();
		$data['password'] = bcrypt(12345678);
		$user = User::create($data);
		return new UserResource($user);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(User $user)
	{
		return new UserResource($user);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(UserRequest $request, User $user)
	{
		$data = $request->all();
		$user->update($data);
		return new UserResource($user);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(User $user)
	{
		$user->delete();
		return response()->noContent();
	}
}
