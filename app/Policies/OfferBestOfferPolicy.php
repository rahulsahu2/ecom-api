<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\offer_BestOffer;
use App\Models\User;

class OfferBestOfferPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\offer_BestOffer  $offerBestOffer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, offer_BestOffer $offerBestOffer)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\offer_BestOffer  $offerBestOffer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, offer_BestOffer $offerBestOffer)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\offer_BestOffer  $offerBestOffer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, offer_BestOffer $offerBestOffer)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\offer_BestOffer  $offerBestOffer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, offer_BestOffer $offerBestOffer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\offer_BestOffer  $offerBestOffer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, offer_BestOffer $offerBestOffer)
    {
        //
    }
}
