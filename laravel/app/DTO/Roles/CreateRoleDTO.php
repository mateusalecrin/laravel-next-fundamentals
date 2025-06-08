<?php

namespace App\DTO\Roles;

class CreateRoleDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $label,
    ) {

    }
}
