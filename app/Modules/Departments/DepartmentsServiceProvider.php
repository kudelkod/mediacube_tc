<?php

namespace App\Modules\Departments;

use App\Modules\Departments\Repositories\DepartmentsRepositoryInterface;
use App\Modules\Departments\Repositories\impl\DepartmentsRepository;
use App\Modules\Departments\Services\DepartmentsServiceInterface;
use App\Modules\Departments\Services\impl\DepartmentsService;
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
    }
}
