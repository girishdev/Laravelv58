Fifth week plan:

1. Finish all Laravel Review:
    - Install Laravel Version
        For Eg:- Laravelv6, Laravelv7 and etc...
    - For Each Features add ToDo Comment Provided by PHPStorm
    - Time is very precious so make use of Focus TODO"
    - If Possible On Concept Describing add(Images/Videos), In QandA Section Or in comfortable page

// 1. Implement Video/Images(Multiple Images) Uploading Feature

2. List-down all the Laravel Current Features Implemented and Know Features (Basic + Advance)

3. Collect / List-down all the Laracasts Videos Features (Which are seen Previous Week)

4. Finish Advance Concept Listed with examples:
    1. Laravel Even //
    2. Laravel Listener //
    3. Laravel Queue (Supervisor and Its Configuration) // .....
    4. Laravel Middleware //
        https://www.youtube.com/watch?v=5Cf-04IzGSo&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=23
        https://www.youtube.com/watch?v=CQyNDnMhf8U&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=24
    5. Laravel Sending Notification and Emails
        All About "Sending Notification"
            https://www.youtube.com/watch?v=gtMXs9a1e0Y
            https://www.youtube.com/watch?v=upKOwoe8LsM
            https://www.youtube.com/watch?v=5DREuAvFnps
    6. Laravel Artisan
        https://www.youtube.com/watch?v=uWrecwtVarw&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=34
        https://www.youtube.com/watch?v=5o1raoxJI3U&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=35
        https://www.youtube.com/watch?v=mMnjTO1-yLg&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=36

    7. Model Factories (Seeding)
        https://www.youtube.com/watch?v=s37i5W1Bzp8&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=37
        https://www.youtube.com/watch?v=U5gxiPNcSZU&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=38

    8. Laravel Policy
        https://www.youtube.com/watch?v=NrlY-xeqHBg&list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4&index=44
        https://www.youtube.com/watch?v=7CXkYxdqTYc&list=PLe30vg_FG4OR3b24WlxeTWsj7Z2wOtYrH&index=20&t=4s

    9. Laravel Jobs
        https://www.youtube.com/watch?v=DFXNYI0iy1g&t=4s
        https://www.youtube.com/watch?v=RCb9oidcPfM
        https://www.youtube.com/watch?v=rVx8xKisbr8

    10. Laravel Eloquent Model(All Relationships)
    11. Laravel DB Query(With All Relationships)

    12. Service Container
        https://www.youtube.com/watch?v=PGVqkEZiUoc
        https://www.youtube.com/watch?v=_z9nzEUgro4&t=118s
        https://www.youtube.com/watch?v=Lf6R5oDtkFo
        https://www.youtube.com/watch?v=5glsdzGeYQo
        https://www.youtube.com/watch?v=TQGq6k8HQk4

        => index.php => app.php => Application.php

    13. Service Providers
        https://www.youtube.com/watch?v=1AxQNDOJTBw&t=23s
        https://www.youtube.com/watch?v=VYPfncvYW-Y&t=9s

        We can create Our Own "Service Provide"
        => php artisan make:provider TestServiceProvider
        After running command We need to register in "App.php\Config"
        dd(app()->make('Hello'));
        "Hello" is register on "Service Container"

    14. Contracts
        https://www.youtube.com/watch?v=IrIZ7wiWocg
        https://www.youtube.com/watch?v=k5nZ4zgc9X8

    15. Facades
        https://www.youtube.com/watch?v=zR6JnwH7MSQ
        https://www.youtube.com/watch?v=zD2VJhOdI5c&list=PLe30vg_FG4OSAe3l51470wMxVhq5MzqSp&index=22&t=254s
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

    14. Laravel API's(Passport, Auth, JWT and etc...)
    15. Laravel Testing TDD

    16. Laravel Ecosystem(Forge, Cacher, and etc...)
    17. Laravel VueJs (QandA with Some Sample Laravel Project{just an CRUD})

    18. Laravel Package Development

    ------------------------------------------
    1. Question and Answers Related to this Advance Topics
    2. Key Points about this Advance Topics
    3. Examples On Each Advance Topics
    5. What is the Use Of creating "Artisan Commands", "Policy" and etc...
    6. Commands On Each Concepts
    7. standard Laravel naming conventions => I am adding this "ImportantScreenshot" into GDrive Laravel Folder
        ***https://webdevetc.com/blog/laravel-naming-conventions/ => [webdevetcNamingConventions] //
        ***https://webdevetc.com/blog/laravel-features-you-may-not-know-about => [webdevetcLaravelFeatures] //
        ***https://xqsit.github.io/laravel-coding-guidelines/docs/naming-conventions/ => [xqsitNamingConventions] //
        ***https://github.com/alexeymezenin/laravel-best-practices#fat-models-skinny-controllers => [alexeymezeninBestPractices] //
        ***https://www.mindtwo.de/guidelines/coding/laravel#use-shorter-and-more-readable-syntax-where-possible => [mindtwoUseShorter] //
        ***https://devdojo.com/alpdetails/laravel-best-practice-coding-standards-part-01#toc-01-03-06-primary-key => [devdojoBestPractice] //

    8. Other Missing Topics we can add it here(Task Scheduling, Collections, and etc....)
    ------------------------------------------
    Laravel Video Series Tutorial:
        [Downloaded] https://www.youtube.com/playlist?list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4
        https://www.youtube.com/playlist?list=PLpzy7FIRqpGC8Jk6gyWdSVdxCVXZAsenQ
        https://www.youtube.com/playlist?list=PLpzy7FIRqpGD5pN3-Y66YDtxJCYuGumFO
        https://www.youtube.com/playlist?list=PLe30vg_FG4OSAe3l51470wMxVhq5MzqSp
        https://www.youtube.com/playlist?list=PLe30vg_FG4OR3b24WlxeTWsj7Z2wOtYrH
    ------------------------------------------
    VueJs Video Series Tutorial:
        https://www.youtube.com/watch?v=Hspgd7eFvsw&list=PLe30vg_FG4OS2ITq96FZLqHi1YreNuVVl
        [Downloaded] https://www.youtube.com/watch?v=wVmSvDqojBc&list=PLpzy7FIRqpGDuLIo0zZ43CpA5MmYnnCUy

Very Important Link:
    https://laravel-guide.readthedocs.io/en/latest/middleware/

5. Laravel Paper Work:
    DB::Query
    Eloquent
    Artisan Console Commands
    Blade Directives
    Testing (TTD) Commands
    Normal Laravel Usage Commands(To Build Laravel Projects)
    Helpers Function / Collections
    Validation Rules

    5.1 Controller Commands

        php artisan make:controller ShowProfile --invokable
        Resource Controller:
            php artisan make:controller PhotoController --resource


6. Laravel QandA with Images/Videos:

7. Other Subject Paper Work:
    - MYSQL
        + MYSQL Terminal Commands All(MYSQL Login, User Privileges)
        + MYSQL Complex Queries(MYSQL Joins, Views, Function and etc...)

    - Ubunut
        + System Commands
        + SSH Commands
        + Server Related Commands (Apache, Mysql, Php etc...)

    - Git Commands



