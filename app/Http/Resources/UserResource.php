<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property \App\Models\User $resource
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'pseudo' => $this->pseudo,
            'email' => $this->email,
            'avatar_url' => $this->avatar_path,
            'partner' => $this->when($this->partner->isNotEmpty(), function () {
                return $this->partner->first();
            }),
        ];
    }
}
