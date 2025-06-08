<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\RoleResource;
use App\DTO\Roles\CreateRoleDTO;
use App\DTO\Roles\EditRoleDTO;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    public function __construct(private RoleRepository $roleRepository)
    {

    }
    /*** Display a listing of the resource. */
    public function index(Request $request)
    {
        $roles = $this->roleRepository->getPaginate(
            totalPerPage: $request->total_per_page ?? 15,
            page: $request->page ?? 1,
            filter: $request->get('filter', '')
        );

        return RoleResource::collection($roles);
    }

    /*** Store a newly created resource in storage. */
    public function store(StoreRoleRequest $request)
    {
        $role = $this->roleRepository->createNew(new CreateRoleDTO(... $request->validated()));

        return new RoleResource($role);
    }

    /*** Display the specified resource. */
    public function show(string $id)
    {
        if(!$role = $this->roleRepository->findById($id)) {
            return response()->json(['message' => 'role not found'], 404);
        };

        return new RoleResource($role);
    }

    /*** Update the specified resource in storage. */
    public function update(UpdateRoleRequest $request, string $id)
    {
        $response = $this->roleRepository->update(new EditRoleDTO(... [$id, ...$request->validated()]));

        if(!$response) {
            return response()->json(['message' => 'role not found'], 404);
        }

        return response()->json(['message' => 'role updated with success']);
    }

    /*** Remove the specified resource from storage. */
    public function destroy(string $id)
    {
        if(!$this->roleRepository->delete($id)) {
            return response()->json(['message' => 'role not found'], 404);
        }

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
