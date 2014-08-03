<?php namespace Hailwood\Smartless4laravel\Console;

use Hailwood\Smartless4laravel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\HttpKernel\Debug\ErrorHandler;

class CompileCommand extends Command{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'smartless:compile';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Compiles the LESS files through PHPless';
    /**
     * Smartless instance.
     *
     * @var Smartless4laravel\SmartLess
     */
    protected $smartless;

    /**
     * Create a new smartless compile command instance.
     *
     * @param  Smartless4laravel\SmartLess  $smartless
     *
     * @return \Hailwood\Smartless4laravel\Console\CompileCommand
     */
    public function __construct(Smartless4laravel\SmartLess $smartless){
        parent::__construct();

        $this->smartless = $smartless;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire(){
        $force_recompile = false;

        $verbose = $this->input->getOption('verbose');
        $summary = $this->input->getOption('summary');

        $this->comment('Smartless compiler - PHPless runner');

        if($this->input->getOption('force')){
            $force_recompile = true;
            if(! $summary){
                $this->info('Forcing all LESS files to recompile');
            }
        } else{
            if(! $summary){
                $this->info('Recompiling will only occur if files have changed.');
            }
        }

        if(! $summary){
            $this->line('');
            $this->comment('Checking compile directives');
        }

        if(! is_null($this->smartless->files())){
            foreach($this->smartless->files() as $file){
                if(! $this->canWrite($file['css'])){
                    $this->filePermissionError($file['css']);
                }
            }
        }

        if(! $summary){
            $this->line('Files Directive: <info>Passed</info>');
        }

        if(! is_null($this->smartless->directories())){
            foreach($this->smartless->directories() as $file){
                if(! $this->canWrite($file['css'])){
                    $this->filePermissionError($file['css']);
                }
            }
        }

        if(! $summary){
            $this->line('Directories Directive: <info>Passed</info>');
        }

        if(! is_null($this->smartless->snippets())){
            foreach($this->smartless->snippets() as $file){
                if(! $this->canWrite($file['css'])){
                    $this->filePermissionError($file['css']);
                }
            }
        }

        if(! $summary){
            $this->line('Snippets Directive: <info>Passed</info>');
        }

        $this->line('');
        $this->comment('Compiling LESS files... (This may take a moment)');

        $files = $this->smartless->compile($force_recompile);

        $amount = 0;
        $of     = 0;

        foreach($files as $file){
            $of ++;
            if($file['recompiled']){
                $amount ++;

                if($verbose){
                    $this->line(
                        "<comment>Recompiled </comment>\t<info>" . realpath($file['less']) . "</info> => <info>" .
                        realpath($file['css']) .
                        "</info>.");
                } elseif(! $summary){
                    $this->line("<comment>Recompiled </comment>\t<info>" . realpath($file['less']) . "</info>.");
                }
            } elseif($verbose){
                $this->line(
                    "<comment>Not Modified</comment>\t<info>" . realpath($file['less']) . "</info> => <info>" .
                    realpath($file['css']) .
                    "</info>.");
            } elseif(! $summary){
                $this->line("<comment>Not Modified</comment>\t<info>" . realpath($file['less']) . "</info>.");
            }
        }

        $this->line('');
        $this->line('<info>' . $amount . '</info>/<info>' . $of . '</info> files required compiling/recompiling!');
        $this->line('');
        $this->comment("Done!");
    }

    /**
     * Checks if a file can be written to
     *
     * @param $file
     *
     * @return bool
     */
    public function canWrite($file){
        $canWrite = true;

        if(file_exists($file)){
            if(! is_writable($file)){
                $canWrite = false;
            }
        } else{
            if(! ( $handler = fopen($file, 'w') )){
                $canWrite = false;
            }
            fclose($handler);
        }

        return $canWrite;
    }

    /**
     * Shows the file permission error
     *
     * @param $css_path
     */
    public function filePermissionError($css_path){
        //remove the failed cache file to ensure recomiling next time
        $this->smartless->clearCache();

        $this->error("File Permission Error");
        $this->line("Could not write css to <info>" . realpath($css_path) . "</info>");
        $this->line("Ensure user <comment>" . get_current_user() .
                    "</comment> is in the web servers group (usually <comment>www-data</comment> for Apache)");
        $this->line("and add group write permissions to the directory - ");
        $this->line("<comment>sudo chmod g+w -R " . dirname(realpath($css_path)) . "</comment>");

        $this->error('Aborting...');
        exit;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments(){
        return array();

        /*return array(
            array('collection', InputArgument::OPTIONAL, 'The asset collection to compile'),
        );*/
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions(){
        return array(
            array('force', 'f', InputOption::VALUE_NONE, 'Forces a re-compile of all css files'),
            array('summary', 's', InputOption::VALUE_NONE, 'Shows only a summary output')
        );
    }

}