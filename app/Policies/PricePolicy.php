<?php

namespace App\Policies;

use App\User;
use App\Price;
use Illuminate\Auth\Access\HandlesAuthorization;

class PricePolicy
{
    use HandlesAuthorization;

    /**
     * Can user delete this item
     *
     * @param User $user
     * @param Price $price
     * @return bool
     */
    public function destroy(User $user, Price $price)
    {
        return $user->id === $price->user_id;
    }

    /**
     * Can user update item
     *
     * @param User $user
     * @param Price $price
     * @return bool
     */
    public function update(User $user, Price $price)
    {
        return $user->id === $price->user_id;
    }
}
