<?php

namespace App\DTO\Roles;

class EditRoleDTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $label
    ) {

    }
}
