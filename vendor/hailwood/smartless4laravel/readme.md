# Smartless4laravel : Advanced LESS compiler for Laravel

Special thanks to [leafo](https://github.com/leafo) for [lessphp](https://github.com/leafo/lessphp) and also [rhukster](https://github.com/rhukster) for [LESSisMore](https://github.com/rhukster/Laravel-LESSisMore) upon which [smartless4laravel](https://bitbucket.org/hailwoodnz/smartless4laravel) is based.

`Smartless4laravel` is a composer package for the [Laravel PHP Framework](http://laravel.com/) that builds on `LESSisMore` by utilizing the latest version of and provides several new features such as smart compile only when LESS files (provided by `lessphp`) or config options have been modified, compressed output, injectable LESS variables + more...

### Key Features

* Utilizes lessphp's built-in smart compile option for automatically compiling LESS files when they are modified
* Ability to set formatter and produced compressed CSS output
* Option to retain CSS comments in compiled code
* Ability to set LESS variables from configuration for more dynamic generated CSS
* Will take into account nested and `@import`'ed LESS files and automatically recompile if any single file changes
* Will automatically recompile if you make a change to the configuration options
* Takes advantage of Larvel's built-in cache system
* Currently using **lessphp** version **>=0.3.8**

### Quick Start

1. Add the package to composer.json

        "hailwood/smartless4laravel": "*",

1. Add it to your application's `app.php` under the `providers` key

        'Hailwood\Smartless4laravel\Smartless4laravelServiceProvider'

1. Publish the config

        php artisan config:publish hailwood/smartless4laravel

# Configuration Options

All configuration arrays are optional although you must have one of the `directories`, `files` or `snippets` settings or nothing will be compiled.

### Directories

You can use the Directories setting to point to a LESS directory path.  LESSisMore will iterate over the LESS files found in the path and output them to the CSS path provided using the `basename` of each LESS file found. For example if you configured `application/config/less.php` :

    return array(
    	'directories' => array(
    		app('path') . '/less' =>  app('path.public') . '/css',
    	),
    );

Would result in all files matching `app/less/*.less` (case-insensitive, non-recursive) being compiled to CSS in the `public/css` directory. For example, the file `application/less/test.less` compiles to `public/css/test.css`.

If you want to specify single LESS files or want to specify the output filenames specifically, use the `files` option.

### Files

The `files` array is nearly identical to the `directories` array except that you specify individual input LESS files and names of the output compiled CSS files. In `application/config/less.php`:

    return array(
    	'files' => array(
    		'files' => array(
		        app('path') . '/less/custom.less'                   => app('path.public') . '/css/custom.css',
		        app('path') . '/less/bootstrap/bootstrap.less'      => app('path.public') . '/css/bootstrap.css',
		        app('path') . '/less/bootstrap/responsive.less'     => app('path.public') . '/css/bootstrap-responsive.css',
		    ),
    	),
    );

This will compile 3 less files to their respective output CSS files.  For example, the first entry takes `app/less/custom.less` and compiles it to `public/css/custom.css`.

**NOTE:** *This even works for complex LESS files such as bootstrap.less that contains many `@import` definitions to other LESS files.*

### Snippets

Snippets are a hold over from `LESSisMore` and provide the ability to put a chunk of LESS in the configuration and have it output to a CSS file. Once again, in `application/config/less.php`:

    return array(
    	'snippets' => array(
    		'#content { background: #f00; h1 { color: #0f0; } }' => app('path.public') . '/css/file.css',
    	),
    );

That should be pretty self-explanatory.

### Formatter

The `formatter` setting is completely optional, but it provides the ability to set the formatter used when compiling the LESS files.  The available options from lessphp are:

* `lessjs` (default) — Same style used in LESS for JavaScript
* `compressed` — Compresses all the unrequired whitespace
* `classic` — lessphp’s original formatter

### Preserve Comments

The `preserveComments` setting takes a `true` or a `false` values and just instructs the LESS compiler whether or not to retain any comments found in the LESS files. Pretty self explanatory.

### Variables

the `variables` setting is pretty handy and darn powerful.  It simply consists of an array of `key => value` pairs that are used by the compiler to replace `@keys` in the LESS files with the provided `value`.  For example, say you application had the ability to be branded based on a form that let you pick colors via a color chooser.  If those colors were then saved in the database you could dynamically inject those values into your LESS and in turn into your compiled CSS files with the following in your `application/config/less.php`:

	// Load the branding data from the database
	$branding = Branding::find(1);

	return array(
	    'files' => array(
	        app('path') . '/less/custom.less' => app('path.public') . '/css/custom.css',
	    ),
	    'variables' => array(
	    	'header-bg'    => $branding->header_bg,
	    	'header-text'  => $branding->header_text,
	        'body-bg'      => $branding->body_bg,
	        'body-text'    => $branding->body_text,
	    ),
	);

This would take the following from your `custom.less` file:

	.header {
		background: @header-bg;
		color: @header-text;
	}

	.body {
		background: @body-bg;
		color: @body-text;
	}

and generate the resulting CSS in your `custom.css` file:

	.header {
	  background: #333333;
	  color: #cccccc;
	}
	.body {
	  background: #fefefe;
	  color: #396e9c;
	}

Of course with `Smartless4laravel`'s smart compilation capability, the CSS files would only be re-compiled if you modified the variables in the **Branding** table.

### Force Recompile

If you have the need you can force compilation on every request by setting the `recompile` setting to `true`.  This is not really advised but the option is there if you need it.

# Artisan Commands

smartless4laravel is fully integrated with artisan,

### `php artisan smartless`

 Try it, trust me, you want to try it :D

 ### `php artisan smartless:compile`

 Compiles the LESS files,
 This command should be used to debug any issues compiling the LESS files.

 View the help for available flags.



# Technical Notes

The logic in `Smartless4laravel` utilizes the Laravel cache system to store a recent serialized copy of each of the compiled files and also the configuration data.  These files are used to determine if anything has changed between runs.  If for some reason your get into a state where you think the compiler should recompile and it does not, just delete or clear the Laravel cache, and it will be forced to re-run on the next page load. The entries are prefixed with `less-` as you can see in the example below:

	less-7b970ea0f54bf36d2258802e8e109ee5
	less-9d610ad27a4caf3a762c4dd7eae064a8
	less-config
	less-fef1984f647cea8443ef978b2e546375