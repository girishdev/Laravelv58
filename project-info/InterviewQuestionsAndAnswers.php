Interview Question and Answers: 
	(Also Refer - MyQuestionsAndInterviewQuestions And InterviewQuestions On GDrive)

What is polymorphism PHP?
	- Polymorphism is essentially an OOP pattern that enables numerous classes with different functionalities to execute or share a commonInterface. The usefulness of polymorphism is code written in different classes doesn't have any effect which class it belongs because they are used in the same way.

Does PHP allow function overloading?
	- PHP does not support method overloading. In case you've never heard of method overloading, it means that the language can pick a method based on which parameters you're using to call it. This is possible in many other programming languages like Java, C++.

PHP who you overload class in php
	- Property Overloading: PHP property overloading is used to create dynamic properties in the object context. For creating these properties no separate line of code is needed. A property associated with a class instance, and if it is not declared within the scope of the class, it is considered as overloaded property.

What's the difference between __ sleep and __ wakeup?
	- __sleep is supposed to return an array of the names of all variables of an object that should be serialized. __wakeup in turn will be executed by unserialize if it is present in class. It's intention is to re-establish resources and other things that are needed to be initialized upon unserialization.

	__sleep and __wakeup are methods that are related to the serialization process. serialize function checks if a class has a __sleep method. If so, it will be executed before any serialization. __sleep is supposed to return an array of the names of all variables of an object that should be serialized.

	__wakeup in turn will be executed by unserialize if it is present in class. It's intention is to re-establish resources and other things that are needed to be initialized upon unserialization.

	Link: https://riptutorial.com/php/example/4604/--sleep---and---wakeup--

What is encapsulation in OOP PHP?
	- So the OOPs concept of Encapsulation in PHP means, enclosing the internal details of the object to protect from external sources. It describes, combining the class, data variables and member functions that work on data together within a single unit to form an object.

Does Subqueries Support Order by and Group By
	- An ORDER BY command cannot be used in a subquery, although the main query can use an ORDER BY. The GROUP BY command can be used to perform the same function as the ORDER BY in a subquery.

How Laravel caching machine works?
	- Laravel creates an encrypted file with the data and the cache key when new data is cached. The same happens when the user is trying to retrieve the content. Laravel cache searches through the folder for the specified key and, if found, returns the content.

CSRF Token

Task Scheduler

How to Disable Time stamp In Laravel Model
	const UPDATED_AT = null;
		-- Or --
	const CREATED_AT = null;
		-- Or --
    public $timestamps = false;

How to Disable Other Database Column Instead Of fetching all In Laravel Model
	class User extends Model
	{
	    /**
	     * The attributes that should be hidden for arrays.
	     */
	     protected $hidden = ['password'];
	}
		-- Or --
	$users = $users->makeHidden(['address', 'phone_number']);

Laravel Relationship's
	One To One 
		=> return $this->hasOne(Phone::class);
		=> return $this->belongsTo(User::class);

	One To Many 
		=> return $this->hasMany(Comment::class);
		=> return $this->belongsTo(Post::class);

	One To Many (Inverse) / Belongs To => 

	Has One Of Many
	Has One Through
	Has Many Through

Have You Integrated any third party APIs
	- https://procoders.tech/blog/how-to-integrate-third-party-api/
	- https://www.emizentech.com/blog/third-party-api-integration.html
	- https://blog.hubspot.com/marketing/third-party-api
	- https://tideways.com/profiler/blog/reliable-integration-with-third-party-apis-in-php
	- https://dev.to/mguinea/how-to-integrate-an-external-api-into-your-php-application-40oh

Laravel http client
	https://laravel.com/docs/9.x/http-client

Laravel How to Connect to Different Databases
	Where to do configuration and How?

array merge and array combine
	- /var/www/html/phpVersions/arrayMap.php

PHP Global Variables - Superglobals
	- Some predefined variables in PHP are "superglobals", which means that they are always accessible, regardless of scope - and you can access them from any function, class or file without having to do anything special.

	- The PHP superglobal variables are:
		$GLOBALS
		$_SERVER
		$_REQUEST
		$_POST
		$_GET
		$_FILES
		$_ENV
		$_COOKIE
		$_SESSION

Get the full URL in PHP
	- $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

The $_REQUEST variable
	- The PHP $_REQUEST variable contains the contents of both $_GET, $_POST, and $_COOKIE. We will discuss $_COOKIE variable when we will explain about cookies.

Important links:
	https://zetcode.com/php/getpostrequest/

JWT Token: (https://jwt.io/introduction)
	Header
	Payload
	Signature

How can you Optimize the Page If it loading Too slow
	- Pagination 
	- DB Question Should be Optimize (select One required columns)
	- Database Indexing: (https://www.tutorialspoint.com/dbms/dbms_indexing.htm)
		There are primarily three methods of indexing: 
			- Clustered Indexing. 
			- Non-Clustered or Secondary Indexing. 
			- Multilevel Indexing.

		https://www.geeksforgeeks.org/indexing-in-databases-set-1/

Concurrency(ಏಕಕಾಲಿಕತೆ) Issues while booking red bus ticket

Idempotent - POST and PATCH
	Idempotent is where you call the same function with the same value and the result is exactly the same, that is the mathematically definition. If you ever update state then you are not idempotent, that its 'a database update' doesn't change anything.

	Link: https://stackoverflow.com/questions/45016234/what-is-idempotency-in-http-methods

firstorfail vs findorfail
    https://stackoverflow.com/questions/33027047/what-is-the-difference-between-find-findorfail-first-firstorfail-get
    https://devnote.in/what-is-the-difference-between-find-findorfail-first-firstorfail-get-list-toarray/

Design patterns in php
	https://refactoring.guru/design-patterns/php

Abstract Class / Concrete Class
	Class abstraction is a way for a class to force any other class that extends it to implement specific methods. The parent class is called an abstract class, the child class we will call a concrete class, and the methods a concrete class must implement are called abstract methods.

Defer and Async Key work In JavaScript
    Defer Keyword In JavaScript
    Async Keyword In JavaScript

    https://www.youtube.com/watch?v=IrHmpdORLu8

PHP closure function: [PHP closure vs callable]
    Link: https://www.codepunker.com/blog/basic-usage-of-closures-in-php#:~:text=Basically%20a%20closure%20in%20PHP,array%20through%20the%20closure%20function.

    => Closures have been introduced in PHP 5.3 and their most important use is for callback functions.
    => Basically a closure in PHP is a function that can be created without a specified name - an anonymous function. Here's a closure function created as the second parameter of array_walk() . By specifying the $v parameter as a reference one can modify each value in the original array through the closure function.

What is the Difference Between absolute path and Relative Path
	https://phpdelusions.net/articles/paths
	So again: an absolute path is one starting from the system root
		Some absolute path examples:

		/var/www/site/forum/index.php
		/img/frame.gif
		C:\windows\command.com

	If you don't supply the root, it means that your path is relative.
		The simplest example of relative path is just a file name, 
			like index.html. 
			./file.php

	Variable						Description
	__FILE__					=> The absolute path and file name of the current script.
	__DIR__						=> The absolute path of the current script.
	$_SERVER["DOCUMENT_ROOT"]	=> The root HTTP folder.
	$_SERVER["PHP_SELF"]		=> Relative path to the script.
	$_SERVER["SCRIPT_FILENAME"]	=> Full path (and filename) to the script.
	DIRECTORY_SEPARATOR			=> This is automatically a forward or backward slash, depending on the system.

How to Convert Php Variable/Value to Javascrip / Jquery Variable
	/var/www/html/InterviewQAndA-Script.php

What is Reflection and how it is working?
    Link: https://www.educba.com/php-reflection/

    => The reflection class is used to get information about the current state of the application. It's called reflection, because it looks at it's self, and can tell you information about the program your running, at run time.

    Very Good Example:
	    https://www.youtube.com/watch?v=3uaPBYG4eeQ

What PHP Standards are you using?
	https://www.tutorialspoint.com/php/php_coding_standard.htm
	Indenting and Line Length
	Control Structures
	Function Calls
	Function Definitions
	Comments
	PHP Code Tags
	Variable Names
	Make Functions Reentrant
	Alignment of Declaration Blocks
	One Statement Per Line
	Short Methods or Functions

Difference between URI and URL
	URI(Uniform Resource Identifier) 
		=> Every "URN" and "URL" is an URI
		=> URI that specify both the Name and the Location is called URI

		=> A URI — short for “Uniform Resource Identifier” — is a sequence of characters that distinguishes one resource from another. 
		=> For example, foo://example.com:8042/over/there?name=ferret#nose is a URI containing a scheme name, authority, path, query and fragment. A URI does not need to contain all these components

		=> A URI — short for “Uniform Resource Identifier” — is a sequence of characters that distinguishes one resource from another. For example, foo://example.com:8042/over/there?name=ferret#nose is a URI containing a scheme name, authority, path, query and fragment. A URI does not need to contain all these components.06-Jan-2021

	URN = Uniform Resource Name (Name)

	URL = Uniform Resource Location (Location)
		=> https://www.google.com/

How can we do Migration(Adding Extra Filed) when we pushed to production Server
	php artisan make:migration add_paid_to_users_table --table=users

	public function up()
	{
	    Schema::table('users', function($table) {
	        $table->integer('paid');
	    });
	}

	public function down()
	{
	    Schema::table('users', function($table) {
	        $table->dropColumn('paid');
	    });
	}

	php artisan migrate

===============================================================

How to use the load balancer?
	Load Balance:
	https://www.youtube.com/watch?v=4j-E1qKbSX0

Laravel how to use Redis

Send a Mail with Symfony components
	Send a mail with Php from Localhost

what is CI/CD Pipline

Learn Apache and NGINX
	Difference between Apache and Nginx
    	Single threaded Or Multi threaded?

Data Structure and Algorithm

What makes PHP Much more faster

Solid Principles
	https://www.freecodecamp.org/news/solid-principles-explained-in-plain-english/
	https://www.digitalocean.com/community/conceptual_articles/s-o-l-i-d-the-first-five-principles-of-object-oriented-design

Yii2 Question and Answers

JavaScript Question and Answers
	https://www.edureka.co/blog/interview-questions/javascript-interview-questions/
	Downloaded PDF File

Question Based On Topics:
	Laravel
	    Later versions of Laravel and its imports
	    Advanced Concepts
	    tinker usage
	    Laravel packages
	    Laravel unit testing

		1. Laravel Service Container / Service Providers / Facades
		2. Laravel Even and Listener
		3. Laravel Queue and Jobs
		4. Laravel Middleware

		5. Laravel Sending Notification and Mail
		6. Laravel Policy

		7. Laravel Artisan
		8. Laravel Eloquent Model(All Relationships)
			One To One
			One To Many
			Many To Many
			Has One Through(ಮೂಲಕ)
			Has Many Through(ಮೂಲಕ)

			One To One (Polymorphic)(ಬಹುರೂಪಿ)
			One To Many (Polymorphic)(ಬಹುರೂಪಿ)
			Many To Many (Polymorphic)(ಬಹುರೂಪಿ)

		9. Laravel DB Query(With All Relationships)

		10. Laravel API's(Passport, Auth, JWT and etc...)
		11. Laravel Testing TDD

		12. Laravel Ecosystem(Forge, Cacher, and etc...)
		13. Laravel VueJs (QandA with Some Sample Laravel Project{just an CRUD})

		14. Laravel Package Development

	Mysql
	    Tricky Mysql Queries
	    Advanced Concepts
	    Database User creation and giving privileges
	    Mysql is multithreaded Or single threated
	    Mysql I need to copy full table as a backup(commend line, and ....)
		Triggers
		View
		Complex Quires / Joins

	Php
	    Php unit testing
	    php is multithreaded Or single threated
	    Php OOP Questions-abstraction,class and Interface  difference, 

	Yii2
	    1.What is the difference Between Basic and Advanced project templates in Yii:
	    2.What is the difference between Yii2 and Laravel
	    3.Core Components Differences
	        tinker/Gii

	AWS: One Hosting setup:
	    AWS Or GCloud

	JavaScript:
	    JavaScript is multithreaded Or single threated

	Docker:

	Apache:
	    Apache is multithreaded Or single threated

	Interviewer Questions and Concerns:
	    1. Project outcome, say for Eg: Google, Facebook

	    2. Record the interview call

Collection
	1. We need to know more about "Lazy Collections" - cursor
	2. Lazy Collection Methods

Controller:
	 1. What is "invokable" __invoke controller

Database:
	1. Connecting To The Database CLI

Difference Mysql/Database - Delete and Truncate

What is the difference between laravel cursor and laravel chunk method?
	https://stackoverflow.com/questions/45464676/what-is-the-difference-between-laravel-cursor-and-laravel-chunk-method


	    


