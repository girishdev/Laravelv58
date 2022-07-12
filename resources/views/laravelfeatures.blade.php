@extends('layouts.app')

@section('title', "Laravel Features")

@section('content')
<h2>Laravel Features:</h2><hr>

<h5>This Application bult On Laravel 5.8:</h5><hr>
<ul>
    <li>Automatic Policy Discovery<br>
        - For Ex:-
    </li>
    <li>Update Your Cache TTL<br>
        - For Ex:-
    </li>
    <li>Use the New Postmark Driver in One Minute<br>
        - For Ex:-
    </li>
    <li>New Mockery Testing Helpers<br>
        - For Ex:-
    </li>
    <li>Automatic Event Listener Discovery<br>
        - For Ex:-
    </li>
    <li></li>
    <li>https://www.krishaweb.com/features-of-laravel-5-8-framework/</li>
    <li>Support of Carbon 2.0<br>
        - The latest version of Laravel supports Carbon 2.0 (Carbon Date Manipulation Library) making it easier for the professionals to work with date and time. Carbon 2.0 includes a new Date facade along with a CarbonImmutable class. The CarbonImmutable class enables a user to make the copy of an original datum and to modify the copy without changing the original datum. It is possible to use this feature via the AppServiceProvider. To create a copy of any date and to use the Date façade, a user needs to update the ‘\routes\web.php’ file.
    </li>
    <li>Hashed Tokens<br>
        - It is not always necessary to use the Laravel Passport for the Laravel API authentication. However, most users are unaware of this fact. A user-friendly ‘token guard’ provides the basic API authentication. This facility is available through the earlier versions of Laravel. However, Laravel 5.8 comes with an additional facility. This latest version supports the storing of tokens as SHA-256 hashes. This feature offers a higher level of security when storing the tokens.
    </li>

</ul>

<h5>Gather Main Main Concepts First / Possible Features Included Here:</h5><hr>

<a target="_blank" href="https://docs.google.com/spreadsheets/d/1ii5INIH9fMW8JTIWaGMjTqm1Y6ONkanC6Pka3vvq_Ww/edit?usp=sharing">LaravelFeaturesDiggingDeeper</a>

<ul>
    <li>Php Laravel Requirement <i class="bi bi-check2-all"></i>

    </li>
    <li>Route Model Binding <i class="bi bi-check2-all"></i><br>
        - Done On Laravel v5.8<br>
    </li>
    <li>Service Container<br>
        <b>- Binding</b><br>
            <b>Simple Bindings</b><br>
            use App\Services\Transistor;<br>
            use App\Services\PodcastParser;<br><br>

            $this->app->bind(Transistor::class, function ($app) {<br>
                return new Transistor($app->make(PodcastParser::class));<br>
            });<br><br>
            <b>Binding A Singleton</b><br>
            The singleton method binds a class or interface into the container that should only be resolved one time. Once a singleton binding is resolved, the same object instance will be returned on subsequent calls into the container:<br>
            For Example:-<br>
            use App\Services\Transistor;<br>
            use App\Services\PodcastParser;<br><br>

            $this->app->singleton(Transistor::class, function ($app) {<br>
                return new Transistor($app->make(PodcastParser::class));<br>
            });<br>
        - Resolving <br>
        - Method Invocation & Injection <br>
        - Container Events <br>
    </li>
    <li>Service Providers

    </li>
    <li>Facades

    </li>
    <hr>
    <!--<li></li>-->
    <li>Routing</li>
    <li>Middleware</li>
    <li>CSRF Protection</li>
    <li>Controllers</li>
    <li>Requests</li>
    <li>Responses</li>
    <li>Views</li>
    <li>Blade Templates</li>
    <li>Bundling Assets</li>
    <li>URL Generation</li>
    <li>Session</li>
    <li>Validation</li>
    <li>Error Handling</li>
    <li>Logging</li>
    <li></li>
    <li>Artisan Console</li>
    <li>Broadcasting</li>
    <li>Cache</li>
    <li>Collections</li>
    <li>Contracts</li>
    <li>Events</li>
    <li>File Storage</li>
    <li>Helpers</li>
    <li>HTTP Client</li>
    <li>Localization</li>
    <li>Mail</li>
    <li>Notifications</li>
    <li>Package Development</li>
    <li>Queues</li>
    <li>Rate Limiting</li>
    <li>Task Scheduling</li>
    <li></li>
    <li>Authentication</li>
    <li>Authorization</li>
    <li>Email Verification</li>
    <li>Encryption</li>
    <li>Hashing</li>
    <li>Password Reset</li>
    <li></li>
    <li>Query Builder</li>
    <li>Pagination</li>
    <li>Migrations</li>
    <li>Seeding</li>
    <li>Redis</li>
    <li></li>
    <li>Relationships</li>
    <li>Collections</li>
    <li>Mutators / Casts</li>
    <li>API Resources</li>
    <li>Serialization</li>
    <li></li>
    <li>HTTP Tests</li>
    <li>Console Tests</li>
    <li>Browser Tests</li>
    <li>Database</li>
    <li>Mocking</li>

</ul>

@endsection
