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
        Laravel Eloquent Model: [Eloquent ORM]
        Laravel DB Query: [Database]
        Localization: [Frontend]
        Task Scheduling: [Task Scheduling]
        Lazy Loading vs. Eager Loading (Fixing N + 1 Problem): [Eloquent ORM]
        Collections: [Collections]
        Broadcasting: [Websockets]
        Error Handling & Logging: [Logging]

    2. In Between Update the "Laravel Versions" Notes: [21/22]

    3. OOP's QnadA and all Its Concepts with Examples: [23/24]
        php oops concepts

    4. Laravel API Development

    5. Testing TDD and its QandA, Commands

    6. Laravel All Its Packages and its Usage

    7. Align the Projects => Laravelv58/project-info/latestProjectHandling.php

    8. Design Patterns In Laravel and PHP

    9. Lead and its Responsibilities (how to become leader in web development)
        - Code Analyzing / Code Optimizing
        - Guiding Juniors
        - Conducting Meetings
        - Preparing PPT
        - Designing Flow Charts
        - Building Architecture Of The Project

Morning Practice On Board:
    1. Laravel Commands

    2. Laravel Advance Concepts
    With QandA / Definition
    With Examples

    3. MYSQL Commands
    With Advance Concepts
    With Queries
    With Terminal Commands

    4. Ubuntu Commands

    5. PhpStorm Commands

Resume Update / Job Preparation:
    1. Updated Resume If Needed
        Apache And Nginx Server, Amazon Web Services (EC2, S3)

    2. Job Portal:
        https://larajobs.com/
        https://www.turing.com/
        https://www.naukri.com/
        https://www.linkedin.com/jobs/
        https://www.glassdoor.co.in/index.html
        https://in.indeed.com/

    3. Description The Project Shortly and Project Outcome

    4. what Laravel version you have used?

    5. Mention Plus Points:
        Laravel Certification
        Working as a Team Lead Proxy
        Teaching Juniors




