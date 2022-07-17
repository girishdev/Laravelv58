php artisan help make:controller => Controller can be plural
php artisan make:controller CustomersController

Model Should be singular Not Plural
php artisan make:model Customer -m

php artisan tinker
    >>> $customer = new Customer();
    >>> $customer->name = 'Girish';
    >>> $customer->save();
    >>> Customer::all();

Note:
    Till Pushing to Production Server you can generate as many Migration you want
    but when you Release Specific Version in PS, then you need to create New Migration file

Note: Migration Describes Database
    php artisan migrate:rollback => This will go One Step backwords
    php artisan migrate

Model are the Singular version what we do
php artisan make:model Company -m

Adding Company:
    php artisan tinker
    $c = Company::create(['name' => 'ABC Company', 'phone' => '123-123-1234']);

Relationship
    1. A Company has Many Customers
    2. A Customer Belongs to the Company

Note: If you keep It Naming convention Singular to Plural the all it works

php artisan migrate:fresh => Generate Fresh Tables

$c = Company::first();
$c = $c->customers;

$c = Customer::first();
$c = $c->company;

Calling as a Property and Calling as a methods

.col-2 (Created Html div)

php artisan help make:controller
php artisan make:controller TestController -r
php artisan make:controller TestagainController -r -m Customer

php artisan make:model qanda -m
php artisan make:controller qandasController - r -m qanda

Model - Singular
Controller - Plural
php artisan make:model Qanda -m
php artisan make:controller QandasController - r -m Qanda

Eloquent ia able to handel many Different Databases Drivers

For Image Folder Sync We have Run:
    php artisan storage:link

Image Image Intervention:
    https://image.intervention.io/v2/introduction/installation
    composer require intervention/image

Creating Contact Form Controller:
    php artisan make:controller ContactFormController

    Maillable:
    php artisan make:mail ContactFormMail --markdown=emails.contact.contact-form

    For testing Purpose we are using Mail Trap
    For Production Server we can Use Mail Gun

    File Used:
        app/Mail/ContactFormMail.php
        resources/views/emails/contact/contact-form.blade.php
        app/Http/Controllers/ContactFormController.php
        app/Http/Controllers/CustomersController.php
        resources/views/layout.blade.php
        .env

Laravel 5.8 - From The Ground Up: [Git Repository:- https://github.com/girishdev/Laravelv58.git]
    // Laravel 5.8 Tutorial From Scratch - e01 - Installation

    // Laravel 5.8 Tutorial From Scratch - e02 - Web Routes

    // Laravel 5.8 Tutorial From Scratch - e03 - Views

    // Laravel 5.8 Tutorial From Scratch - e04 - Passing Data to Views

    // Laravel 5.8 Tutorial From Scratch - e05 - Controllers

    // Laravel 5.8 Tutorial From Scratch - e06 - Blade Templating Basics

    // Laravel 5.8 Tutorial From Scratch - e07 - SQLite Database

    // Laravel 5.8 Tutorial From Scratch - e08 - Adding Customers To The Database

    // Laravel 5.8 Tutorial From Scratch - e09 - Form Validation

    // Laravel 5.8 Tutorial From Scratch - e10 - Adding Email For Customers

    // Laravel 5.8 Tutorial From Scratch - e11 - Cleaning Up The Views

    // Laravel 5.8 Tutorial From Scratch - e12 - Eloquent Where Clause

    // Laravel 5.8 Tutorial From Scratch - e13 - Eloquent Scopes & Mass Assignment

    // Laravel 5.8 Tutorial From Scratch - e14 - Eloquent BelongsTo & HasMany Relationships

    // Laravel 5.8 Tutorial From Scratch - e15 - Eloquent Accessors & RESTful Controller - Part 1

    // Laravel 5.8 Tutorial From Scratch - e16 - Eloquent Route Model Binding & RESTful Controller - Part 2

    // Laravel 5.8 Tutorial From Scratch - e17 - Eloquent Route Model Binding & RESTful Controller - Part 3

    // Laravel 5.8 Tutorial From Scratch - e18 - Eloquent Route Model Binding & RESTful Controller - Part 4

    // Laravel 5.8 Tutorial From Scratch - e19 - Handling a Contact Form Using a Laravel Mailable

    // Laravel 5.8 Tutorial From Scratch - e20 - Flashing Data to Session & Conditional Alerts in View

    Laravel 5.8 Tutorial From Scratch - e21 - Artisan Authentication - Register, Login & Password Reset
    11:37

    Laravel 5.8 Tutorial From Scratch - e22 - Artisan Authentication Restricting Access with Middleware
        08:40
        php artisan down
        php artisan up
        => Middleware we can do it in Two ways
            1. Route level Middleware
            2. Controller level Middleware

    Laravel 5.8 Tutorial From Scratch - e23 - Adding a Custom Middleware
        11:04
        php artisan make:middleware TestMiddleware

    Laravel 5.8 Tutorial From Scratch - e24 - URL Helpers
        10:16
        {{ url('/contact') }}
        {{ route('contact.store') }}
        php artisan route:list
        {{ action('HomeController@index') }}

    Laravel 5.8 Tutorial From Scratch - e25 - Front End Setup with NPM, Node, Vue & Webpack
    11:13

    Laravel 5.8 Tutorial From Scratch - e26 - Vue Basics 101

    Laravel 5.8 Tutorial From Scratch - e27 - Frontend Presets for React, Vue, Bootstrap & Tailwind CSS

    Laravel 5.8 Tutorial From Scratch - e28 - Events & Listeners
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

    Laravel 5.8 Tutorial From Scratch - e29 - Queues: Database Driver
        It should be "class WelcomeNewCustomerListener implements ShouldQueue { }"
        In ".env" file we need to set "QUEUE_CONNECTION=database"
        /var/www/html/Laravelv58/config/queue.php
        In Production we are using "redis" for "Queueing"
        but in Local we are using "database"

        php artisan queue:table => This will create new migration table called "jobs"

        Than run "php artisan migrate"

        We need to run this command(This will check in background if any Queues creaed If created it will process):
            php artisan queue:work

    Laravel 5.8 Tutorial From Scratch - e30 - queue:work In The Background
            php artisan queue:work & (This will give the Job ID, for Eg:- 29008)

            jobs (you can see the running jobs)
            jobs -l (you can see the running jobs + process ID)

            KILL 29008 (this will kill job with ID: "29008")

            php artisan queue:work > storage/logs/jobs.log & (Log this job into log file)

    Laravel 5.8 Tutorial From Scratch - e31 - Deployment: Basic Server Setup - SSH, UFW, Nginx - Part 1

    Laravel 5.8 Tutorial From Scratch - e32 - Deployment: Basic Server Setup - MySQL, PHP 7 - Part 2

    Laravel 5.8 Tutorial From Scratch - e33 - Deployment: Basic Server Setup - SSL, HTTPS - Part 3

    Laravel 5.8 Tutorial From Scratch - e34 - Artisan Commands - Part 1
        php artisan make:command AddCompanyCommand
        php artisan help contact:company

        php artisan contact:company

        php artisan contact:company GirishKumar
        php artisan contact:company GirishKumar 8892240256

    Laravel 5.8 Tutorial From Scratch - e35 - Artisan Commands - Part 2

    Laravel 5.8 Tutorial From Scratch - e36 - Artisan Commands (Closure) - Part 3
        To Clear Company:
        php artisan contact:company-clean

    Laravel 5.8 Tutorial From Scratch - e37 - Model Factories => 10:50 -
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
        ---------------------------------

    // Laravel 5.8 Tutorial From Scratch - e38 - Database & Table Seeders

    // Laravel 5.8 Tutorial From Scratch - e39 - Image Upload - Part 1

    // Laravel 5.8 Tutorial From Scratch - e40 - Image Upload: Cropping & Resizing - Part 2

    Laravel 5.8 Tutorial From Scratch - e41 - Telescope

    Laravel 5.8 Tutorial From Scratch - e42 - Lazy Loading vs. Eager Loading (Fixing N + 1 Problem)

    Laravel 5.8 Tutorial From Scratch - e43 - Pagination

    Laravel 5.8 Tutorial From Scratch - e44 - Policies

    Laravel 5.8 Tutorial From Scratch - e45 - Eloquent Relationships One To One (hasOne, BelongsTo)

    Laravel 5.8 Tutorial From Scratch - e46 - Eloquent Relationships One To Many (hasMany, BelongsTo)

    Laravel 5.8 Tutorial From Scratch - e47 - Eloquent Relationships Many To Many (BelongsToMany)

    Laravel 5.8 Tutorial From Scratch - e48 - Eloquent Relationships Many To Many Part 2 (BelongsToMany)

    Laravel 5.8 Tutorial From Scratch - e49 - Testing 101 Using PHPUnit

    Laravel 5.8 Tutorial From Scratch - e50 - SEO Friendly URLs

    Laravel 5.8 Tutorial From Scratch - e51 - Localization, Translations & Language Files

    Laravel 5.8 Tutorial From Scratch - e52 - Multi Image File Upload & Gallery

IDE Setup:
    https://www.jetbrains.com/help/phpstorm/2022.1/laravel.html
    https://www.javatpoint.com/laravel-tinker#:~:text=Laravel%20Tinker%20allows%20you%20to,works%20with%20a%20php%20artisan.
    https://stillat.com/blog/2016/12/07/laravel-artisan-the-tinker-command

Concept Learning In this Project:
1. Routes:

2. Controller

3. Views(Blade File)

4. HTML forms(Blade)

5. Validation
https://laravel.com/docs/master/validation#available-validation-rules

6. Eloquent

7. Sending Mails
8. Flashing Data (Session/Cookies)
9. Helper Function(URL Helpers)
10. Authentication
11. Middleware
12. Events & Listeners
13. Queues
14. Deployment: Basic Server Setup
15. Artisan Commands
16. Model Factories
17. Database & Table Seeders
18. Image Upload
19. Telescope
20. Lazy Loading vs. Eager Loading (Fixing N + 1 Problem)
21. Pagination
22. Policies
23. Eloquent Relationships
24. Testing 101 Using PHPUnit
25. SEO Friendly URLS
26. Localization, Translations & Language Files
27. Multi Image File Upload & Gallery

28. Vue Basics
    
29. Git Push and Pull

php artisan serve --host=192.168.1.7 --port=8000
php artisan serve --host=127.0.01 --port=8000
