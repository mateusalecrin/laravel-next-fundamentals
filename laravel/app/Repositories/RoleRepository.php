<?php

namespace App\Repositories;

use App\DTO\Roles\CreateRoleDTO;
use App\Models\Role;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\DTO\Roles\EditRoleDTO;

class RoleRepository
{
    public function __construct(protected Role $role)
    {
    }

    public function getPaginate(int $totalPerPage = 15, int $page = 1, string $filter = ''): LengthAwarePaginator
    {
        return $this->role->where(function($query) use ($filter) {
            if ($filter !== '') {
                $query->where('name', 'LIKE', "%{$filter}%");
            }
        })->paginate($totalPerPage, ['*'], 'page', $page);
    }

    public function createNew(CreateRoleDTO $dto): Role
    {
        return $this->role->create((array) $dto);
    }

    public function findById(string $id): ?Role
    {
        return $this->role->find($id);
    }

    public function update(EditRoleDTO $dto): bool
    {
        if(!$role = $this->findById($dto->id)) {
            return false;
        }

        return $role->update((array) $dto);
    }

    public function delete(string $id): bool
    {
        if(!$role = $this->findById($id)) {
            return false;
        }

        return $role->delete();
    }
}
