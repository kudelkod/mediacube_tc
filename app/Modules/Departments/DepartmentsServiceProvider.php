<?php

namespace App\Modules\Departments;

use App\Modules\Departments\Repositories\DepartmentsRepositoryInterface;
use App\Modules\Departments\Repositories\impl\DepartmentsRepository;
use App\Modules\Departments\Services\DepartmentsServiceInterface;
use App\Modules\Departments\Services\impl\DepartmentsService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DepartmentsServiceProvider extends ServiceProvider
{
    public $bindings = [
        DepartmentsServiceInterface::class => DepartmentsService::class,
        DepartmentsRepositoryInterface::class => DepartmentsRepository::class,
    ];

    public function register()
    {
    }

    public function boot()
    {
        $this->registerViews();

        Route::middleware('web')
            ->prefix('/departments')
            ->group(__DIR__ . '/routes/routes.php');

        Route::middleware('web')
            ->prefix('/departmentsApi')
            ->group(__DIR__.'/routes/routesApi.php');

    }

    public function registerViews(){

        $this->loadViewsFrom(
            __DIR__ . '/../../../resources/views', 'departments'
        );
    }

}
