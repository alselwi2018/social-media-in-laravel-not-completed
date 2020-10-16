<?php

namespace App\Observers;

use App\post;

class PostObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param  \App\post  $post
     * @return void
     */
    public function created(post $post)
    {
        //
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  \App\post  $post
     * @return void
     */
    public function updated(post $post)
    {
        //
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  \App\post  $post
     * @return void
     */
    public function deleted(post $post)
    {
        //
    }

    /**
     * Handle the post "restored" event.
     *
     * @param  \App\post  $post
     * @return void
     */
    public function restored(post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  \App\post  $post
     * @return void
     */
    public function forceDeleted(post $post)
    {
        //
    }
}
