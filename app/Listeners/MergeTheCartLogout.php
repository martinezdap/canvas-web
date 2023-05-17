<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MergeTheCartLogout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        // Eliminar registro
        Cart::deleteStoredCart(auth()->user()->id);

        // Nuevo registro
        Cart::store(auth()->user()->id);
    }
}
