<?php
use Illuminate\Support\Facades\Artisan;

Artisan::command('product:deactivate', function () {
    \Modules\Product\Models\Productlist::where('status', 'active')
        ->where('quantity', 0)
        ->update(['status' => 'inactive']);

    $this->info('Inactive products updated successfully.');
});
