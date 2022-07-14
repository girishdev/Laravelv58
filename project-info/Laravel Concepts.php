Laravel Concepts:

Architecture Concepts
    Php Laravel Requirement
    Service Container
        Binding
            Binding Basics
                Almost all of your service container bindings will be registered within service providers, so most of these examples will demonstrate using the container in that context.

        Within a service provider, you always have access to the container via the $this->app property. We can register a binding using the bind method, passing the class or interface name that we wish to register along with a closure that returns an instance of the class:


                use App\Services\Transistor;
                use App\Services\PodcastParser;

                $this->app->bind(Transistor::class, function ($app) {
                    return new Transistor($app->make(PodcastParser::class));
                });

            Binding Interfaces To Implementations

            Contextual Binding

            Binding Primitives

            Binding Typed Variadics

            Tagging

            Extending Bindings

        Resolving
            The Make Method

            Automatic Injection

        Method Invocation & Injection

        Container Events
        https://www.youtube.com/watch?v=yg1qOom6YuE
        https://www.youtube.com/watch?v=9SabaNdsB9Q
        https://www.youtube.com/watch?v=PGVqkEZiUoc
    Service Providers
        Writing Service Providers
            The Register Method

            The Boot Method

        Registering Providers

        Deferred Providers
        https://www.youtube.com/watch?v=1AxQNDOJTBw
    Facades
        When To Use Facades
            Facades Vs. Dependency Injection

            Facades Vs. Helper Functions

        How Facades Work

        Real-Time Facades

        Facade Class Reference

    The Basics (Add Prefex to this like: Laravelv5.8)
        Routing
            ---------
            Basic Routing (Laravelv5.8)
                --------- Basic Routing ---------
                use Illuminate\Support\Facades\Route;

                Route::get('/greeting', function () {
                    return 'Hello World';
                });
                --------- The Default Route Files ---------
                use App\Http\Controllers\UserController;

                Route::get('/user', [UserController::class, 'index']);
                --------- Available Router Methods -----------
                Route::get($uri, $callback);
                Route::post($uri, $callback);
                Route::put($uri, $callback);
                Route::patch($uri, $callback);
                Route::delete($uri, $callback);
                Route::options($uri, $callback);
                -----------
                Sometimes you may need to register a route that responds to multiple HTTP verbs. You may do so using the match method. Or, you may even register a route that responds to all HTTP verbs using the any method:

                Route::match(['get', 'post'], '/', function () {
                    //
                });

                Route::any('/', function () {
                    //
                });
                --------- Dependency Injection -----------
                You may type-hint any dependencies required by your route in your route's callback signature. The declared dependencies will automatically be resolved and injected into the callback by the Laravel service container.

                use Illuminate\Http\Request;

                Route::get('/users', function (Request $request) {
                    // ...
                });
                --------- CSRF Protection -----------
                Remember, any HTML forms pointing to POST, PUT, PATCH, or DELETE routes that are defined in the web routes file should include a CSRF token field. Otherwise, the request will be rejected. You can read more about CSRF protection in the CSRF documentation:
                <form method="POST" action="/profile">
                    @csrf
                    ...
                </form>

                Redirect Routes
                    If you are defining a route that redirects to another URI, you may use the Route::redirect method. This method provides a convenient shortcut so that you do not have to define a full route or controller for performing a simple redirect:

                    Route::redirect('/here', '/there');

                    By default, Route::redirect returns a 302 status code. You may customize the status code using the optional third parameter:

                    Route::redirect('/here', '/there', 301);

                    Or, you may use the Route::permanentRedirect method to return a 301 status code:

                    Route::permanentRedirect('/here', '/there');

                View Routes
                    If your route only needs to return a view, you may use the Route::view method. Like the redirect method
                    ou may provide an array of data to pass to the view as an optional third argument

                    Route::view('/welcome', 'welcome');

                    Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

                The Route List
                    The route:list Artisan command can easily provide an overview of all of the routes that are defined by your application:
                        php artisan route:list

                    By default, the route middleware that are assigned to each route will not be displayed in the route:list output; however, you can instruct Laravel to display the route middleware by adding the -v option to the command:
                        php artisan route:list -v

                    In addition, you may instruct Laravel to hide any routes that are defined by third-party packages by providing the --except-vendor option when executing the route:list command:
                        php artisan route:list --except-vendor

                    Likewise, you may also instruct Laravel to only show routes that are defined by third-party packages by providing the --only-vendor option when executing the route:list command:
                        php artisan route:list --only-vendor

            Route Parameters (Laravelv7)
                Required Parameters
                    Sometimes you will need to capture segments of the URI within your route. For example, you may need to capture a user's ID from the URL. You may do so by defining route parameters:

                    Route::get('/user/{id}', function ($id) {
                        return 'User '.$id;
                    });

                    You may define as many route parameters as required by your route:

                    Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
                        //
                    });

                    Route parameters are always encased within {} braces and should consist of alphabetic characters. Underscores (_) are also acceptable within route parameter names. Route parameters are injected into route callbacks / controllers based on their order - the names of the route callback / controller arguments do not matter.

                    --------- Parameters & Dependency Injection -----------
                    If your route has dependencies that you would like the Laravel service container to automatically inject into your route's callback, you should list your route parameters after your dependencies:

                    use Illuminate\Http\Request;

                    Route::get('/user/{id}', function (Request $request, $id) {
                        return 'User '.$id;
                    });

                Optional Parameters
                    Route::get('/user/{name?}', function ($name = null) {
                        return $name;
                    });

                    Route::get('/user/{name?}', function ($name = 'John') {
                        return $name;
                    });

                Regular Expression Constraints
                    Route::get('/user/{name}', function ($name) {
                        //
                    })->where('name', '[A-Za-z]+');

                    Route::get('/user/{id}', function ($id) {
                        //
                    })->where('id', '[0-9]+');

                    Route::get('/user/{id}/{name}', function ($id, $name) {
                        //
                    })->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

                    Note: For convenience, some commonly used regular expression patterns have helper methods that allow you to quickly add pattern constraints to your routes:

                    Route::get('/user/{id}/{name}', function ($id, $name) {
                        //
                    })->whereNumber('id')->whereAlpha('name');

                    Route::get('/user/{name}', function ($name) {
                        //
                    })->whereAlphaNumeric('name');

                    Route::get('/user/{id}', function ($id) {
                        //
                    })->whereUuid('id');

                    Route::get('/category/{category}', function ($category) {
                        //
                    })->whereIn('category', ['movie', 'song', 'painting']);

            Named Routes
                Route::get('/user/profile', function () {
                    //
                })->name('profile');

                Note: Route names should always be unique.

                --------- Generating URLs To Named Routes ---------
                // Generating URLs...
                $url = route('profile');

                // Generating Redirects...
                return redirect()->route('profile');

                If the named route defines parameters, you may pass the parameters as the second argument to the route function. The given parameters will automatically be inserted into the generated URL in their correct positions:

                Route::get('/user/{id}/profile', function ($id) {
                    //
                })->name('profile');

                $url = route('profile', ['id' => 1]);

                If you pass additional parameters in the array, those key / value pairs will automatically be added to the generated URL's query string:

                Route::get('/user/{id}/profile', function ($id) {
                    //
                })->name('profile');

                $url = route('profile', ['id' => 1, 'photos' => 'yes']);

                // /user/1/profile?photos=yes

            Route Groups
                Middleware
                    Route::middleware(['first', 'second'])->group(function () {
                        Route::get('/', function () {
                            // Uses first & second middleware...
                        });

                        Route::get('/user/profile', function () {
                            // Uses first & second middleware...
                        });
                    });

                Controllers
                    use App\Http\Controllers\OrderController;

                    Route::controller(OrderController::class)->group(function () {
                        Route::get('/orders/{id}', 'show');
                        Route::post('/orders', 'store');
                    });

                Subdomain Routing
                    Route::domain('{account}.example.com')->group(function () {
                        Route::get('user/{id}', function ($account, $id) {
                            //
                        });
                    });

                Route Prefixes
                    Route::prefix('admin')->group(function () {
                        Route::get('/users', function () {
                            // Matches The "/admin/users" URL
                        });
                    });

                Route Name Prefixes
                    Route::name('admin.')->group(function () {
                        Route::get('/users', function () {
                            // Route assigned name "admin.users"...
                        })->name('users');
                    });

            Route Model Binding
                Implicit Binding
                    use App\Models\User;

                    Route::get('/users/{user}', function (User $user) {
                        return $user->email;
                    });

                    --------- Soft Deleted Models ---------
                    Typically, implicit model binding will not retrieve models that have been soft deleted. However, you may instruct the implicit binding to retrieve these models by chaining the withTrashed method onto your route's definition:

                    use App\Models\User;

                    Route::get('/users/{user}', function (User $user) {
                        return $user->email;
                    })->withTrashed();

                    --------- Custom Keys & Scoping ---------
                    use App\Models\Post;
                    use App\Models\User;

                    Route::get('/users/{user}/posts/{post:slug}', function (User $user, Post $post) {
                        return $post;
                    });

                Implicit Enum Binding

                Explicit Binding
                    use App\Models\User;
                    use Illuminate\Support\Facades\Route;

                    /**
                     * Define your route model bindings, pattern filters, etc.
                     *
                     * @return void
                     */
                    public function boot()
                    {
                        Route::model('user', User::class);

                        // ...

                        Or

                        Route::bind('user', function ($value) {
                            return User::where('name', $value)->firstOrFail();
                        });

                    }

            Fallback Routes
                Using the Route::fallback method, you may define a route that will be executed when no other route matches the incoming request. Typically, unhandled requests will automatically render a "404" page via your application's exception handler. However, since you would typically define the fallback route within your routes/web.php file, all middleware in the web middleware group will apply to the route. You are free to add additional middleware to this route as needed:

                Route::fallback(function () {
                    //
                });

                The fallback route should always be the last route registered by your application.

            Rate Limiting
                Defining Rate Limiters
                    The rate limiter name may be any string you wish:

                    use Illuminate\Cache\RateLimiting\Limit;
                    use Illuminate\Http\Request;
                    use Illuminate\Support\Facades\RateLimiter;

                    /**
                     * Configure the rate limiters for the application.
                     *
                     * @return void
                     */
                    protected function configureRateLimiting()
                    {
                        RateLimiter::for('global', function (Request $request) {
                            return Limit::perMinute(1000);
                        });
                    }

                    RateLimiter::for('uploads', function (Request $request) {
                        return $request->user()->vipCustomer()
                                    ? Limit::none()
                                    : Limit::perMinute(100);
                    });

                Attaching Rate Limiters To Routes
                    Route::middleware(['throttle:uploads'])->group(function () {
                        Route::post('/audio', function () {
                            //
                        });

                        Route::post('/video', function () {
                            //
                        });
                    });

            Form Method Spoofing
                <form action="/example" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>

                <form action="/example" method="POST">
                    @method('PUT')
                    @csrf
                </form>

            Accessing The Current Route
                use Illuminate\Support\Facades\Route;

                $route = Route::current(); // Illuminate\Routing\Route
                $name = Route::currentRouteName(); // string
                $action = Route::currentRouteAction(); // string

            Cross-Origin Resource Sharing (CORS)

            Route Caching
                When deploying your application to production, you should take advantage of Laravel's route cache. Using the route cache will drastically decrease the amount of time it takes to register all of your application's routes. To generate a route cache, execute the route:cache Artisan command:

                php artisan route:cache

                After running this command, your cached routes file will be loaded on every request. Remember, if you add any new routes you will need to generate a fresh route cache. Because of this, you should only run the route:cache command during your project's deployment.

                You may use the route:clear command to clear the route cache:

                php artisan route:clear

        Middleware
            Example Middleware:
                Authenticate.php
                VerifyCsrfToken.php
                TrimStrings.php
                and etc...

            Defining Middleware
                To Create Middleware:
                php artisan make:middleware CheckAge

            Registering Middleware
                Global Middleware
                    If you want a middleware to run during every HTTP request to your application, list the middleware class in the $middleware property of your app/Http/Kernel.php class.
                Assigning Middleware To Routes
                    If you would like to assign middleware to specific routes, you should first assign the middleware a key in your app/Http/Kernel.php file. By default, the $routeMiddleware property of this class contains entries for the middleware included with Laravel. To add your own, append it to this list and assign it a key of your choosing:

                    Route::get('admin/profile', function () {
                        //
                    })->middleware('auth');

                    Route::get('/', function () {
                        //
                    })->middleware('first', 'second');

                    => When assigning middleware, you may also pass the fully qualified class name:
                    use App\Http\Middleware\CheckAge;

                    Route::get('admin/profile', function () {
                        //
                    })->middleware(CheckAge::class);

                Middleware Groups

                Sorting Middleware

            Middleware Parameters

            Terminable Middleware

        CSRF Protection
            Preventing CSRF Requests
                Excluding URIs

            X-CSRF-Token

            X-XSRF-Token

        Controllers
            Writing Controllers
                Basic Controllers

                Single Action Controllers

            Controller Middleware

            Resource Controllers
                Partial Resource Routes

                Nested Resources

                Naming Resource Routes

                Naming Resource Route Parameters

                Scoping Resource Routes

                Localizing Resource URIs

                Supplementing Resource Controllers

            Dependency Injection & Controllers

        Requests
            Interacting With The Request
                Accessing The Request

                Request Path, Host, & Method

                Request Headers

                Request IP Address

                Content Negotiation

                PSR-7 Requests

            Input
                Retrieving Input

                Determining If Input Is Present

                Merging Additional Input

                Old Input

                Cookies

                Input Trimming & Normalization

            Files
                Retrieving Uploaded Files

                Storing Uploaded Files

            Configuring Trusted Proxies

            Configuring Trusted Hosts

        Responses
            Creating Responses
                Attaching Headers To Responses

                Attaching Cookies To Responses

                Cookies & Encryption

            Redirects
                Redirecting To Named Routes

                Redirecting To Controller Actions

                Redirecting To External Domains

                Redirecting With Flashed Session Data

            Other Response Types
                View Responses

                JSON Responses

                File Downloads

                File Responses

            Response Macros

        Views
            Creating & Rendering Views
                Nested View Directories

                Creating The First Available View

                Determining If A View Exists

            Passing Data To Views
                Sharing Data With All Views

            View Composers
                View Creators

            Optimizing Views

        Blade Templates
            Displaying Data
                HTML Entity Encoding

                Blade & JavaScript Frameworks

            Blade Directives
                If Statements

                Switch Statements

                Loops

                The Loop Variable

                Conditional Classes

                Checked / Selected / Disabled

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

        Bundling Assets
            All About React and Vue Js and Assets

        URL Generation
            The Basics
                Generating URLs

                Accessing The Current URL

            URLs For Named Routes
                Signed URLs

            URLs For Controller Actions

            Default Values

        Session
            Interacting With The Session
                Retrieving Data

                Storing Data

                Flash Data

                Deleting Data

                Regenerating The Session ID

            Session Blocking

            Adding Custom Session Drivers
                Implementing The Driver

                Registering The Driver

        Validation
            Validation Quickstart
                Defining The Routes

                Creating The Controller

                Writing The Validation Logic

                Displaying The Validation Errors

                Repopulating Forms

                A Note On Optional Fields

                Validation Error Response Format

            Form Request Validation
                Creating Form Requests

                Authorizing Form Requests

                Customizing The Error Messages

                Preparing Input For Validation

            Manually Creating Validators
                Automatic Redirection

                Named Error Bags

                Customizing The Error Messages

                After Validation Hook

            Working With Validated Input

            Working With Error Messages
                Specifying Custom Messages In Language Files

                Specifying Attributes In Language Files

                Specifying Values In Language Files

            Available Validation Rules

            Conditionally Adding Rules

            Validating Arrays
                Validating Nested Array Input

                Error Message Indexes & Positions

            Validating Passwords

            Custom Validation Rules
                Using Rule Objects

                Using Closures

                Implicit Rules

        Errors & Logging
            All About Error and Logging we need to lookup

Digging Deeper
    Artisan Console
    Broadcasting
    Cache
    Collections
    Contracts
    Events
    File Storage
    Helpers
    HTTP Client
    Localization
    Mail:
        Introduction
            => Laravel and Symfony Mailer provide drivers for sending email via SMTP, Mailgun, Postmark, Amazon SES, and sendmail, allowing you to quickly get started sending mail through a local or cloud based service of your choice.

            Configuration
            => config/mail.php

            Driver Prerequisites

            Failover Configuration

        Generating Mailables
            => php artisan make:mail OrderShipped

        Writing Mailables
            Configuring The Sender
            Configuring The View
            View Data
            =>  <div>
                    Price: {{ $order->price }}
                </div>
            Attachments
            Inline Attachments
            Attachable Objects
            Tags & Metadata
            Customizing The Symfony Message
        Markdown Mailables
            Generating Markdown Mailables
            => php artisan make:mail OrderShipped --markdown=emails.orders.shipped
            Writing Markdown Messages
            Customizing The Components
            => php artisan vendor:publish --tag=laravel-mail
        Sending Mail
            Queueing Mail
            => Mail::to($request->user())
                ->cc($moreUsers)
                ->bcc($evenMoreUsers)
                ->queue(new OrderShipped($order));
            ---------- Delayed Message Queueing ----------
            => Mail::to($request->user())
                ->cc($moreUsers)
                ->bcc($evenMoreUsers)
                ->later(now()->addMinutes(10), new OrderShipped($order));
        Rendering Mailables
            Previewing Mailables In The Browser
        Localizing Mailables
        Testing Mailables
        Mail & Local Development
        Events
        Custom Transports
        Additional Symfony Transports
    Notifications
    Package Development
    Queues
        Introduction
            => Queues allow you to defer the processing of a time consuming task, such as sending an email, until a later time.
            Connections Vs. Queues

            Driver Notes & Prerequisites
                php artisan queue:table

                php artisan migrate
        Creating Jobs
            Generating Job Classes
                php artisan make:job ProcessPodcast

            Class Structure
        Dispatching Jobs
            Delayed Dispatching
            Synchronous Dispatching
            Job Chaining
            Customizing The Queue & Connection
            Specifying Max Job Attempts / Timeout Values
                => php artisan queue:work --tries=3
            Rate Limiting
            Error Handling
        Queueing Closures
        Running The Queue Worker
            Queue Priorities
            Queue Workers & Deployment
            Job Expirations & Timeouts
        Supervisor Configuration
        Dealing With Failed Jobs
            Cleaning Up After Failed Jobs
            Failed Job Events
            Retrying Failed Jobs
            Ignoring Missing Models
        Job Events
    Rate Limiting
    Task Scheduling

Security
    Authentication
    Authorization
    Email Verification
    Encryption
    Hashing
    Password Reset

Database
    Query Builder
    Pagination
    Migrations
    Seeding
    Redis

Eloquent ORM
    Relationships
    Collections
    Mutators / Casts
    API Resources
    Serialization

Testing
    HTTP Tests
    Console Tests
    Browser Tests
    Database
    Mocking
