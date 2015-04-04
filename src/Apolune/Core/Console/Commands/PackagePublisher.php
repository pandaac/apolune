<?php namespace Apolune\Core\Console\Commands;

use Exception;
use Apolune\Core\Providers\ServiceProvider;

use Illuminate\Console\Command;
use League\Flysystem\MountManager;
use Illuminate\Filesystem\Filesystem;
use League\Flysystem\Filesystem as Flysystem;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use League\Flysystem\Adapter\Local as LocalAdapter;

class PackagePublisher extends Command {

	/**
	 * The filesystem instance.
	 *
	 * @var \Illuminate\Filesystem\Filesystem
	 */
	protected $files;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'pandaac:publish';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Transfer the resources of a package to a theme.';

	/**
	 * Create a new command instance.
	 *
	 * @param  \Illuminate\Filesystem\Filesystem
	 * @return void
	 */
	public function __construct(Filesystem $files)
	{
		parent::__construct();

		$this->files = $files;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		list($views, $translations) = [ServiceProvider::getViews(), ServiceProvider::getTranslations()];

		try {

			if ($this->option('translations'))
			{
				$this->transferTranslations($translations);
			}
			else if ($this->option('views'))
			{
				$this->transferViews($views);
			}
			else
			{
				$this->transferTranslations($translations);
				$this->info('');
				$this->transferViews($views);
			}

		} catch (Exception $e) {

			return $this->error($e->getMessage());

		}
	}

	/**
	 * Publish translations.
	 *
	 * @param  array  $translations
	 * @return void
	 */
	protected function transferTranslations(array $translations)
	{
		list($packages, $themes) = [$this->getPackages($translations), $this->getThemes()];

		$this->info('Publishing translations...');

		foreach ($packages as $package => $from)
		{
			foreach ($themes as $theme)
			{
				if ($this->files->isDirectory($from))
				{
					$to = base_path("themes/${theme}/packages/${package}/lang");

					$this->publishDirectory($from, $to);
				}
			}
		}
	}

	/**
	 * Publish views.
	 *
	 * @param  array  $views
	 * @return void
	 */
	protected function transferViews(array $views)
	{
		list($packages, $themes) = [$this->getPackages($views), $this->getThemes()];

		$this->info('Publishing views...');
		
		foreach ($packages as $package => $from)
		{
			foreach ($themes as $theme)
			{
				if ($this->files->isDirectory($from))
				{
					$to = base_path("themes/${theme}/packages/${package}/views");

					$this->publishDirectory($from, $to);
				}
			}
		}
	}

	/**
	 * Get all of the targeted packages.
	 *
	 * @param  array  $packages
	 * @return array
	 */
	protected function getPackages(array $packages)
	{
		$package = $this->argument('package');

		if ($this->option('all'))
		{
			return $packages;
		}

		if ( ! $package)
		{
			throw new Exception("Missing package name.");
		}

		if ( ! isset($packages[$package]))
		{
			return [];
		}

		return [$package => $packages[$package]];
	}

	/**
	 * Get all of the targeted themes.
	 *
	 * @return array
	 */
	protected function getThemes()
	{
		$default = config('pandaac.theme', 'pandaac\Theme\ServiceProvider');

		return $this->option('theme') ?: [$default];
	}

	/**
	 * Publish the directory to the given directory.
	 *
	 * @param  string  $from
	 * @param  string  $to
	 * @return void
	 */
	protected function publishDirectory($from, $to)
	{
		$manager = new MountManager([
			'from' => new Flysystem(new LocalAdapter($from)),
			'to' => new Flysystem(new LocalAdapter($to)),
		]);

		foreach ($manager->listContents('from://', true) as $file)
		{
			if ($file['type'] === 'file' && ( ! $manager->has('to://'.$file['path']) || $this->option('force')))
			{
				$manager->put('to://'.$file['path'], $manager->read('from://'.$file['path']));
			}
		}

		$this->status($from, $to, 'Directory');
	}

	/**
	 * Write a status message to the console.
	 *
	 * @param  string  $from
	 * @param  string  $to
	 * @param  string  $type
	 * @return void
	 */
	protected function status($from, $to, $type)
	{
		$from = str_replace(base_path(), '', realpath($from));

		$to = str_replace(base_path(), '', realpath($to));

		$this->line('  <comment>['.$from.']</comment> <info>to</info> <comment>['.$to.']</comment>');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['package', InputArgument::OPTIONAL, 'The composer <vendor/package> name of a package.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['all', null, InputOption::VALUE_NONE, 'Transfer the resources from every pandaac specific package.'],
			['translations', null, InputOption::VALUE_NONE, 'Transfer only the translations.'],
			['views', null, InputOption::VALUE_NONE, 'Transfer only the views.'],
			['theme', null, InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY, 'Transfer the resources to a specific theme.'],
			['force', null, InputOption::VALUE_NONE, 'Force override existing resources.'],
		];
	}

}
