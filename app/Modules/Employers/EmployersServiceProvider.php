<?php

namespace App\Modules\Employers;

use App\Modules\Employers\Repositories\EmployersRepositoryInterface;
use App\Modules\Employers\Repositories\impl\EmployersRepository;
use App\Modules\Employers\Services\EmployersServiceInterface;
use App\Modules\Employers\Services\impl\EmployersService;
use Illuminate\Support\ServiceProvider;

class EmployersServiceProvider extends ServiceProvider
{
    public $bindings  = [
        EmployersServiceInterface::class => EmployersService::class,
        EmployersRepositoryInterface::class => EmployersRepository::class,
    ];

    public function register()
    {
    }

    public function boot()
    {
    }
}
