<?php namespace Hailwood\Smartless4laravel;

use Illuminate\Support\ServiceProvider;

class Smartless4laravelServiceProvider extends ServiceProvider{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(){

        $this->package('hailwood/smartless4laravel');

        if(!$this->app->runningInConsole()){

            $smartless = new SmartLess( $this->app );

            $smartless->compile();
        }


    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(){

        $this->registerBindings();
        $this->registerCommands();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(){
        return array();
    }

    public function registerBindings(){
        $this->app['smartless'] = $this->app->share(function($app)
        {
            return new SmartLess($app);
        });
    }

    public function registerCommands(){

        $this->app['command.smartless'] = $this->app->share(function($app)
        {
            return new Console\SmartlessCommand;
        });

        $this->app['command.smartless.compile'] = $this->app->share(function($app)
        {
            return new Console\CompileCommand($app['smartless']);
        });

        $this->commands('command.smartless', 'command.smartless.compile');
    }

}