<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Http\Response;
use App\Http\Resources\RoleResource;

class RoleUserController extends Controller
{
    public function __construct(private UserRepository $userRepository)
    {

    }

    public function sync(Request $request, $user)
    {
        $response = $this->userRepository->syncRoles($user, $request->roles);
        if(!$response) {
            return response()->json(['message' => 'user not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['message' => 'ok'], Response::HTTP_OK);
    }

    public function index(Request $request, $user)
    {
        if(!$this->userRepository->findById($user)) {
            return response()->json(['message' => 'user not found'], Response::HTTP_NOT_FOUND);
        }
        $roles = $this->userRepository->getRolesByUserId($user);
        return RoleResource::collection($roles);
    }
}
