<?php

namespace App\Repositories;

use App\DTO\Roles\CreateRoleDTO;
use App\Models\Role;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\DTO\Roles\EditUserDTO;

class UserRepository
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

    public function createNew(CreateUserDTO $dto): Role
    {
        $data = (array) $dto;
        $data['password'] = bcrypt($data['password']);
        return $this->role->create($data);
    }

    public function findById(string $id): ?Role
    {
        return $this->role->find($id);
    }

    public function update(EditUserDTO $dto): bool
    {
        if(!$role = $this->findById($dto->id)) {
            return false;
        }

        $data = (array) $dto;
        unset($data['password']);

        if($dto->password !== null) {
            $data['password'] = bcrypt($dto->password);
        }

        return $role->update($data);
    }

    public function delete(string $id): bool
    {
        if(!$role = $this->findById($id)) {
            return false;
        }

        return $role->delete();
    }
}
