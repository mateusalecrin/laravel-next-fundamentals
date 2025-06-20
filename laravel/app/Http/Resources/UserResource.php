<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\RoleResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'email'       => $this->email,
            'avatar'      => $this->avatar,
            'is_active'   => $this->is_active,
            'is_verified' => $this->is_verified,
            'roles'       => RoleResource::collection($this->whenLoaded('roles')),
        ];
    }

    // public function toArray(Request $request): array
    // {
    //     return parent::toArray($request);
    // }
}
