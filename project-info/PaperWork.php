Morning Practice On Board / Paper Work [SeventhWeekPlan.php] => 4-NewJobsByMay/PaperWork
    Artisan Console-4
		Introduction
			Tinker (REPL)

			php artisan list
			php artisan help migrate

			Laravel Sail:
				./vendor/bin/sail artisan list

			composer require laravel/tinker

			php artisan tinker

			php artisan vendor:publish --provider="Laravel\Tinker\TinkerServiceProvider"

		Writing Commands
			Generating Commands
				php artisan make:command SendEmails

			Command Structure
			    protected $signature = 'mail:send {user}';

		        protected $description = 'Send a marketing email to a user';

			    public function handle(DripEmailer $drip)
			    {
			        $drip->send(User::find($this->argument('user')));
			    }

			Closure Commands
				Artisan::command('mail:send {user}', function ($user) {
				    $this->info("Sending email to: {$user}!");
				});

		Defining Input Expectations
			Arguments
				protected $signature = 'mail:send {user}';

				// Optional argument...
				'mail:send {user?}'
				 
				// Optional argument with default value...
				'mail:send {user=foo}'

			Options
				protected $signature = 'mail:send {user} {--queue}';

				php artisan mail:send 1 --queue

				Options With Values:
					protected $signature = 'mail:send {user} {--queue=}';
					php artisan mail:send 1 --queue=default

				Option Shortcuts:
					'mail:send {user} {--Q|queue}'
					php artisan mail:send 1 -Q

			Input Arrays
				'mail:send {user*}'
				php artisan mail:send 1 2

				'mail:send {user?*}'

				Option Arrays:
					'mail:send {--id=*}'
					php artisan mail:send --id=1 --id=2

			Input Descriptions
				/**
				 * The name and signature of the console command.
				 *
				 * @var string
				 */
				protected $signature = 'mail:send
				                        {user : The ID of the user}
				                        {--queue : Whether the job should be queued}';

		Command I/O
			Retrieving Input

			Prompting For Input
				public function handle()
				{
				    $name = $this->ask('What is your name?');
				}

				$password = $this->secret('What is the password?');


				Asking For Confirmation:
					if ($this->confirm('Do you wish to continue?')) {
					    //
					}

					if ($this->confirm('Do you wish to continue?', true)) {
					    //
					}

				Auto-Completion:
					$name = $this->anticipate('What is your name?', ['Taylor', 'Dayle']);

					$name = $this->anticipate('What is your address?', function ($input) {
					    // Return auto-completion options...
					});

				Multiple Choice Questions:
					$name = $this->choice(
					    'What is your name?',
					    ['Taylor', 'Dayle'],
					    $defaultIndex
					);

			Writing Output
				public function handle()
				{
				    $this->info('The command was successful!');
				}

				$this->error('Something went wrong!');


				$this->line('Display this on the screen'); // line method to display plain, uncolored text:

				// newLine method to display a blank line:
				// Write a single blank line...
				$this->newLine();
				 
				// Write three blank lines...
				$this->newLine(3);

				Tables:
					use App\Models\User;
					 
					$this->table(
					    ['Name', 'Email'],
					    User::all(['name', 'email'])->toArray()
					);

				Progress Bars:
					use App\Models\User;
					 
					$users = $this->withProgressBar(User::all(), function ($user) {
					    $this->performTask($user);
					});

		Registering Commands
			- All of your console commands are registered within your application's App\Console\Kernel class, which is your application's "console kernel". 
			- Within the commands method of this class, you will see a call to the kernel's load method. 
			- The load method will scan the app/Console/Commands directory and automatically register each command it contains with Artisan.
			- You are even free to make additional calls to the load method to scan other directories for Artisan commands:

				/**
				 * Register the commands for the application.
				 *
				 * @return void
				 */
				protected function commands()
				{
				    $this->load(__DIR__.'/Commands');
				    $this->load(__DIR__.'/../Domain/Orders/Commands');
				 
				    // ...
				}

		Programmatically Executing Commands
			use Illuminate\Support\Facades\Artisan;
			 
			Route::post('/user/{user}/mail', function ($user) {
			    $exitCode = Artisan::call('mail:send', [
			        'user' => $user, '--queue' => 'default'
			    ]);
			 
			    //
			});

			Calling Commands From Other Commands
				- You may do so using the call method. This call method accepts the command name and an array of command arguments / options:

				public function handle()
				{
				    $this->call('mail:send', [
				        'user' => 1, '--queue' => 'default'
				    ]);
				 
				    //
				}

		Signal Handling

		Stub Customization

		Events

	Caching-5
		Introduction

		Configuration
			Driver Prerequisites
				Schema::create('cache', function ($table) {
				    $table->string('key')->unique();
				    $table->text('value');
				    $table->integer('expiration');
				});

				You may also use the php artisan cache:table Artisan command to generate a migration with the proper schema.

			Memcached:
				- Using the Memcached driver requires the Memcached PECL package to be installed.
				- You may list all of your Memcached servers in the config/cache.php configuration file.
				- This file already contains a memcached.servers entry to get you started:

			Redis:
				- Before using a Redis cache with Laravel, you will need to either install the PhpRedis PHP extension via PECL or install the predis/predis package (~1.0) via Composer.
				- Laravel Sail already includes this extension.
				- In addition, official Laravel deployment platforms such as Laravel Forge and Laravel Vapor have the PhpRedis extension installed by default.

		Cache Usage
			Obtaining A Cache Instance
				- To obtain a cache store instance, you may use the Cache facade, which is what we will use throughout this documentation.
				- In Controller:
				    public function index()
				    {
				        $value = Cache::get('key');
				 
				        //
				    }

				Accessing Multiple Cache Stores
					$value = Cache::store('file')->get('foo');
					 
					Cache::store('redis')->put('bar', 'baz', 600); // 10 Minutes

			Retrieving Items From The Cache
				- The Cache facade's get method is used to retrieve items from the cache. If the item does not exist in the cache, null will be returned.

				$value = Cache::get('key');
				 
				$value = Cache::get('key', 'default');

				- You may even pass a closure as the default value.
					$value = Cache::get('key', function () {
					    return DB::table(/* ... */)->get();
					});

				Checking For Item Existence
					if (Cache::has('key')) {
					    //
					}

				Incrementing / Decrementing Values:
					- The increment and decrement methods may be used to adjust the value of integer items in the cache.
					- Both of these methods accept an optional second argument indicating the amount by which to increment or decrement the item's value:

					Cache::increment('key');
					Cache::increment('key', $amount);
					Cache::decrement('key');
					Cache::decrement('key', $amount);

				Retrieve & Store:
					- Sometimes you may wish to retrieve an item from the cache, but also store a default value if the requested item doesn't exist.

					$value = Cache::remember('users', $seconds, function () {
					    return DB::table('users')->get();
					});

					- You may use the rememberForever method to retrieve an item from the cache or store it forever if it does not exist:

					$value = Cache::rememberForever('users', function () {
					    return DB::table('users')->get();
					});

				Retrieve & Delete:
					- If you need to retrieve an item from the cache and then delete the item, you may use the pull method.
					- Like the get method, null will be returned if the item does not exist in the cache:

					$value = Cache::pull('key');

			Storing Items In The Cache
				- You may use the put method on the Cache facade to store items in the cache:

				Cache::put('key', 'value', $seconds = 10);

				If the storage time is not passed to the put method, the item will be stored indefinitely:

				Cache::put('key', 'value');

				Instead of passing the number of seconds as an integer, you may also pass a DateTime instance representing the desired expiration time of the cached item:

				Cache::put('key', 'value', now()->addMinutes(10));

				Store If Not Present:
					- The add method will only add the item to the cache if it does not already exist in the cache store. 
					- The method will return true if the item is actually added to the cache.
					- Otherwise, the method will return false. The add method is an atomic operation:

					Cache::add('key', 'value', $seconds);

				Storing Items Forever:
					- The forever method may be used to store an item in the cache permanently. 
					- Since these items will not expire, they must be manually removed from the cache using the forget method:

					Cache::forever('key', 'value');

			Removing Items From The Cache
				Cache::forget('key');

				- You may also remove items by providing a zero or negative number of expiration seconds:

				Cache::put('key', 'value', 0);
				 
				Cache::put('key', 'value', -5);

				You may clear the entire cache using the flush method:

				Cache::flush();

				6PM - 2AM
					=> 6.30PM - 2.30AM
					=> 6.30PM - 2.30AM

			The Cache Helper
				- In addition to using the Cache facade, you may also use the global cache function to retrieve and store data via the cache. 
				- When the cache function is called with a single, string argument, it will return the value of the given key:

				$value = cache('key');

				If you provide an array of key / value pairs and an expiration time to the function, it will store values in the cache for the specified duration:

				cache(['key' => 'value'], $seconds);
				 
				cache(['key' => 'value'], now()->addMinutes(10));

		Cache Tags
			Storing Tagged Cache Items
				Cache::tags(['people', 'artists'])->put('John', $john, $seconds);
				 
				Cache::tags(['people', 'authors'])->put('Anne', $anne, $seconds);

			Accessing Tagged Cache Items
				$john = Cache::tags(['people', 'artists'])->get('John');
				 
				$anne = Cache::tags(['people', 'authors'])->get('Anne');

			Removing Tagged Cache Items
				=> In contrast, this statement would remove only cached values tagged with authors, so Anne would be removed, but not John:

				Cache::tags(['people', 'authors'])->flush();

		Atomic Locks
			Driver Prerequisites

			Managing Locks

			Managing Locks Across Processes

		Adding Custom Cache Drivers
			Writing The Driver

			Registering The Driver

		Events

	Collections-3
		Introduction
			- The Collection class allows you to chain its methods to perform fluent mapping and reducing of the underlying array. In general, collections are immutable, meaning every Collection method returns an entirely new Collection instance.

			Creating Collections
				$collection = collect([1, 2, 3]);

			Extending Collections
				- Collections are "macroable", which allows you to add additional methods to the Collection class at run time.

				use Illuminate\Support\Collection;
				use Illuminate\Support\Str;
				 
				Collection::macro('toUpper', function () {
				    return $this->map(function ($value) {
				        return Str::upper($value);
				    });
				});
				 
				$collection = collect(['first', 'second']);
				 
				$upper = $collection->toUpper();
				 
				// ['FIRST', 'SECOND']

		Available Methods: (Lot of method is Available)
			=> https://laravel.com/docs/9.x/collections#available-methods

		Higher Order Messages
			- Collections also provide support for "higher order messages", which are short-cuts for performing common actions on collections. The collection methods that provide higher order messages are: average, avg, contains, each, every, filter, first, flatMap, groupBy, keyBy, map, max, min, partition, reject, skipUntil, skipWhile, some, sortBy, sortByDesc, sum, takeUntil, takeWhile, and unique.

		Lazy Collections
			Introduction
				- However, the query builder's cursor method returns a LazyCollection instance. This allows you to still only run a single query against the database but also only keep one Eloquent model loaded in memory at a time. In this example, the filter callback is not executed until we actually iterate over each user individually, allowing for a drastic reduction in memory usage:

				use App\Models\User;
				 
				$users = User::cursor()->filter(function ($user) {
				    return $user->id > 500;
				});
				 
				foreach ($users as $user) {
				    echo $user->id;
				}

			Creating Lazy Collections
				use Illuminate\Support\LazyCollection;
				 
				LazyCollection::make(function () {
				    $handle = fopen('log.txt', 'r');
				 
				    while (($line = fgets($handle)) !== false) {
				        yield $line;
				    }
				});

			The Enumerable Contract
				=> https://laravel.com/docs/9.x/collections#the-enumerable-contract

			Lazy Collection Methods

	Controllers-7 [Already Few things Addede]
		Introduction

		Writing Controllers
			Basic Controllers
				- Controllers are not required to extend a base class. However, you will not have access to convenient features such as the middleware and authorize methods.

			Single Action Controllers
				- If a controller action is particularly complex, you might find it convenient to dedicate an entire controller class to that single action. To accomplish this, you may define a single __invoke method within the controller:

				php artisan make:controller ProvisionServer --invokable

		Controller Middleware
			Route::get('profile', [UserController::class, 'show'])->middleware('auth');

		Resource Controllers
			php artisan make:controller PhotoController --resource

			use App\Http\Controllers\PhotoController;

			Route::resource('photos', PhotoController::class);

			Actions Handled By Resource Controller
				Verb		URI						Action			Route Name
				GET			/photos					index			photos.index
				GET			/photos/create			create			photos.	create
				POST		/photos					store			photos.store
				GET			/photos/{photo}			show			photos.show
				GET			/photos/{photo}/edit	edit			photos.edit
				PUT/PATCH	/photos/{photo}			update			photos.update
				DELETE		/photos/{photo}			destroy			photos.destroy

				Specifying The Resource Model:
					php artisan make:controller PhotoController --model=Photo --resource

				Generating Form Requests:
					php artisan make:controller PhotoController --model=Photo --resource --requests

			Partial Resource Routes
				use App\Http\Controllers\PhotoController;
				 
				Route::resource('photos', PhotoController::class)->only([
				    'index', 'show'
				]);
				 
				Route::resource('photos', PhotoController::class)->except([
				    'create', 'store', 'update', 'destroy'
				]);


				API Resource Routes:
					use App\Http\Controllers\PhotoController;
					 
					Route::apiResource('photos', PhotoController::class);

					php artisan make:controller PhotoController --api

			Nested Resources
				use App\Http\Controllers\PhotoCommentController;
				 
				Route::resource('photos.comments', PhotoCommentController::class);

				/photos/{photo}/comments/{comment}

			Naming Resource Routes
				use App\Http\Controllers\PhotoController;
				 
				Route::resource('photos', PhotoController::class)->names([
				    'create' => 'photos.build'
				]);

			Naming Resource Route Parameters
				use App\Http\Controllers\AdminUserController;
				 
				Route::resource('users', AdminUserController::class)->parameters([
				    'users' => 'admin_user'
				]);

			Scoping Resource Routes

			Localizing Resource URIs

			Supplementing Resource Controllers
				use App\Http\Controller\PhotoController;
				 
				Route::get('/photos/popular', [PhotoController::class, 'popular']);
				Route::resource('photos', PhotoController::class);

		Dependency Injection & Controllers
			- Constructor Injection

				use App\Repositories\UserRepository;

			    public function __construct(UserRepository $users)
			    {
			        $this->users = $users;
			    }

		   	- Method Injection

		   		use Illuminate\Http\Request;

			    public function store(Request $request)
			    {
			        $name = $request->name;
			    }

				use App\Http\Controllers\UserController;
				 
				Route::put('/user/{id}', [UserController::class, 'update']);

			    public function update(Request $request, $id)
			    {
			        //
			    }

	Database-4 (Database: Query Builder)
		Getting Started
			Introduction
				MariaDB 10.3+ (Version Policy)
				MySQL 5.7+ (Version Policy)
				PostgreSQL 10.0+ (Version Policy)
				SQLite 3.8.8+
				SQL Server 2017+ (Version Policy)

				Configuration
					- The configuration for Laravel's database services is located in your application's config/database.php configuration file.

				Read & Write Connections
					- Sometimes you may wish to use one database connection for SELECT statements, and another for INSERT, UPDATE, and DELETE statements.

			Running SQL Queries
				$users = DB::select('select * from users');

				Using Multiple Database Connections

				Listening For Query Events

				Monitoring Cumulative Query Time

			Database Transactions
				use Illuminate\Support\Facades\DB;
				 
				DB::transaction(function () {
				    DB::update('update users set votes = 1');
				 
				    DB::delete('delete from posts');
				});

				Manually Using Transactions:
					use Illuminate\Support\Facades\DB;
					 
					DB::beginTransaction();

					- You can rollback the transaction via the rollBack method:

					DB::rollBack();

					- Lastly, you can commit a transaction via the commit method:

					DB::commit();

			Connecting To The Database CLI
				php artisan db

				php artisan db mysql

			Inspecting Your Databases

			Monitoring Your Databases

		Database: Query Builder
			Introduction

			Running Database Queries
		        $users = DB::table('users')->get();
                return view('user.index', ['users' => $users]);

                $user = DB::table('users')->where('name', 'John')->first();

                - If you don't need an entire row, you may extract a single value from a record using the value method.
	                $email = DB::table('users')->where('name', 'John')->value('email');

	            $user = DB::table('users')->find(3);

	            $titles = DB::table('users')->pluck('title', 'name');

				Chunking Results
					use Illuminate\Support\Facades\DB;
					 
					DB::table('users')->orderBy('id')->chunk(100, function ($users) {
					    foreach ($users as $user) {
					        //
					    }
					});

				Streaming Results Lazily

				Aggregates
					- The query builder also provides a variety of methods for retrieving aggregate values like count, max, min, avg, and sum.

					use Illuminate\Support\Facades\DB;
					 
					$users = DB::table('users')->count();
					 
					$price = DB::table('orders')->max('price');

					Determining If Records Exist:
						if (DB::table('orders')->where('finalized', 1)->exists()) {
						    // ...
						}
						 
						if (DB::table('orders')->where('finalized', 1)->doesntExist()) {
						    // ...
						}

			Select Statements
				use Illuminate\Support\Facades\DB;
				 
				$users = DB::table('users')
				            ->select('name', 'email as user_email')
				            ->get();

				The distinct method allows you to force the query to return distinct results:
					- $users = DB::table('users')->distinct()->get();


				- If you already have a query builder instance and you wish to add a column to its existing select clause, you may use the addSelect method:
					$query = DB::table('users')->select('name');
				 
					$users = $query->addSelect('age')->get();

			Raw Expressions: (https://laravel.com/docs/9.x/queries#raw-methods)
				selectRaw
				whereRaw / orWhereRaw
				havingRaw / orHavingRaw
				orderByRaw
				groupByRaw

			Joins
				use Illuminate\Support\Facades\DB;
				 
				$users = DB::table('users')
				            ->join('contacts', 'users.id', '=', 'contacts.user_id')
				            ->join('orders', 'users.id', '=', 'orders.user_id')
				            ->select('users.*', 'contacts.phone', 'orders.price')
				            ->get();

				Left Join / Right Join Clause
					$users = DB::table('users')
					            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
					            ->get();
					 
					$users = DB::table('users')
					            ->rightJoin('posts', 'users.id', '=', 'posts.user_id')
					            ->get();

				Cross Join Clause:
					$sizes = DB::table('sizes')
					            ->crossJoin('colors')
					            ->get();

				Advanced Join Clauses
					DB::table('users')
					        ->join('contacts', function ($join) {
					            $join->on('users.id', '=', 'contacts.user_id')->orOn(/* ... */);
					        })
					        ->get();

				Subquery Joins:
					$latestPosts = DB::table('posts')
					                   ->select('user_id', DB::raw('MAX(created_at) as last_post_created_at'))
					                   ->where('is_published', true)
					                   ->groupBy('user_id');
					 
					$users = DB::table('users')
					        ->joinSub($latestPosts, 'latest_posts', function ($join) {
					            $join->on('users.id', '=', 'latest_posts.user_id');
					        })->get();

			Unions
				use Illuminate\Support\Facades\DB;
				 
				$first = DB::table('users')
				            ->whereNull('first_name');
				 
				$users = DB::table('users')
				            ->whereNull('last_name')
				            ->union($first)
				            ->get();

			Basic Where Clauses
				Where Clauses
					$users = DB::table('users')
					                ->where('votes', '=', 100)
					                ->where('age', '>', 35)
					                ->get();

					$users = DB::table('users')->where('votes', 100)->get();

					$users = DB::table('users')
					                ->where('votes', '>=', 100)
					                ->get();
					 
					$users = DB::table('users')
					                ->where('votes', '<>', 100)
					                ->get();
					 
					$users = DB::table('users')
					                ->where('name', 'like', 'T%')
					                ->get();

					$users = DB::table('users')->where([
					    ['status', '=', '1'],
					    ['subscribed', '<>', '1'],
					])->get();

				Or Where Clauses
					$users = DB::table('users')
					                    ->where('votes', '>', 100)
					                    ->orWhere('name', 'John')
					                    ->get();

					$users = DB::table('users')
					            ->where('votes', '>', 100)
					            ->orWhere(function($query) {
					                $query->where('name', 'Abigail')
					                      ->where('votes', '>', 50);
					            })
					            ->get();

					select * from users where votes > 100 or (name = 'Abigail' and votes > 50)

				Where Not Clauses

				JSON Where Clauses

				Additional Where Clauses

				Logical Grouping

			Advanced Where Clauses
				Where Exists Clauses

				Subquery Where Clauses

				Full Text Where Clauses
					- Full text where clauses are currently supported by MySQL and PostgreSQL.

			Ordering, Grouping, Limit & Offset
				Ordering

				Grouping

				Limit & Offset

			Conditional Clauses

			Insert Statements
				Auto-Incrementing IDs:
					- If the table has an auto-incrementing id, use the insertGetId method to insert a record and then retrieve the ID:

					$id = DB::table('users')->insertGetId(
					    ['email' => 'john@example.com', 'votes' => 0]
					);

				Upserts

			Update Statements
				$affected = DB::table('users')
				              ->where('id', 1)
				              ->update(['votes' => 1]);

				Update Or Insert:
					DB::table('users')
					    ->updateOrInsert(
					        ['email' => 'john@example.com', 'name' => 'John'],
					        ['votes' => '2']
					    );

				Updating JSON Columns


				Increment & Decrement

			Delete Statements
				$deleted = DB::table('users')->delete();
				 
				$deleted = DB::table('users')->where('votes', '>', 100)->delete();

				DB::table('users')->truncate();

			Pessimistic Locking
				- The query builder also includes a few functions to help you achieve "pessimistic locking" when executing your select statements. To execute a statement with a "shared lock", you may call the sharedLock method. A shared lock prevents the selected rows from being modified until your transaction is committed:

				DB::table('users')
				        ->where('votes', '>', 100)
				        ->sharedLock()
				        ->get();

				- Alternatively, you may use the lockForUpdate method. A "for update" lock prevents the selected records from being modified or from being selected with another shared lock:

				DB::table('users')
				        ->where('votes', '>', 100)
				        ->lockForUpdate()
				        ->get();

			Debugging
				- You may use the dd and dump methods while building a query to dump the current query bindings and SQL. The dd method will display the debug information and then stop executing the request. The dump method will display the debug information but allow the request to continue executing:

				DB::table('users')->where('votes', '>', 100)->dd();
 
				DB::table('users')->where('votes', '>', 100)->dump();

		Pagination
			Introduction

			Basic Usage
				Paginating Query Builder Results
					'users' => DB::table('users')->paginate(15)
					- The paginate method counts the total number of records matched by the query before retrieving the records from the database.

					- If you only need to display simple "Next" and "Previous" links in your application's UI, you may use the simplePaginate method to perform a single, efficient query:

					$users = DB::table('users')->simplePaginate(15);

				Paginating Eloquent Results
					- Similarly, you may use the cursorPaginate method to cursor paginate Eloquent models:
					$users = User::where('votes', '>', 100)->cursorPaginate(15);

				Cursor Pagination
					# Offset Pagination...
					select * from users order by id asc limit 15 offset 15;
					 
					# Cursor Pagination...
					select * from users where id > 15 order by id asc limit 15;

				Manually Creating A Paginator

				Customizing Pagination URLs
					- By default, links generated by the paginator will match the current request's URI. However, the paginator's withPath method allows you to customize the URI used by the paginator when generating links. 

					use App\Models\User;
					 
					Route::get('/users', function () {
					    $users = User::paginate(15);
					 
					    $users->withPath('/admin/users');
					 
					    //
					});

			Displaying Pagination Results
				Adjusting The Pagination Link Window
					<div class="container">
					    @foreach ($users as $user)
					        {{ $user->name }}
					    @endforeach
					</div>
					 
					{{ $users->links() }}

					{{ $users->onEachSide(5)->links() }}

				Converting Results To JSON

			Customizing The Pagination View
				Using Bootstrap

			Paginator and LengthAwarePaginator Instance Methods
				$paginator->count()	
				$paginator->currentPage()	

			Cursor Paginator Instance Methods

		Migrations
			Introduction

			Generating Migrations
				php artisan make:migration create_flights_table

				Squashing Migrations
					php artisan schema:dump
					 
					# Dump the current database schema and prune all existing migrations...
					php artisan schema:dump --prune

			Migration Structure

			Running Migrations
				php artisan migrate

				php artisan migrate:status

				php artisan migrate --pretend

				- To force the commands to run without a prompt, use the --force flag:
				php artisan migrate --force

			Rolling Back Migrations
				- To roll back the latest migration operation, you may use the rollback Artisan command. This command rolls back the last "batch" of migrations, which may include multiple migration files:

				php artisan migrate:rollback

				- You may roll back a limited number of migrations by providing the step option to the rollback command. 

				php artisan migrate:rollback --step=5

				The migrate:reset command will roll back all of your application's migrations:
					php artisan migrate:reset

				Roll Back & Migrate Using A Single Command
					php artisan migrate:refresh
					 
					# Refresh the database and run all database seeds...
					php artisan migrate:refresh --seed

					php artisan migrate:refresh --step=5

				Drop All Tables & Migrate:
					php artisan migrate:fresh
					 
					php artisan migrate:fresh --seed

			Tables
				Creating Tables

				Updating Tables

				Renaming / Dropping Tables
					use Illuminate\Support\Facades\Schema;
					 
					Schema::rename($from, $to);

					Schema::drop('users');
					 
					Schema::dropIfExists('users');

			Columns
				Creating Columns
				
				Available Column Types
				
				Column Modifiers
				
				Modifying Columns
				
				Dropping Columns

			Indexes
				Creating Indexes

				Renaming Indexes

				Dropping Indexes

				Foreign Key Constraints

			Events

		Seeding
			Introduction

			Writing Seeders
				Using Model Factories
					- To generate a seeder, execute the make:seeder Artisan command. All seeders generated by the framework will be placed in the database/seeders directory:

					php artisan make:seeder UserSeeder

				Calling Additional Seeders

				Muting Model Events

			Running Seeders
				php artisan db:seed
				 
				php artisan db:seed --class=UserSeeder

				php artisan migrate:fresh --seed

				php artisan db:seed --force

		Redis
			Introduction
				composer require predis/predis

			Configuration
				Clusters

				Predis

				phpredis

			Interacting With Redis
				Transactions

				Pipelining Commands

			Pub / Sub

	Eloquent ORM-7
		Getting Started
			Introduction

			Generating Model Classes
				php artisan make:model Flight
				
				php artisan make:model Flight --migration

				# Generate a model and a FlightFactory class...
				php artisan make:model Flight --factory
				php artisan make:model Flight -f
				 
				# Generate a model and a FlightSeeder class...
				php artisan make:model Flight --seed
				php artisan make:model Flight -s
				 
				# Generate a model and a FlightController class...
				php artisan make:model Flight --controller
				php artisan make:model Flight -c
				 
				# Generate a model, FlightController resource class, and form request classes...
				php artisan make:model Flight --controller --resource --requests
				php artisan make:model Flight -crR
				 
				# Generate a model and a FlightPolicy class...
				php artisan make:model Flight --policy
				 
				# Generate a model and a migration, factory, seeder, and controller...
				php artisan make:model Flight -mfsc
				 
				# Shortcut to generate a model, migration, factory, seeder, policy, controller, and form requests...
				php artisan make:model Flight --all
				 
				# Generate a pivot model...
				php artisan make:model Member --pivot

				php artisan model:show Flight

			Eloquent Model Conventions
				Table Names

				Primary Keys

				Timestamps

				Database Connections

				Default Attribute Values

			Retrieving Models
				Collections

				Chunking Results

				Chunk Using Lazy Collections

				Cursors

				Advanced Subqueries

			Retrieving Single Models / Aggregates
				- Sometimes you may wish to throw an exception if a model is not found. This is particularly useful in routes or controllers. The findOrFail and firstOrFail methods will retrieve the first result of the query; however, if no result is found, an Illuminate\Database\Eloquent\ModelNotFoundException will be thrown:

					$flight = Flight::findOrFail(1);
	 
					$flight = Flight::where('legs', '>', 3)->firstOrFail();

				If the ModelNotFoundException is not caught, a 404 HTTP response is automatically sent back to the client:

					use App\Models\Flight;
					 
					Route::get('/api/flights/{id}', function ($id) {
					    return Flight::findOrFail($id);
					});

				Retrieving Or Creating Models

				Retrieving Aggregates
					$count = Flight::where('active', 1)->count();
					 
					$max = Flight::where('active', 1)->max('price');

			Inserting & Updating Models
				Inserts
			        $flight = new Flight;
			 
			        $flight->name = $request->name;
			 
			        $flight->save();

				Updates
					$flight = Flight::find(1);
					 
					$flight->name = 'Paris to London';
					 
					$flight->save();

				Mass Assignment

				Upserts

			Deleting Models
				Soft Deleting

				Querying Soft Deleted Models

			Pruning Models

			Replicating Models

			Query Scopes
				Global Scopes
					- Global scopes allow you to add constraints to all queries for a given model.

				Local Scopes
					- Local scopes allow you to define common sets of query constraints that you may easily re-use throughout your application.

			Comparing Models

			Events
				Using Closures

				Observers

				Muting Events

		Relationships
			Introduction

			Defining Relationships
				One To One
					- For example, a User model might be associated with one Phone model. To define this relationship, we will place a phone method on the User model. The phone method should call the hasOne method and return its result. The hasOne method is available to your model via the model's Illuminate\Database\Eloquent\Model base class:

					class User extends Model
					{
					    /**
					     * Get the phone associated with the user.
					     */
					    public function phone()
					    {
					        return $this->hasOne(Phone::class);
					    }
					}

					$phone = User::find(1)->phone;

					return $this->hasOne(Phone::class, 'foreign_key');
					return $this->hasOne(Phone::class, 'foreign_key', 'local_key');

					Defining The Inverse Of The Relationship:
						class Phone extends Model
						{
						    /**
						     * Get the user that owns the phone.
						     */
						    public function user()
						    {
						        return $this->belongsTo(User::class);
						    }
						}

				One To Many
					- or example, a blog post may have an infinite number of comments. Like all other Eloquent relationships, one-to-many relationships are defined by defining a method on your Eloquent model:

					class Post extends Model
					{
					    /**
					     * Get the comments for the blog post.
					     */
					    public function comments()
					    {
					        return $this->hasMany(Comment::class);
					    }
					}

					$comments = Post::find(1)->comments;

				One To Many (Inverse) / Belongs To
					class Comment extends Model
					{
					    /**
					     * Get the post that owns the comment.
					     */
					    public function post()
					    {
					        return $this->belongsTo(Post::class);
					    }
					}
					 
					$comment = Comment::find(1);
					 
					return $comment->post->title;

					Default Models:
					public function user()
					{
					    return $this->belongsTo(User::class)->withDefault([
					        'name' => 'Guest Author',
					    ]);
					}

				Has One Of Many
					- Sometimes a model may have many related models, yet you want to easily retrieve the "latest" or "oldest" related model of the relationship. 
					- For example, a User model may be related to many Order models, but you want to define a convenient way to interact with the most recent order the user has placed. 
					- You may accomplish this using the hasOne relationship type combined with the ofMany methods:

					/**
					 * Get the user's most recent order.
					 */
					public function latestOrder()
					{
					    return $this->hasOne(Order::class)->latestOfMany();
					}

					- Likewise, you may define a method to retrieve the "oldest", or first, related model of a relationship:

					/**
					 * Get the user's oldest order.
					 */
					public function oldestOrder()
					{
					    return $this->hasOne(Order::class)->oldestOfMany();
					}

				Has One Through

				Has Many Through

			Many To Many Relationships
				Retrieving Intermediate Table Columns
					- For example, let's assume our User model has many Role models that it is related to. After accessing this relationship, we may access the intermediate table using the pivot attribute on the models:

				Filtering Queries Via Intermediate Table Columns

				Defining Custom Intermediate Table Models

			Polymorphic Relationships
				One To One
					- A one-to-one polymorphic relation is similar to a typical one-to-one relation; however, the child model can belong to more than one type of model using a single association.

					- For example, a blog Post and a User may share a polymorphic relation to an Image model.

					- Using a one-to-one polymorphic relation allows you to have a single table of unique images that may be associated with posts and users.

				One To Many

				One Of Many

				Many To Many

				Custom Polymorphic Types

			Dynamic Relationships

			Querying Relations
				Relationship Methods Vs. Dynamic Properties

				Querying Relationship Existence

				Querying Relationship Absence

				Querying Morph To Relationships

			Aggregating Related Models
				Counting Related Models

				Other Aggregate Functions

				Counting Related Models On Morph To Relationships

			Eager Loading
				- When accessing Eloquent relationships as properties, the related models are "lazy loaded".

				- This means the relationship data is not actually loaded until you first access the property.

				- However, Eloquent can "eager load" relationships at the time you query the parent model.

				- Eager loading alleviates the "N + 1" query problem. To illustrate the N + 1 query problem, consider a Book model that "belongs to" to an Author model:

				=> When accessing Eloquent relationships as properties, the related models are "lazy loaded".
				=> However, Eloquent can "eager load" relationships at the time you query the parent model. Eager loading alleviates the "N + 1" query problem. 

				For Example:-
					class Book extends Model
					{
					    /**
					     * Get the author that wrote the book.
					     */
					    public function author()
					    {
					        return $this->belongsTo(Author::class);
					    }
					}
					----------
					$books = Book::all();
					 
					foreach ($books as $book) {
					    echo $book->author->name;
					}
					------------------------------------------
					Eager Loading:
					$books = Book::with('author')->get();
					 
					foreach ($books as $book) {
					    echo $book->author->name;
					}
					----------
					select * from books
					 
					select * from authors where id in (1, 2, 3, 4, 5, ...)

				Constraining Eager Loads

				Lazy Eager Loading
					- Sometimes you may need to eager load a relationship after the parent model has already been retrieved.

					$books = Book::all();
					 
					if ($someCondition) {
					    $books->load('author', 'publisher');
					}

				Preventing Lazy Loading

			Inserting & Updating Related Models
				The save Method

				The create Method

				Belongs To Relationships

				Many To Many Relationships

			Touching Parent Timestamps

		Collections
			Introduction

			Available Methods
	
			Custom Collections

		Mutators / Casts
			Introduction

			Accessors & Mutators
				Defining An Accessor

				Defining A Mutator

			Attribute Casting
				Array & JSON Casting

				Date Casting

				Enum Casting

				Encrypted Casting

				Query Time Casting

			Custom Casts
				Value Object Casting

				Array / JSON Serialization

				Inbound Casting

				Cast Parameters

				Castables

		API Resources
			Introduction

			Generating Resources

			Concept Overview
				Resource Collections

			Writing Resources
				Data Wrapping

				Pagination

				Conditional Attributes

				Conditional Relationships

				Adding Meta Data

			Resource Responses

		Serialization
			Introduction

			Serializing Models & Collections
				Serializing To Arrays
					$user = User::with('roles')->first();
					 
					return $user->toArray();

				Serializing To JSON
					$user = User::find(1);
					 
					return $user->toJson();
					 
					return $user->toJson(JSON_PRETTY_PRINT);

					- Alternatively, you may cast a model or collection to a string, which will automatically call the toJson method on the model or collection:

					return (string) User::find(1);

			Hiding Attributes From JSON

			    protected $hidden = ['password'];

			    protected $visible = ['first_name', 'last_name'];

			Appending Values To JSON

			Date Serialization
				protected $casts = [
				    'birthday' => 'date:Y-m-d',
				    'joined_at' => 'datetime:Y-m-d H:00',
				];

		Factories
			Introduction

			Defining Model Factories
				Generating Factories

				Factory States

				Factory Callbacks

			Creating Models Using Factories
				Instantiating Models

				Persisting Models

				Sequences

			Factory Relationships
				Has Many Relationships

				Belongs To Relationships

				Many To Many Relationships

				Polymorphic Relationships

				Defining Relationships Within Factories

	Events-4
		Introduction

		Registering Events & Listeners
			- App\Providers\EventServiceProvider 
			- The listen property contains an array of all events (keys) and their listeners (values). You may add as many events to this array as your application requires. For example, let's add an OrderShipped event:

			protected $listen = [
			    OrderShipped::class => [
			        SendShipmentNotification::class,
			    ],
			];

			Generating Events & Listeners
				- php artisan event:generate

				- php artisan make:event PodcastProcessed
				 
				- php artisan make:listener SendPodcastNotification --event=PodcastProcessed

			Manually Registering Events
			
			Event Discovery

		Defining Events

		Defining Listeners

		Queued Event Listeners
			Manually Interacting With The Queue
			
			Queued Event Listeners & Database Transactions
			
			Handling Failed Jobs

		Dispatching Events

		Event Subscribers
			Writing Event Subscribers

			Registering Event Subscribers

	------------------------------------------------------------------
	File Storage-3
		Introduction

		Configuration
			The Local Driver
				use Illuminate\Support\Facades\Storage;
				 
				Storage::disk('local')->put('example.txt', 'Contents');

			The Public Disk
				php artisan storage:link

			Driver Prerequisites
				composer require league/flysystem-aws-s3-v3 "^3.0"

				composer require league/flysystem-ftp "^3.0"

				composer require league/flysystem-sftp-v3 "^3.0"

			Amazon S3 Compatible Filesystems

		Obtaining Disk Instances
			On-Demand Disks
				use Illuminate\Support\Facades\Storage;
				 
				$disk = Storage::build([
				    'driver' => 'local',
				    'root' => '/path/to/root',
				]);
				 
				$disk->put('image.jpg', $content);

		Retrieving Files
			- $contents = Storage::get('file.jpg');

			if (Storage::disk('s3')->exists('file.jpg')) {
			    // ...
			}

			if (Storage::disk('s3')->missing('file.jpg')) {
			    // ...
			}

			Downloading Files

			File URLs

			File Metadata

		Storing Files
			Prepending & Appending To Files
				Storage::prepend('file.log', 'Prepended Text');
				 
				Storage::append('file.log', 'Appended Text');

			Copying & Moving Files
				Storage::copy('old/file.jpg', 'new/file.jpg');
				 
				Storage::move('old/file.jpg', 'new/file.jpg');

			Automatic Streaming

			File Uploads

			File Visibility
				use Illuminate\Support\Facades\Storage;
				 
				Storage::put('file.jpg', $contents, 'public');

		Deleting Files
			use Illuminate\Support\Facades\Storage;
			 
			Storage::delete('file.jpg');
			 
			Storage::delete(['file.jpg', 'file2.jpg']);
			---------------------------------
			use Illuminate\Support\Facades\Storage;
			 
			Storage::disk('s3')->delete('path/file.jpg');

		Directories

		Custom Filesystems

	Frontend-3 (Blade Templates)
		Introduction

		Displaying Data
			- Blade's {{ }} echo statements are automatically sent through PHP's htmlspecialchars function to prevent XSS attacks.

			HTML Entity Encoding
				Hello, {!! $name !!}.

			Blade & JavaScript Frameworks
				<h1>Laravel</h1>
				 
				Hello, @{{ name }}.

				- In this example, the @ symbol will be removed by Blade; however, {{ name }} expression will remain untouched by the Blade engine, allowing it to be rendered by your JavaScript framework.

				- The @ symbol may also be used to escape Blade directives:
					{{-- Blade template --}}
					@@if()
					 
					<!-- HTML output -->
					@if()

				<script>
				    var app = <?php echo json_encode($array); ?>;
				</script>

				<script>
				    var app = {{ Js::from($array) }};
				</script>

		Blade Directives
			If Statements

			Switch Statements

			Loops

			The Loop Variable

			Conditional Classes

			Additional Attributes

			Including Subviews

			The @once Directive

			Raw PHP

			Comments

		Components
			Rendering Components

			Passing Data To Components

			Component Attributes

			Reserved Keywords

			Slots

			Inline Component Views

			Dynamic Components

			Manually Registering Components

		Anonymous Components
			Anonymous Index Components

			Data Properties / Attributes

			Accessing Parent Data

			Anonymous Components Namespaces

		Building Layouts
			Layouts Using Components

			Layouts Using Template Inheritance

		Forms
			CSRF Field

			Method Field

			Validation Errors

		Stacks

		Service Injection

		Rendering Inline Blade Templates

		Extending Blade
			Custom Echo Handlers

			Custom If Statements

	Helper Methods-5
		Introduction

		Available Methods
			Arr::add(), Arr::collapse(), Arr::dot(), Arr::first(), Arr::exists()
			Arr::get(), Arr::pluck(), Arr::join(), Arr::sort(), Arr::query()

	Logging-3 / Error Handling
		Logging
			Introduction

			Configuration
				Available Channel Drivers

				Channel Prerequisites

				Logging Deprecation Warnings

			Building Log Stacks

			Writing Log Messages
				use Illuminate\Support\Facades\Log;
				 
				Log::emergency($message);
				Log::alert($message);
				Log::critical($message);
				Log::error($message);
				Log::warning($message);
				Log::notice($message);
				Log::info($message);
				Log::debug($message);

				Contextual Information

				Writing To Specific Channels
					use Illuminate\Support\Facades\Log;
					 
					Log::channel('slack')->info('Something happened!');

					Or

					Log::stack(['single', 'slack'])->info('Something happened!');

			Monolog Channel Customization
				Customizing Monolog For Channels

				Creating Monolog Handler Channels

				Creating Custom Channels Via Factories

		Error Handling:
			Introduction

			Configuration

			The Exception Handler
				Reporting Exceptions

				Exception Log Levels

				Ignoring Exceptions By Type

				Rendering Exceptions

				Reportable & Renderable Exceptions

			HTTP Exceptions
				Custom HTTP Error Pages

	Mail-6
		Introduction
			Configuration

			Driver Prerequisites

			Failover Configuration

		Generating Mailables

		Writing Mailables
			Configuring The Sender

			Configuring The View

			View Data

			Attachments

			Inline Attachments

			Attachable Objects

			Tags & Metadata

			Customizing The Symfony Message

		Markdown Mailables
			Generating Markdown Mailables
			
			Writing Markdown Messages
			
			Customizing The Components

		Sending Mail
			Queueing Mail

		Rendering Mailables
			Previewing Mailables In The Browser

		Localizing Mailables

		Testing Mailables

		Mail & Local Development

		Events

		Custom Transports
			Additional Symfony Transports

	Middleware-2

	Notifications-9

	Queues-5

	------------------------------------------------------------------
	Routing-6

	Security-5

	Sessions-6

	Task Scheduling-6

	Testing-8

	URL Generation-3

	Validation-5

	Views-3 [Already Few things Addede]

	------------------------------------------------------------------
	Websockets-5

	------------------------------------------------------------------

We need to answer 45 questions in 50 minutes. All questions will be to pick the right option. 

We can also skip the questions. Further, which you can answer at any time during the exam. 

Make a note that the marks get deducted for every wrong answer.

We will get a certification in PDF format. Our name gets added to the online list of developers; 
you can verify it using the Laravel certification link (Directory of Certified Laravel Developers). 

Exams can be failed as a result of an insufficient score. Scores are calculated by measuring the amount of correct answers against the amount of incorrect answers. Skipped answers are ignored by the scoring algorithm. Should a candidate fail as a result of an insufficient score they will not receive feedback on the score received or which questions were incorrect. This is part of an industry-standard policy for maintaing the integrity of the exam.

Ask About The Company:
	1. I will be a permanent employee right?

	2. What kind of Development they are doing
		(What kind of project are you working for?)
	   	Product Based Company
	   	Service Based Company

	3. Are you going to work on Laravel Project Specific

	4. What are the Responsibilities I need to take care

	5. Working days, Working hr
	
	6. Located on(Which place)

	7. What kind of company:
		MNC
		How many employees are working in your company
		Or
		Is it Start-up
		How many employees are working on it

	8. When the company is Established

	9. My Expectation is 20L (After Certification)

	10. What are employee benefits
		If it is WFH will they go to Provide Internet Charges and a Power Bill?

	11. In General we can ask background of the company








