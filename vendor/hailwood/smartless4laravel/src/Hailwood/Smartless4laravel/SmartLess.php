<?php namespace Hailwood\Smartless4laravel;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use lessc;

class SmartLess{

    /**
     * Less compiler
     *
     * @var lessc
     */
    public $lessc;
    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $_app;

    /**
     * Create a new SmartLess instance.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    public function __construct($app){
        $this->_app  = $app;
        $this->lessc = new lessc;
    }

    public function clearCache(){
        if(Cache::has('smartless-cachekeys')){
            foreach(Cache::get('smartless-cachekeys') as $key){
                Cache::forget($key);
            }
            Cache::forget('smartless-cachekeys');
        }
    }

    public function compile($force_recompile = false){
        $cacheconf = 'smartless-config';
        $newConfig = Config::get('smartless4laravel::config');
        $files     = array();

        //Check if we have a cachekeys array
        $this->addToCache($cacheconf);

        // get cache if exists, else store config in cache for next time
        $config = Cache::rememberForever($cacheconf, function () use ($newConfig){
            return $newConfig;
        });

        // see if the config's are different, if they are set recompile to true
        if($config !== $newConfig){
            // cache this updated cache
            Cache::forever($cacheconf, $newConfig);
            // set the force recompile option to be true for this run
            $force_recompile = true;
            Log::info('smartless4laravel:: Config file has changed, Regenerating cache.');
        }

        if(! is_null($this->directories())){
            foreach($this->directories() as $file){
                $file['recompiled'] = $this->do_compile($file['less'], $file['css'], $force_recompile);
                $files[]            = $file;
            }
        }

        if(! is_null($this->files())){
            foreach($this->files() as $file){
                $file['recompiled'] = $this->do_compile($file['less'], $file['css'], $force_recompile);
                $files[]            = $file;
            }
        }

        if(! is_null($this->snippets())){
            $less = new lessc();
            foreach($this->snippets() as $snippet){
                File::put($snippet['css'], $less->parse($snippet['less']));
            }
        }

        return $files;
    }

    public function addToCache($key){
        if(! Cache::has('smartless-cachekeys')){
            Cache::forever('smartless-cachekeys', array($key));
        } else{
            Cache::forever('smartless-cachekeys', array_unique(
                array_merge(Cache::get('smartless-cachekeys'), array($key))
            ));
        }
    }

    public function snippets(){
        $files = array();

        $snippets = Config::get('smartless4laravel::snippets');
        if(is_null($snippets)){
            return;
        }

        foreach($snippets as $snippet => $css_file){
            $files[] = array(
                'less' => $snippet,
                'css'  => $css_file,
            );
        }

        return $files;
    }

    /**
     * Gets a list of all files to compile to css
     *
     * @return array
     */
    public function files(){
        $files = array();

        $paths = Config::get('smartless4laravel::files');
        if(is_null($paths)){
            return;
        }

        foreach($paths as $less_file => $css_file){
            $files[] = array(
                'less' => $less_file,
                'css'  => $css_file,
            );
        }

        return $files;
    }

    /**
     * Gets a list of of all directories to compile to css
     *
     * @return array
     */
    public function directories(){
        $files = array();

        $paths = Config::get('smartless4laravel::directories');
        if(is_null($paths)){
            return;
        }


        foreach($paths as $less_dir => $css_dir){
            $less_dir = rtrim($less_dir, '/') . '/';
            foreach(glob($less_dir . '*.[Ll][Ee][Ss][Ss]') as $less){
                $css     = rtrim($css_dir, '/') . '/' . basename($less, '.less') . '.css';
                $files[] = array(
                    'less' => $less,
                    'css'  => $css,
                );
            }
        }

        return $files;
    }

    protected function do_compile($input_file, $output_file, $force_recompile = false){

        $config = Config::get('smartless4laravel::config');
        // $cacheconf = 'less-config';
        $cachename = 'smartless-' . md5($output_file);
        $recompile = false;


        if(Cache::has($cachename)){
            $cache = Cache::get($cachename);
        } else{
            $cache = $input_file;
        }

        $less = new lessc;

        // set the formatter if available
        if(isset( $config['formatter'] )){
            $less->setFormatter($config['formatter']);
        }

        // set preserve flag if set
        if(isset( $config['preserveComments'] )){
            $less->setPreserveComments($config['preserveComments']);
        }

        // set variables if available
        if(isset( $config['variables'] )){
            $less->setVariables($config['variables']);
        }

        // set the recompile flag if available
        if(isset( $config['recompile'] )){
            $recompile = $config['recompile'];
        }

        // handle force recompile
        if($force_recompile){
            $recompile = true;
        }

        // actually compile the less
        if($recompile == true){
            $newCache = $less->cachedCompile($cache, true);
        } else{
            $newCache = $less->cachedCompile($cache);
        }

        // cache output and write file
        $recompiled = false;
        if(! is_array($cache) || $newCache["updated"] > $cache["updated"] || ! file_exists($output_file) ||
           $recompile
        ){
            $recompiled = true;
            Cache::forever($cachename, $newCache);
            $this->addToCache($cachename);
            File::put($output_file, $newCache['compiled']);
        }

        return $recompiled;
    }

}