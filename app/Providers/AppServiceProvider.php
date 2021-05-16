<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< Updated upstream
        // SQLiteの時、外部キー制約を有効にする
        if (DB::getDriverName() == 'sqlite') { 
            Schema::enableForeignKeyConstraints();
        }
=======
	    //
>>>>>>> Stashed changes
    }
}
