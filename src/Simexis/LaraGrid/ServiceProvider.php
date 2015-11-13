<?php 

namespace Simexis\LaraGrid;

use Illuminate\Support\ServiceProvider AS BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    /**
	 * Register the service provider.
	 *
	 * @return void
	 */
    public function register()
    { 
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('datagrid.php'),
        ], 'config');

        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'datagrid'
        );
		
		$this->app->bind('laraGrid', function () {
            return new Grid\Grid();
        });
		
    }

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
    public function boot()
    { 
        $this->loadViewsFrom(__DIR__.'/resources/views', 'datagrid');
		$this->loadTranslationsFrom(__DIR__.'/Lang', 'datagrid');
			
        $this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views/vendor/datagrid'),
        ], 'views');
		
		
        $this->publishes([
            __DIR__.'/Lang' => base_path('resources/lang'),
        ]);
		
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [
			'laraGrid'
		];
	}

}
