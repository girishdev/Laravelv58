Laravel Telescope:

Introduction
	=> Telescope provides insight into the requests coming into your application, exceptions, log entries, database queries, queued jobs, mail, notifications, cache operations, scheduled tasks, variable dumps and more.

Installation
	- composer require laravel/telescope "2.1.7"
	- php artisan telescope:install
	- php artisan migrate

	Updating Telescope
		When updating Telescope, you should re-publish Telescope's assets:
		- php artisan telescope:publish

	Installing Only In Specific Environments
		If you plan to only use Telescope to assist your local development, you may install Telescope using the --dev flag:
		- composer require laravel/telescope "2.1.7" --dev

	Migration Customization
		If you are not going to use Telescope's default migrations, you should call the Telescope::ignoreMigrations method in the register method of your AppServiceProvider. You may export the default migrations using the php artisan vendor:publish --tag=telescope-migrations command.

	Configuration
		After publishing Telescope's assets, its primary configuration file will be located at config/telescope.php. This configuration file allows you to configure your watcher options and each configuration option includes a description of its purpose, so be sure to thoroughly explore this file.
	
		If desired, you may disable Telescope's data collection entirely using the enabled configuration option:

		'enabled' => env('TELESCOPE_ENABLED', true),		

	Data Pruning
		Without pruning, the telescope_entries table can accumulate records very quickly. To mitigate this, you should schedule the telescope:prune Artisan command to run daily:

		$schedule->command('telescope:prune')->daily();

		By default, all entries older than 24 hours will be pruned. You may use the hours option when calling the command to determine how long to retain Telescope data. For example, the following command will delete all records created over 48 hours ago:

		$schedule->command('telescope:prune --hours=48')->daily();

	Migration Customization

Dashboard Authorization

Filtering
	Entries

	Batches

Tagging

Available Watchers
	Cache Watcher

	Command Watcher

	Dump Watcher

	Event Watcher

	Exception Watcher

	Gate Watcher

	Job Watcher

	Log Watcher

	Mail Watcher

	Model Watcher

	Notification Watcher

	Query Watcher

	Redis Watcher

	Request Watcher

	Schedule Watcher

