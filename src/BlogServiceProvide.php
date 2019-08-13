<?php

namespace Brian\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * 服务提供者加是否延迟加载.
     *
     * @var bool
     */
    protected $defer = true; // 延迟加载服务
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'Blog'); // 视图目录指定
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/blog'),  // 发布视图目录到resources 下
            __DIR__.'/config/blog.php' => config_path('blog.php'), // 发布配置文件到 laravel 的config 下
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('blog', function ($app) {
            return new Blog($app['session'], $app['config']);
        });
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['blog'];
    }
    public function map()
    {
        dd(1);
    }
}
