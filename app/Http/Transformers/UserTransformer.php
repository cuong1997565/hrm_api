<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;
use App\User;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'roles'
    ];

    public function transform(User $user = null)
    {
        if (is_null($user)) {
            return [];
        }

        return [
            'id'         => $user->id,
            'name'       => $user->name,
            'email'      => $user->email,
            'phone'      => $user->phone,
            'status'     => $user->status,
            'status_txt' => $user->getStatus(),
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ];
    }

    public function includeRoles(User $user = null)
    {
        if (is_null($user)) {
            return $this->null();
        }
        return $this->collection($user->roles, new RoleTransformer);
    }
}
