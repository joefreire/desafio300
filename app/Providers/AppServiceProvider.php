<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Carbon\Carbon::setLocale($this->app->getLocale());
        \setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        \date_default_timezone_set('America/Sao_Paulo');
        \Schema::defaultStringLength(191);
        $desafios = \DB::table('medalhas')->where('ativo', 'Sim')
        ->get();
        \View::share ( 'desafios', $desafios );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
