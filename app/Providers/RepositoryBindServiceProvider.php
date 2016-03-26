<?php

namespace App\Providers;

use App\Repositories\Core\AlbumRepositoryEloquent;
use App\Repositories\Core\PermissionRepositoryEloquent;
use App\Repositories\Core\PictureRepositoryEloquent;
use App\Repositories\Core\QrcodeRepositoryEloquent;
use App\Repositories\Core\RoleRepositoryEloquent;
use App\Repositories\Interfaces\AlbumRepository;
use App\Repositories\Interfaces\CarRepository;
use App\Repositories\Interfaces\PermissionRepository;
use App\Repositories\Interfaces\PictureRepository;
use App\Repositories\Interfaces\QrcodeRepository;
use App\Repositories\Interfaces\RoleRepository;
use App\Repositories\Interfaces\ShopRepository;
use App\Repositories\Models\Permission;
use App\Repositories\Modules\Cms\CarRepositoryEloquent;
use App\Repositories\Modules\Cms\ShopRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryBindServiceProvider extends ServiceProvider
{
    protected $defer = false;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AlbumRepository::class, AlbumRepositoryEloquent::class);
        $this->app->bind(PictureRepository::class, PictureRepositoryEloquent::class);
        $this->app->bind(QrcodeRepository::class, QrcodeRepositoryEloquent::class);
        $this->app->bind(CarRepository::class, CarRepositoryEloquent::class);
        $this->app->bind(ShopRepository::class, ShopRepositoryEloquent::class);
        $this->app->bind(RoleRepository::class, RoleRepositoryEloquent::class);
        $this->app->bind(PermissionRepository::class, PermissionRepositoryEloquent::class);

    }
}
