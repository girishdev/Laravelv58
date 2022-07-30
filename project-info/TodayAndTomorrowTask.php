Today and Tomorrow Task:

1. Review All Laravel Advance Concepts
    ///Service Container: [Architecture] => Notes Added
        Links:
            https://www.youtube.com/watch?v=PGVqkEZiUoc
            https://www.youtube.com/watch?v=_z9nzEUgro4&t=118s
            https://www.youtube.com/watch?v=Lf6R5oDtkFo
            https://www.youtube.com/watch?v=5glsdzGeYQo
            https://www.youtube.com/watch?v=TQGq6k8HQk4

        Documentation:
            LaravelCertification-MainNotes/ServiceContainer

        Laravel Document Explanation:

        Examples:
            => index.php => app.php => Application.php

            What is Reflection and how it is working?
            https://www.educba.com/php-reflection/

    ///Service Providers: [Architecture] => Notes Added
        Links:
            https://www.youtube.com/watch?v=1AxQNDOJTBw&t=23s
            https://www.youtube.com/watch?v=VYPfncvYW-Y&t=9s

        Documentation:
            LaravelCertification-MainNotes/ServiceProviders

        Laravel Documentation:
            Service Providers

            Introduction
                    Service providers are the central place of all Laravel application bootstrapping. Your own application, as well as all of Laravel's core services are bootstrapped via service providers.

                    But, what do we mean by ""bootstrapped""? In general, we mean registering things, including registering service container bindings, event listeners, middleware, and even routes. Service providers are the central place to configure your application.

                    If you open the config/app.php file included with Laravel, you will see a providers array. 

            Writing Service Providers: all this sub topics are red from Documentation
                    The Register Method

                    The Boot Method

            Registering Providers

            Deferred Providers

        Examples:
            We can create Our Own "Service Provide"
            => php artisan make:provider TestServiceProvider
            After running command We need to register in "App.php\Config"
            dd(app()->make('Hello'));
            "Hello" is register on "Service Container"

    ///Facades: [Architecture] => Notes Added
        Important Links:
            https://www.youtube.com/watch?v=zR6JnwH7MSQ
            https://www.youtube.com/watch?v=zD2VJhOdI5c&list=PLe30vg_FG4OSAe3l51470wMxVhq5MzqSp&index=22&t=254s

        Documentation Notes Path:
            LaravelCertification-MainNotes/LaravelFacades

        Laravel Documentation:

        Video Examples:
            It is just a warper around Non-Static function to Static function
            For Eg:-
                we call as static function

                // Calling as a Non-Static method
                cache()->set('name', 'Girish');
                dump(cache()->get('name'));

                // Calling as a static method
                use Illuminate\Support\Facades\Cache;
                Cache::set('name', 'kumar');
                dd(Cache::get('name'));

                => It is Very Easy to Use / Code Looks Good
                    - Memorable syntax that allows you to use Laravel's features without remembering long class names that must be injected or configured manually.
                => For Testing Purpose also it is Useful
                => The primary danger of facades is class scope creep. Since facades are so easy to use and do not require injection, it can be easy to let your classes continue to grow and use many facades in a single class.

    //Contracts: [Architecture] => Notes Added
        Links:
            https://www.youtube.com/watch?v=IrIZ7wiWocg
            https://www.youtube.com/watch?v=k5nZ4zgc9X8

        Documentation:
            LaravelCertification-MainNotes/Contracts

        Examples:

    ///Middleware: [Middleware] => Notes Added
        Important Links:
            https://www.youtube.com/watch?v=5Cf-04IzGSo&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=23
            https://www.youtube.com/watch?v=CQyNDnMhf8U&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=24

        Documentation Notes Path:
            LaravelCertification-MainNotes/LaravelMiddleware

        Video Examples:
            php artisan down
            php artisan up
            => Middleware we can do it in Two ways
                1. Route level Middleware
                2. Controller level Middleware

            php artisan make:middleware TestMiddleware

    ///Artisan Console: [Artisan Console] => Notes Added
        Important Links:
            https://www.youtube.com/watch?v=uWrecwtVarw&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=34
            https://www.youtube.com/watch?v=5o1raoxJI3U&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=35
            https://www.youtube.com/watch?v=mMnjTO1-yLg&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=36

        Documentation Notes Path:
            LaravelCertification-MainNotes/Artisan Console

        Video Examples:
            php artisan make:command AddCompanyCommand
            php artisan help contact:company

            php artisan contact:company

            php artisan contact:company GirishKumar
            php artisan contact:company GirishKumar 8892240256
            -------------
            To Clear Company:
            php artisan contact:company-clean

    ///Queues (50%): [Queues] => Notes Added
        Important Links:
            https://www.youtube.com/watch?v=lGOACudnLWE&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=29
            https://www.youtube.com/watch?v=5wJ3NHDR134&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=30&t=7s

        Documentation Notes Path:
            LaravelCertification-MainNotes/LaravelSupervisor
            LaravelCertification-MainNotes/LaravelQueue

        Video Examples:
            It should be "class WelcomeNewCustomerListener implements ShouldQueue { }"
            In ".env" file we need to set "QUEUE_CONNECTION=database"
            /var/www/html/Laravelv58/config/queue.php
            In Production we are using "redis" for "Queueing"
            but in Local we are using "database"

            php artisan queue:table => This will create new migration table called "jobs"

            Than run "php artisan migrate"

            We need to run this command(This will check in background if any Queues creaed If created it will process):
                php artisan queue:work
            -------------
            php artisan queue:work & (This will give the Job ID, for Eg:- 29008)

            jobs (you can see the running jobs)
            jobs -l (you can see the running jobs + process ID)

            KILL 29008 (this will kill job with ID: "29008")

            php artisan queue:work > storage/logs/jobs.log & (Log this job into log file)

    //Policy (50%): [Queues] => Notes Added
        Important Links:
            https://www.youtube.com/watch?v=NrlY-xeqHBg&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=44
            https://www.youtube.com/watch?v=7CXkYxdqTYc&list=PLe30vg_FG4OR3b24WlxeTWsj7Z2wOtYrH&index=20&t=4s

        Documentation Notes Path:
            LaravelCertification-MainNotes/Policy

        Video Examples:

    //Jobs: [Queues] => Notes Added
        Important Links:
            https://www.youtube.com/watch?v=DFXNYI0iy1g&t=4s
            https://www.youtube.com/watch?v=RCb9oidcPfM
            https://www.youtube.com/watch?v=rVx8xKisbr8

        Documentation Notes Path:
            LaravelCertification-MainNotes/Jobs

        Video Examples:

    ///Seeding (Model Factories): [Database] => Notes Added
        Important Links:
            https://www.youtube.com/watch?v=s37i5W1Bzp8&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=37
            https://www.youtube.com/watch?v=U5gxiPNcSZU&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=38

        Documentation Notes Path:
            LaravelCertification-MainNotes/SeedingModelFactories

        Video Examples:
            php artisan tinker
            User::all()->pluck('name');
            factory(\App\User::class)->create();
            factory(\App\User::class, 3)->create();

            Some Error While creating:
                PHP Deprecated:  The "Doctrine/Common/Inflector/Inflector::pluralize" method is deprecated and will be dropped in doctrine/inflector 2.0.
                Please update to the new Inflector API. in /var/www/html/Laravelv58/vendor/doctrine/inflector/lib/Doctrine/Common/Inflector/Inflector.php on line 264

            php artisan make:factory CompanyFactory -m Company
            OR
            php artisan make:factory CompanyFactory --model=Company
            Company::all()->pluck('name');

            factory(App\Company::class, 3)->create();

            $company = Company::factory()->create();
            // Create three App\User instances...
            $company = factory(App\Company::class, 3)->make();
            ---------------------------------
            https://kaloraat.com/articles/generate-fake-data-using-faker-and-factory-in-laravel
                php artisan make:seeder CompanyTableSeeder

            For faker Examples:
                https://github.com/fzaninotto/Faker#table-of-contents
            ---------------------------------
            So Conclusion:
                => This is an Example for Creating Company's in factoy/facker
                    php artisan make:factory CompanyFactory -m Company
                    Or
                    php artisan make:factory CompanyFactory --model=Company

                    php artisan make:seeder CompanyTableSeeder

                    php artisan db:seed

                    => This is an Example for Creating Company's in factoy/facker
                    php artisan make:factory CompanyFactory -m Company
                    Or
                    php artisan make:factory CompanyFactory --model=Company

                    php artisan make:seeder CompanyTableSeeder

                    php artisan db:seed

    Laravel Eloquent Model: [Eloquent ORM]
        Links:

        Documentation:

        Examples:

    Laravel DB Query: [Database]
        Links:

        Documentation:

        Examples:

    //Sending Emails: [Mail] => Notes Added
        Important Links:
            https://www.youtube.com/watch?v=gtMXs9a1e0Y
            https://www.youtube.com/watch?v=upKOwoe8LsM
            https://www.youtube.com/watch?v=5DREuAvFnps

        Documentation Notes Path:
            LaravelCertification-MainNotes/SendingEmails

        Video Examples:

    ///Event and Listener: [Events] => Notes Added
        Important Links:
            https://www.youtube.com/watch?v=6wZKwJQF7Is&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=28&t=14s

        Documentation Notes Path:
            LaravelCertification-MainNotes/EvenAndListener

        Video Examples:
            => If New Customer is Register than we can Send a Mail By Event and Listeners
                php artisan make:mail WelcomeNewUserMail --markdown emails.new-welcome

            => Event and Listeners:
                php artisan make:event NewCustomerHasRegisteredEvent
                php artisan make:listener WelcomeNewCustomerListener

                Laravelv58/app/Providers

                php artisan event:generate
                    Event:
                    /var/www/html/Laravelv58/app/Providers/NewCustomerHasRegisteredEvent.php

                    Event Service Provider:
                    /var/www/html/Laravelv58/app/Providers/EventServiceProvider.php

                    Listeners:
                    /var/www/html/Laravelv58/app/Listeners/NotifyAdminViaSlack.php
                    /var/www/html/Laravelv58/app/Listeners/RegisterCustomerToNewsletter.php
                    /var/www/html/Laravelv58/app/Listeners/WelcomeNewCustomerListener.php

    ==================================================================
        Links:
            Video Link

        Documentation:
            GDrive Link

        Examples:
            Video Seen Examples

    ==================================================================

    => All this Notes are in:
        Project-Notes-1.php
        TodayAndTomorrowTask.php
        ThirdWeekSummary.php
        FifthWeekPlan.php
        SixthWeekPlan.php

        web.php

    => Update the Respective links
        On Each Advance Topic

    => Listdown all the current Concepts/Topics Documented properly Or with percentage

    => GDrive Notes:
        - LaravelCertification-MainNotes
        - LaravelCertification-ShortNotes
        - LaravelFeaturesAndSecurity
        - LaravelVersions
        - myQuestionsAndAnswers

2. Merge all the concept content into GDrive

3. Read and Analyze QandA related to the Advance Concepts

4. Check the Working Examples Of Each Concepts In Current Build Project

5. All the Laravel Command we can mention here 
    - 4-NewJobsByMay/Laravel Commands
    - 4-NewJobsByMay/LaravelFeaturesDiggingDeeper

    Documentation:
        myQuestionsAndAnswers/LaravelQueue
        LaravelCertification-MainNotes/EvenAndListener

    Directory Followup:-
        Important Links:
        Video Examples:
        Documentation Notes Path:
        Laravel Documentation:

        ===============================================

        //ArtisanConsole
        //LaravelSupervisor
        //LaravelFacades
        //LaravelMiddleware
        //LaravelQueue

        //ServiceContainer
        //ServiceProviders
        //Contracts
        //Policy
        //Jobs
        //SeedingModelFactories
        //SendingEmails
        //EvenAndListener
        ---------------------------------------
        LaravelCollection => Next Comming Session
        LaravelLogs
        LaravelsoftDeleting

        LaravelEloquentModel
        LaravelDBQuery
        Localization
        TaskScheduling
        LazyLoadingVsEagerLoading
        LaravelCollections
        Broadcasting
        ErrorHandlingAndLogging
        --------------------------
        AboutHelperFunction
        LaravelHelperFunctions
        Auth0 Configuration
        CommonQuestions

        LaravelCommands

        QuestionAndAnswers1
        QuestionAndAnswers2
        QuestionAndAnswers3

Next Week Plan:
    1. Finish Pending Advance Concepts: [19/20]
        // Laravel Eloquent Model: [Eloquent ORM]
        // Laravel DB Query: [Database]
        // Lazy Loading vs. Eager Loading (Fixing N + 1 Problem): [Eloquent ORM]
        // Telescope
        // Pagination
        // Policies
        // Localization: [Frontend]

        // Task Scheduling: [Task Scheduling]
            https://www.youtube.com/watch?v=_NoWp58pHa4&t=32s
        Collections: [Collections]
            https://www.youtube.com/playlist?list=PLpzy7FIRqpGCCm3pJHtDKYHlHJclb9V9m
            https://www.parthpatel.net/laravel-collection-methods-tutorial/

        Broadcasting: [Websockets]
        Error Handling & Logging: [Logging]

    2. In Between Update the "Laravel Versions" Notes: [21/22]
        // LaravelVersion5.1.docx
        // LaravelVersion5.2.docx
        // LaravelVersion5.3.docx
        // LaravelVersion5.4.docx
        // LaravelVersion5.5.docx
        // LaravelVersion5.6.docx
        // LaravelVersion5.7.docx
        // LaravelVersion5.8.docx
        // LaravelVersion6.0.docx
        // LaravelVersion7.0.docx
        // LaravelVersion8.0.docx
        // LaravelVersion9.0.docx

    3. PhpStorm:
        https://www.youtube.com/watch?v=EwL_1wbg-rQ
        https://www.youtube.com/watch?v=p034GB87hFA
        https://www.youtube.com/watch?v=AHK20LWEWXQ&list=PLQ176FUIyIUbfeFz-2EbDzwExRlD0Bc-w
        https://www.youtube.com/watch?v=C6YzTnoGdjw&t=693s
        https://www.youtube.com/watch?v=pbQFMwWINJ8&list=PLrIm-p2rpV0HMYSD0fGDpL_jsmqhBElvG&index=9

    4. OOP's QandA and all Its Concepts with Examples: [23/24]
        php oops concepts
            https://www.valuebound.com/resources/blog/object-oriented-programming-concepts-php-part-1
            https://www.valuebound.com/resources/blog/object-oriented-programming-concepts-php-part-2
            https://www.w3schools.com/php/php_oop_classes_objects.asp
            https://www.tutorialspoint.com/php/php_object_oriented.htm
            https://www.guru99.com/object-oriented-programming.html

            ***https://www.guru99.com/error-handling-and-exceptions.html

            https://www.simplilearn.com/tutorials/php-tutorial/oops-in-php

            https://www.phptutorial.net/php-oop/
                Section 1. Objects & Classes
                    Objects & Classes – learn the basic concepts of OOP including objects and classes.
                    The $this keyword – help you understand PHP $this keyword and how to use it effectively.
                    Access Modifiers: public vs. private – explain to you the access modifiers in PHP and help you understand the differences between the private and public access modifiers.

                Section 2. Constructor and Destructor
                    Constructor – explain to you the constructor concept and how to use it to initialize attributes.
                    Destructor – learn how to use destructor to clean resources when the object is deleted.

                Section 3. Properties
                    Typed Properties – show you how to add type hints to class properties.
                    Readonly Properties – use the readonly keyword to define readonly properties that can be initialized once within the class.

                Section 4. Inheritance
                    Inheritance – how to extend a class for code reuse.
                    Call the parent constructor – show you how to call the parent constructor from a child class’s constructor.
                    Overriding method – guide you on how to override a parent class’s method in the child class.
                    Protected Access Modifier – explain the protected access modifier and how to use protected properties and methods effectively.

                Section 5. Abstract classes
                    Abstract Class – guide you on abstract classes and how to use them effectively.

                Section 6. Interfaces
                    Interface – explain to you the interface concept and how to create interfaces.

                Section 7. Polymorphism
                    Polymorphism – explain the polymorphism concept and show you how to implement polymorphism in PHP using abstract classes or interfaces.

                Section 8. Traits
                    Traits – introduce you to traits.

                Section 9. Static methods & properties
                    Static Methods and Properties – show you how to use static methods and properties.
                    Class constants – learn how to define class constants using the const keyword.
                    Late Static Binding – introduce the late static binding concept and how to use it effectively.

                Section 10. Magic Methods
                    Magic methods – understand how the magic methods work in PHP.
                    __toString() – return the string representation of an object.
                    __call() – show you how to use the __call() magic method.
                    __callStatic() – show you how to use the __calStatic() magic method.
                    __invoke() – learn how to define a function object or function by implementing the __invoke() magic method.

                Section 11. Working with Objects
                    Serialize Objects– use the serialize() function to serialize an object into a binary string and how to use the __serialize() and __sleep() magic methods
                    Unserialize Objects – guide you on how to use the unserialize() function to convert a serialized string into an object. Also, discuss the __wakeup() and __unserialize() magic methods.
                    Cloning Objects – show you how to copy an object.
                    Comparing Objects – how to compare two objects.
                    Anonymous class – learn how to define a class without a declared name.

                Section 12. Namespaces
                    Namespace – learn how to use namespaces to group the related classes.

                Section 13. Autoloading
                    Autoloading Class files – learn how to load classes automatically.
                    Autoloading using Composer – show you how to use Composer to autoload classes.

                Section 14. Exception Handling
                    try…catch – show you how to use the try…catch statement to handle exceptions that may occur in your script.
                    try…catch…finally – learn how to clean up the resources when an error occurs using the finally block.
                    Throw an exception – guide you on how to throw an exception using the throw statement.
                    Set an Exception Handler – show you how to use the set_exception_handler function to set a global exception handler to catch the uncaught exceptions.

                Section 15. Class / Object Functions
                    class_exists – return true if a class exists
                    method_exists – return true if an object or a class has a specific method.
                    property_exists – return true if an object or a class has a specific property.

        Laravel Blog Project and Its Description: (We can Follow same kind of Description for other projects as well)
            https://www.section.io/engineering-education/laravel-beginners-guide-blogpost/
            https://www.flowkl.com/tutorial/web-development/simple-blog-application-in-laravel-7/
            https://laraveltuts.com/
            https://www.flowkl.com/tutorial/web-development/view-in-laravel-5/

    5. Laravel API Development

    6. Testing TDD and its QandA, Commands

    7. Laravel All Its Packages and its Usage

    8. Align the Projects => Laravelv58/project-info/latestProjectHandling.php

    9. Lead and its Responsibilities (how to become leader in web development)
        - Code Analyzing / Code Optimizing
        - Guiding Juniors
        - Conducting Meetings
        - Preparing PPT
        - Designing Flow Charts
        - Building Architecture Of The Project







