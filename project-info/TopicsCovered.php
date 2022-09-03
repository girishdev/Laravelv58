
Eloquent relationships (25%)
Routing (15%)

Events (10%)
Collection Helpers (10%)

Middlewares (5%)
Blade Templates (5%)

Architecture-5
	Request Lifecycle

	Service Container Binding and Resolution

	Service Providers

	Facades

	HTTP Verbs

Artisan Console-4: => Done
	Generating Commands

	Command I/O

	Registering Commands
		- All of your console commands are registered within your application's App\Console\Kernel class, which is your application's "console kernel". 
		- Within the commands method of this class, you will see a call to the kernel's load method. The load method will scan the app/Console/Commands directory and automatically register each command it contains with Artisan.

	Executing Commands
		use Illuminate\Support\Facades\Artisan;
		 
		Route::post('/user/{user}/mail', function ($user) {
		    $exitCode = Artisan::call('mail:send', [
		        'user' => $user, '--queue' => 'default'
		    ]);
		 
		    //
		});

Caching-5: => Done
	Drivers / Configuration

	Storing Items

	Retrieving Items

	Cache Tags

	Creating Custom Drivers

Collections-3: => Done
	Creating / Extending Collections

	Collection Methods

	Higher-order Messages

Controllers-7: => Done
	Defining Controllers

	Controller Namespacing

	Single Action Controllers

	Middleware

	Resource Controllers

	Dependency Injection

	Route Caching

Database-4
	Query Builder

	Pagination

	Migrations
		php artisan make:migration create_flights_table

	Seeding

Eloquent ORM-7
	Conventions

	Relationships

	Eloquent Collections

	Mutators / Accessors

	API Resources

	Serialization

	Scopes

Events-4: => Done
	Registering Events / Listeners
		php artisan event:generate

		php artisan make:event PodcastProcessed
		 
		php artisan make:listener SendPodcastNotification --event=PodcastProcessed

	Queued Listeners

	Dispatching Events

	Subscribing to Events

File Storage-3: => Done
	Configuration / Drivers
		- Laravel's filesystem configuration file is located at config/filesystems.php.
		- Within this file, you may configure all of your filesystem "disks". Each disk represents a particular storage driver and storage location. 
		- The local driver interacts with files stored locally on the server running the Laravel application while the s3 driver is used to write to Amazon's S3 cloud storage service.

		- To make these files accessible from the web, you should create a symbolic link from public/storage to storage/app/public.

		php artisan storage:link

	Storing / Retrieving Files
		$contents = Storage::get('file.jpg');

		if (Storage::disk('s3')->exists('file.jpg')) {
		    // ...
		}

		if (Storage::disk('s3')->missing('file.jpg')) {
		    // ...
		}

	Custom Filesystems
		- In order to define a custom filesystem you will need a Flysystem adapter. Let's add a community maintained Dropbox adapter to our project:

		composer require spatie/flysystem-dropbox

		- Next, you can register the driver within the boot method of one of your application's service providers. To accomplish this, you should use the extend method of the Storage facade:

Frontend-3: => Done
	Blade Templating

	Localization
	
	Asset Compilation

Helper Methods-5: => Done
	Arrays / Objects

	Paths

	Strings

	URLs

	Misc

Logging-3: => Done
	Configuration

	Writing to Specific Channels

	Creating Custom Channels

Mail-6: => Done
	Drivers / Configuration
		- Laravel provides a clean, simple email API powered by the popular Symfony Mailer component. 
		- Laravel and Symfony Mailer provide drivers for sending email via SMTP, Mailgun, Postmark, Amazon SES, and sendmail, allowing you to quickly get started sending mail through a local or cloud based service of your choice.

		- Laravel's email services may be configured via your application's config/mail.php configuration file.
		- 'driver' => env('MAIL_DRIVER', 'smtp'),
		- 'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
		- 'port' => env('MAIL_PORT', 2525),

	Generating Mailables
		- When building Laravel applications, each type of email sent by your application is represented as a "mailable" class.
		- These classes are stored in the app/Mail directory.
		- it will be generated for you when you create your first mailable class using the make:mail Artisan command:
		
		php artisan make:mail OrderShipped

	Writing Mail
		- Once you have generated a mailable class, open it up so we can explore its contents. 
		- First, note that all of a mailable class' configuration is done in the build method. 
		- Within this method, you may call various methods such as from, subject, view, and attach to configure the email's presentation and delivery.

		/**
		 * Build the message.
		 *
		 * @return $this
		 */
		public function build()
		{
		    return $this->from('example@example.com', 'Example')
		                ->view('emails.orders.shipped');
		}

		Configuring The View:
		/**
		 * Build the message.
		 *
		 * @return $this
		 */
		public function build()
		{
		    return $this->view('emails.orders.shipped');
		}

	Sending Mail

	Markdown
		php artisan make:mail OrderShipped --markdown=emails.orders.shipped

		Writing Markdown Messages:
			@component('mail::message')
			# Order Shipped
			 
			Your order has been shipped!
			 
			@component('mail::button', ['url' => $url])
			View Order
			@endcomponent
			 
			Thanks,<br>
			{{ config('app.name') }}
			@endcomponent

		Table Component:
			@component('mail::table')
			| Laravel       | Table         | Example  |
			| ------------- |:-------------:| --------:|
			| Col 2 is      | Centered      | $10      |
			| Col 3 is      | Right-Aligned | $20      |
			@endcomponent

	Local Development

Middleware-2: => Done
	Defining / Registering Middleware
		php artisan make:middleware EnsureTokenIsValid

		- This command will place a new EnsureTokenIsValid class within your app/Http/Middleware directory.

		- If you want a middleware to run during every HTTP request to your application, list the middleware class in the $middleware property of your app/Http/Kernel.php class.

		- If you would like to assign middleware to specific routes, you should first assign the middleware a key in your application's app/Http/Kernel.php file. By default, the $routeMiddleware property of this class contains entries for the middleware included with Laravel. 

		- In Route:
		Route::get('/profile', function () {
		    //
		})->middleware('auth');
		--------
		Route::get('/', function () {
		    //
		})->middleware(['first', 'second']);
		--------
		use App\Http\Middleware\EnsureTokenIsValid;
		 
		Route::get('/profile', function () {
		    //
		})->middleware(EnsureTokenIsValid::class);

		- Out of the box, Laravel comes with web and api middleware groups that contain common middleware you may want to apply to your web and API routes.

	Middleware Parameters
		- If your application needs to verify that the authenticated user has a given "role" before performing a given action, you could create an EnsureUserHasRole middleware that receives a role name as an additional argument.

		Route::put('/post/{id}', function ($id) {
		    //
		})->middleware('role:editor');

	Terminable Middleware: (Not In Topic)
		- Sometimes a middleware may need to do some work after the HTTP response has been sent to the browser. 
		- If you define a terminate method on your middleware and your web server is using FastCGI, the terminate method will automatically be called after the response is sent to the browser:

	    public function terminate($request, $response)
	    {
	        // ...
	    }

	    - Once you have defined a terminable middleware, you should add it to the list of routes or global middleware in the app/Http/Kernel.php file.

	    - When calling the terminate method on your middleware, Laravel will resolve a fresh instance of the middleware from the service container. If you would like to use the same middleware instance when the handle and terminate methods are called, register the middleware with the container using the container's singleton method. Typically this should be done in the register method of your AppServiceProvider:

		public function register()
		{
		    $this->app->singleton(TerminatingMiddleware::class);
		}

Notifications-9: => Done
	Creating Notifications
		- In addition to support for sending email, Laravel provides support for sending notifications across a variety of delivery channels, including email, SMS (via Vonage, formerly known as Nexmo), and Slack.

		php artisan make:notification InvoicePaid

		- This command will place a fresh notification class in your app/Notifications directory. 

		- Each notification class contains a via method and a variable number of message building methods, such as toMail or toDatabase, that convert the notification to a message tailored for that particular channel.

	Sending Notifications
		- Notifications may be sent in two ways: using the notify method of the Notifiable trait or using the Notification facade. The Notifiable trait is included on your application's App\Models\User model by default:

		class User extends Authenticatable
		{
		    use Notifiable;
		}

		Or

		use App\Notifications\InvoicePaid;
		 
		$user->notify(new InvoicePaid($invoice));

	Mail Notifications

	Markdown
		php artisan make:notification InvoicePaid --markdown=mail.invoice.paid

		<php
		@component('mail::message')
		# Invoice Paid
		 
		Your invoice has been paid!
		 
		@component('mail::button', ['url' => $url])
		View Invoice
		@endcomponent
		 
		Thanks,<br>
		{{ config('app.name') }}
		@endcomponent
		?>

	Database Notifications

	Broadcast Notifications

	SMS Notifications

	Slack Notifications

	Custom Channels
		- Laravel makes it simple. To get started, define a class that contains a send method. The method should receive two arguments: a $notifiable and a $notification.

		- Within the send method, you may call methods on the notification to retrieve a message object understood by your channel and then send the notification to the $notifiable instance however you wish:

PHP-3: => Done
	Version 7.1+

	Composer

	Autoloading Standards
		packagist.org
		https://www.youtube.com/watch?v=rqzYdHdyMH0

Package Development-6
	Discovery

	Service Providers

	Resources

	Commands

	Assets

	Publishing File Groups

Queues-5: => Done
	Drivers / Configurations
		- Laravel's queue configuration options are stored in your application's config/queue.php configuration file. 
		- In this file, you will find connection configurations for each of the queue drivers that are included with the framework, including the database, Amazon SQS, Redis, and Beanstalkd drivers, as well as a synchronous driver that will execute jobs immediately (for use during local development).

		Connections Vs. Queues:
			- In your config/queue.php configuration file, there is a connections configuration array.
			- This option defines the connections to backend queue services such as Amazon SQS, Beanstalk, or Redis. However, any given queue connection may have multiple "queues" which may be thought of as different stacks or piles of queued jobs.

			- each connection configuration example in the queue configuration file contains a queue attribute. This is the default queue that jobs will be dispatched to when they are sent to a given connection.

			php artisan queue:work --queue=high,default

	Creating / Dispatching Jobs
		- By default, all of the queueable jobs for your application are stored in the app/Jobs directory. If the app/Jobs directory doesn't exist, it will be created when you run the make:job Artisan command:

		php artisan make:job ProcessPodcast

		- Once you have written your job class, you may dispatch it using the dispatch method on the job itself. The arguments passed to the dispatch method will be given to the job's constructor:

	    public function store(Request $request)
	    {
	        $podcast = Podcast::create(/* ... */);
	 
	        // ...
	 
	        ProcessPodcast::dispatch($podcast);
	    }

		- If you would like to conditionally dispatch a job, you may use the dispatchIf and dispatchUnless methods:

		ProcessPodcast::dispatchIf($accountActive, $podcast);
		 
		ProcessPodcast::dispatchUnless($accountSuspended, $podcast);

        ProcessPodcast::dispatch($podcast)
                    ->delay(now()->addMinutes(10));

        Specifying Max Job Attempts / Timeout Values:
        	php artisan queue:work --tries=3

	Running Queue Workers
		- Laravel includes an Artisan command that will start a queue worker and process new jobs as they are pushed onto the queue.
		- You may run the worker using the queue:work Artisan command. Note that once the queue:work command has started, it will continue to run until it is manually stopped or you close your terminal:

		php artisan queue:work

		- To keep the queue:work process running permanently in the background, you should use a process monitor such as Supervisor to ensure that the queue worker does not stop running.

		- So, during your deployment process, be sure to restart your queue workers. In addition, remember that any static state created or modified by your application will not be automatically reset between jobs.

		- Alternatively, you may run the queue:listen command. When using the queue:listen command, you don't have to manually restart the worker when you want to reload your updated code or reset the application state; however, this command is significantly less efficient than the queue:work command:

		php artisan queue:listen

	Supervisor
		- Supervisor is a process monitor for the Linux operating system, and will automatically restart your queue:work processes if they fail. To install Supervisor on Ubuntu, you may use the following command:

		sudo apt-get install supervisor

		- Supervisor configuration files are typically stored in the /etc/supervisor/conf.d directory.

	Handling Failed Jobs
		- After an asynchronous job has exceeded this number of attempts, it will be inserted into the failed_jobs database table.

		- Synchronously dispatched jobs that fail are not stored in this table and their exceptions are immediately handled by the application.

		- A migration to create the failed_jobs table is typically already present in new Laravel applications. 

		- However, if your application does not contain a migration for this table, you may use the queue:failed-table command to create the migration:

		php artisan queue:failed-table
		 
		php artisan migrate

		php artisan queue:work redis --tries=3

		php artisan queue:work redis --tries=3 --backoff=3

		- Using the --backoff option, you may specify how many seconds Laravel should wait before retrying a job that has encountered an exception. By default, a job is immediately released back onto the queue so that it may be attempted again:

Routing-6: => Done
	Redirects
		php artisan route:list

		- By default, the route middleware that are assigned to each route will not be displayed in the route:list output; however, you can instruct Laravel to display the route middleware by adding the -v option to the command:

		php artisan route:list -v

	Route Parameters

	Named Routes

	Route Groups

	Route Model Binding

	Rate Limiting
		Route::middleware(['throttle:uploads'])->group(function () {
		    Route::post('/audio', function () {
		        //
		    });
		 
		    Route::post('/video', function () {
		        //
		    });
		});

Security-5: => Done
	Authentication

	Authorization
		php artisan make:policy PostPolicy

		php artisan make:policy PostPolicy --model=Post

	Encryption / Hashing

	CSRF Protection
		- Cross-site request forgeries are a type of malicious exploit whereby unauthorized commands are performed on behalf of an authenticated user.

	XSS Protection

Sessions-6: => Done
	Configuration
		php artisan session:table
		 
		php artisan migrate

	Storing Data
		// Via a request instance...
		$request->session()->put('key', 'value');
		 
		// Via the global "session" helper...
		session(['key' => 'value']);

	Retrieving Data
		$data = $request->session()->all(); // Retrieving All Session Data

		if ($request->session()->has('users')) {
		    //
		}

		if ($request->session()->exists('users')) {
		    //
		}

		if ($request->session()->missing('users')) {
		    //
		}
		
	Deleting Data
		// Forget a single key...
		$request->session()->forget('name');
		 
		// Forget multiple keys...
		$request->session()->forget(['name', 'status']);
		 
		$request->session()->flush();

	Flash Data
		$request->session()->flash('status', 'Task was successful!');

		$request->session()->reflash();
		 
		$request->session()->keep(['username', 'email']);

		$request->session()->now('status', 'Task was successful!');

	Custom Drivers

Task Scheduling-6: => Done
	Scheduling Artisan Commands

	Scheduling Queue Jobs
		use App\Jobs\Heartbeat;
		 
		$schedule->job(new Heartbeat)->everyFiveMinutes();

	Scheduling Shell Commands
		$schedule->exec('node /home/forge/script.js')->daily();

	Time Zones
		$schedule->command('report:generate')
		         ->timezone('America/New_York')
		         ->at('2:00')

	Preventing Task Overlaps

	Maintenance Mode
		- Your application's scheduled tasks will not run when the application is in maintenance mode, since we don't want your tasks to interfere with any unfinished maintenance you may be performing on your server. However, if you would like to force a task to run even in maintenance mode, you may call the evenInMaintenanceMode method when defining the task:

Testing-8
	Creating / Running Tests

	HTTP Tests

	Session / Authentication

	Testing File Uploads

	Available Assertions

	Browser Tests / Dusk

	Data Factories

	Fakes / Mocking

URL Generation-3: => Done
	Named Routes

	Controller Actions

	Default Values

Validation-5: => Done
	Form Requests

	Manually Creating Validators

	Error Messages

	Validation Rules

	Custom Validation Rules

Views-3: => Done
	Creating Views

	Passing Data to Views

	View Composer

Websockets-5
	Broadcasting Events

	Receiving Events

	Broadcasting Channels

	Presence Channels

	Client Events


https://www.toptal.com/php/php-7-performance-features
https://wpengine.com/resources/php7-features-performance/
https://belitsoft.com/php-development-services/php7-upgrading-from-php5-performance-security-reasons-and-case-studies

mysql query optimization techniques
https://www.cloudways.com/blog/mysql-performance-tuning/

https://www.koenig-solutions.com/laravel-php-framework-training-certification-course
https://www.qatouch.com/blog/how-to-prepare-for-the-laravel-certification/

https://laraveldaily.com/advanced-laravel-20-topics-and-links-to-learn-them/
https://github.com/LaravelDaily/Laravel-Roadmap-Learning-Path