<?php

namespace App\Repositories;

use App\User;

class PriceRepository
{
    /**
     * Get all items for concrete user
     *
     * @param  User  $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllForUser(User $user)
    {
        return $user->prices()
            ->orderBy('name', 'asc')
            ->get();
    }

    /**
     * @param User $user
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function getById(User $user, $id)
    {
        return $user->prices()->find($id);
    }
}