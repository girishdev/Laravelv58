-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: Laravel58Coders
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'ABC Company','123-123-1234','2022-06-21 18:47:20','2022-06-21 18:47:20');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,1,'Girish kumar','girishkumar.aorg@gmail.com',1,'2022-06-21 18:47:33','2022-06-21 18:47:33'),(2,1,'kumar','kumar04091990@gmail.com',1,'2022-06-22 02:08:03','2022-06-22 02:08:03');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2022_06_14_112532_create_customers_table',1),(4,'2022_06_15_231600_create_companies_table',1),(5,'2022_06_21_134655_create_qand_a_s_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qand_a_s`
--

DROP TABLE IF EXISTS `qand_a_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qand_a_s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qtype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qand_a_s`
--

LOCK TABLES `qand_a_s` WRITE;
/*!40000 ALTER TABLE `qand_a_s` DISABLE KEYS */;
INSERT INTO `qand_a_s` VALUES (6,'Laravel','Basic','How to put Laravel applications in maintenance mode?','<p>Maintenance mode is used to put a maintenance page to customers and under the hood, we can do software updates, bug fixes, etc. Laravel applications can be put into maintenance mode using the below command:</p><p>php artisan down</p><p>And can put the application again on live using the below command:</p><p>php artisan up</p><p>Also, it is possible to access the website in maintenance mode by whitelisting particular IPs.</p>','https://www.youtube.com/watch?v=yCQKYlZnszs','2022-06-21 20:13:31','2022-06-22 07:54:27'),(7,'Laravel','Basic','What are the default route files in Laravel?','Below are the four default route files in the routes folder in Laravel:\r\nweb.php - For registering web routes.\r\napi.php - For registering API routes.\r\nconsole.php - For registering closure-based console commands.\r\nchannel.php - For registering all your event broadcasting channels that your\r\napplication supports.',NULL,'2022-06-21 20:15:15','2022-06-21 20:15:15'),(8,'Laravel','Basic','What are the default route files in Laravel?','<p>Below are the four default route files in the routes folder in Laravel:<br>&nbsp;</p><ul><li>web.php - For registering web routes.</li><li>api.php - For registering API routes.</li><li>console.php - For registering closure-based console commands.</li><li>channel.php - For registering all your event broadcasting channels that your<br>application supports.</li></ul>','https://laravel.com/docs/9.x/validation','2022-06-21 20:49:10','2022-06-21 20:49:10'),(9,'Php','Basic','what is the latest version of php','<p>The latest PHP version currently is <a href=\"https://stitcher.io/blog/new-in-php-74\">PHP 7.4</a>.</p>','https://stitcher.io/blog/the-latest-php-version','2022-06-22 01:09:46','2022-06-22 01:09:46'),(10,'Php','Intermediate','Abstract Classes in PHP','<p>Abstract classes are the classes in which at least one method is abstract. Unlike C++ abstract classes in PHP are declared with the help of abstract keyword. Use of abstract classes are that all base classes implementing this class should give implementation of abstract methods declared in parent class. An abstract class can contain abstract as well as non abstract methods.</p><p>&nbsp;</p><p>&lt;?php</p><p>&nbsp;// Abstract class example in PHP</p><p>abstract class base {</p><p>&nbsp;&nbsp;&nbsp; // This is abstract function</p><p>&nbsp;&nbsp;&nbsp; abstract function printdata();</p><p>&nbsp;&nbsp;&nbsp; // This is not abstract function</p><p>&nbsp;&nbsp;&nbsp; function pr() {</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; echo \"Base class\";</p><p>&nbsp;&nbsp;&nbsp; }</p><p>}</p><p>?&gt;</p>','https://www.geeksforgeeks.org/abstract-classes-in-php/','2022-06-22 01:12:53','2022-06-22 01:12:53'),(11,'Laravel','Basic','What is Laravel Framework?','<p>Laravel is an open-source PHP web application framework. It is a very well documented, expressive, and easy to learn framework. Laravel is very developer-friendly as the framework can help beginners as well as advanced users. As you grow as a developer you can go more deep into Laravel functionalities and give more robust and enterprise solutions.</p><p>Additionally, the framework is very scalable as you can use packages like Vapor to handle hundreds of thousands of requests using AWS serverless technology.</p><p>This article will walk you through basic Laravel interview questions to advanced questions.</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 07:37:50','2022-06-22 07:37:50'),(12,'Laravel','Basic','1. What is the latest Laravel version?','<p>The latest Laravel version is 9.x</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 07:40:04','2022-06-22 07:40:04'),(13,'Laravel','Basic','Define Composer.','<p>Composer is the package manager for the framework. It helps in adding new packages from the huge community into your laravel application.</p><p>For example, one of the most used packages for authentication will be Passport, for including that into your project, you can run the below command on your terminal:</p><p>composer requires laravel/passport<br>It generates a file(composer.json) in your project directory to keep track of all your packages. A default composer.json file of your laravel project will look something like below:</p><p>{<br>&nbsp; &nbsp;\"name\": \"laravel/laravel\",<br>&nbsp; &nbsp;\"type\": \"project\",<br>&nbsp; &nbsp;\"description\": \"The Laravel Framework.\",<br>&nbsp; &nbsp;\"keywords\": [<br>&nbsp; &nbsp; &nbsp; &nbsp;\"framework\",<br>&nbsp; &nbsp; &nbsp; &nbsp;\"laravel\"<br>&nbsp; &nbsp;],<br>&nbsp; &nbsp;\"license\": \"MIT\",<br>&nbsp; &nbsp;\"require\": {<br>&nbsp; &nbsp; &nbsp; &nbsp;\"php\": \"^7.3|^8.0\",<br>&nbsp; &nbsp; &nbsp; &nbsp;\"fideloper/proxy\": \"^4.4\",<br>&nbsp; &nbsp; &nbsp; &nbsp;\"fruitcake/laravel-cors\": \"^2.0\",<br>&nbsp; &nbsp; &nbsp; &nbsp;\"guzzlehttp/guzzle\": \"^7.0.1\",<br>&nbsp; &nbsp; &nbsp; &nbsp;\"laravel/framework\": \"^8.12\",<br>&nbsp; &nbsp; &nbsp; &nbsp;\"laravel/tinker\": \"^2.5\"<br>&nbsp; &nbsp;},<br>&nbsp; &nbsp;\"require-dev\": {<br>&nbsp; &nbsp; &nbsp; &nbsp;\"facade/ignition\": \"^2.5\",<br>&nbsp; &nbsp; &nbsp; &nbsp;\"fakerphp/faker\": \"^1.9.1\",<br>&nbsp; &nbsp; &nbsp; &nbsp;\"laravel/sail\": \"^1.0.1\",<br>&nbsp; &nbsp; &nbsp; &nbsp;\"mockery/mockery\": \"^1.4.2\",<br>&nbsp; &nbsp; &nbsp; &nbsp;\"nunomaduro/collision\": \"^5.0\",<br>&nbsp; &nbsp; &nbsp; &nbsp;\"phpunit/phpunit\": \"^9.3.3\"<br>&nbsp; &nbsp;}<br>}<br>The “require” and “require-dev” keys in composer.json specify production and dev packages and their version constraints respectively.</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 07:41:30','2022-06-22 18:32:15'),(14,'Laravel','Basic','What is the templating engine used in Laravel?','<p>The templating engine used in Laravel is <strong>Blade</strong>. The blade gives the ability to use its mustache-like syntax with the plain PHP and gets compiled into plain PHP and cached until any other change happens in the blade file. The blade file has .blade.php extension</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 07:42:26','2022-06-22 07:42:26'),(15,'Laravel','Basic','What are available databases supported by Laravel?','<p>The supported databases in laravel are:</p><ul><li>PostgreSQL</li><li>SQL Server</li><li>SQLite</li><li>MySQL</li></ul>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 07:42:53','2022-06-22 07:42:53'),(16,'Laravel','Basic','What is an artisan?','<p>Artisan is the command-line tool for Laravel to help the developer build the application. You can enter the below command to get all the available commands:</p><p>PHP artisan list: Artisan command can help in creating the files using the make command. Some of the useful make commands are listed below:</p><p>php artisan make:controller - Make Controller file</p><p>php artisan make:model - Make a Model file</p><p>php artisan make:migration - Make Migration file</p><p>php artisan make:seeder - Make Seeder file</p><p>php artisan make:factory - Make Factory file</p><p>php artisan make:policy - Make Policy file</p><p>php artisan make:command - Make a new artisan command</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 07:43:22','2022-06-22 07:43:22'),(17,'Laravel','Basic','How to define environment variables in Laravel?','<p>The environment variables can be defined in the .env file in the project directory. A brand new laravel application comes with a .env.example and while installing we copy this file and rename it to .env and all the environment variables will be defined here.</p><p>Some of the examples of environment variables are APP_ENV, DB_HOST, DB_PORT, etc.</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 07:44:28','2022-06-22 07:44:28'),(18,'Laravel','Basic','Can we use Laravel for Full Stack Development (Frontend + Backend)?','<p>Laravel is the best choice to make progressive, scalable full-stack web applications. Full-stack web applications can have a backend in laravel and the frontend can be made using blade files or SPAs using Vue.js as it is provided by default. But it can also be used to just provide rest APIs to a SPA application.</p><p>Hence, Laravel can be used to make full-stack applications or just the backend APIs only.</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 07:53:33','2022-06-22 07:53:33'),(19,'Laravel','Basic','What are migrations in Laravel?','<p>In simple, Migrations are used to create database schemas in Laravel. In migration files, we store which table to create, update or delete.</p><p>Each migration file is stored with its timestamp of creation to keep track of the order in which it was created. As migrations go up with your code in GitHub, GitLab, etc, whenever anyone clones your project they can run `PHP artisan migrate` to run those migrations to create the database in their environment. A normal migration file looks like below:</p><p>&lt;?php</p><p>use Illuminate\\Database\\Migrations\\Migration;<br>use Illuminate\\Database\\Schema\\Blueprint;<br>use Illuminate\\Support\\Facades\\Schema;</p><p>class CreateUsersTable extends Migration<br>{<br>&nbsp; &nbsp;/**<br>&nbsp; &nbsp; * Run the migrations.<br>&nbsp; &nbsp; *<br>&nbsp; &nbsp; * @return void<br>&nbsp; &nbsp; */<br>&nbsp; &nbsp;public function up()<br>&nbsp; &nbsp;{<br>&nbsp; &nbsp; &nbsp; &nbsp;Schema::create(\'users\', function (Blueprint $table) {<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$table-&gt;id();<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$table-&gt;string(\'name\');<br>&nbsp; &nbsp; &nbsp; // Create other columns<br>&nbsp; &nbsp; &nbsp; &nbsp;});<br>&nbsp; &nbsp;}</p><p>&nbsp; &nbsp;/**<br>&nbsp; &nbsp; * Reverse the migrations.<br>&nbsp; &nbsp; *<br>&nbsp; &nbsp; * @return void<br>&nbsp; &nbsp; */<br>&nbsp; &nbsp;public function down()<br>&nbsp; &nbsp;{<br>&nbsp; &nbsp; &nbsp; &nbsp;Schema::dropIfExists(\'users\');<br>&nbsp; &nbsp;}<br>}</p><p>The up() method runs when we run `php artisan migrate` and down() method runs when we run `php artisan migrate:rollback`.</p><p>If we rollback, it only rolls back the previously run migration.</p><p>If we want to rollback all migrations, we can run \'php artisan migrate:reset`.</p><p>If we want to rollback and run migrations, we can run `PHP artisan migrate:refresh`, and we can use `PHP artisan migrate:fresh` to drop the tables first and then run migrations from the start.</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 07:59:29','2022-06-22 08:00:28'),(20,'Laravel','Basic','What are seeders in Laravel?','<p>Seeders in Laravel are used to put data in the database tables automatically. After running migrations to create the tables, we can run `php artisan db:seed` to run the seeder to populate the database tables.</p><p>We can create a new Seeder using the below artisan command:</p><p>php artisan make:seeder [className]</p><p>It will create a new Seeder like below:</p><p>&lt;?php</p><p>use App\\Models\\Auth\\User;<br>use Illuminate\\Database\\Eloquent\\Model;<br>use Illuminate\\Database\\Seeder;</p><p>class UserTableSeeder extends Seeder<br>{<br>&nbsp; &nbsp;/**<br>&nbsp; &nbsp; * Run the database seeds.<br>&nbsp; &nbsp; */<br>&nbsp; &nbsp;public function run()<br>&nbsp; &nbsp;{<br>&nbsp; &nbsp; &nbsp; &nbsp;factory(User::class, 10)-&gt;create();<br>&nbsp; &nbsp;}<br>}<br>The run() method in the above code snippet will create 10 new users using the User factory.</p><p>Factories will be explained in the next question.</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 08:01:40','2022-06-22 08:01:40'),(21,'Laravel','Basic','What are factories in Laravel?','<p>Factories are a way to put values in fields of a particular model automatically. Like, for testing when we add multiple fake records in the database, we can use factories to generate a class for each model and put data in fields accordingly. Every new laravel application comes with database/factories/UserFactory.php which looks like below:</p><p>&lt;?php</p><p>namespace Database\\Factories;</p><p>use App\\Models\\User;<br>use Illuminate\\Database\\Eloquent\\Factories\\Factory;<br>use Illuminate\\Support\\Str;</p><p>class UserFactory extends Factory<br>{<br>&nbsp; /**<br>&nbsp; &nbsp;* The name of the factory\'s corresponding model.<br>&nbsp; &nbsp;*<br>&nbsp; &nbsp;* @var string<br>&nbsp; &nbsp;*/<br>&nbsp; protected $model = User::class;</p><p>&nbsp; /**<br>&nbsp; &nbsp;* Define the model\'s default state.<br>&nbsp; &nbsp;*<br>&nbsp; &nbsp;* @return array<br>&nbsp; &nbsp;*/<br>&nbsp; public function definition()<br>&nbsp; {<br>&nbsp; &nbsp; &nbsp; return [<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \'name\' =&gt; $this-&gt;faker-&gt;name,<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \'email\' =&gt; $this-&gt;faker-&gt;unique()-&gt;safeEmail,<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \'email_verified_at\' =&gt; now(),<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \'password\' =&gt; \'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi\', // password<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \'remember_token\' =&gt; Str::random(10),<br>&nbsp; &nbsp; &nbsp; ];<br>&nbsp; }<br>}<br>We can create a new factory using php artisan make:factory UserFactory --class=User.</p><p>The above command will create a new factory class for the User model. It is just a class that extends the base Factory class and makes use of the Faker class to generate fake data for each column. With the combination of factory and seeders, we can easily add fake data into the database for testing purposes.</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 08:42:24','2022-06-22 08:42:24'),(22,'Laravel','Basic','How to implement soft delete in Laravel?','<p>Soft Delete means when any data row is deleted by any means in the database, we are not deleting the data but adding a timestamp of deletion.</p><p>We can add soft delete features by adding a trait in the model file like below.</p><p>use Illuminate\\Database\\Eloquent\\Model;<br>use Illuminate\\Database\\Eloquent\\SoftDeletes;</p><p>class Post extends Model {</p><p>&nbsp; &nbsp;use SoftDeletes;</p><p>&nbsp; &nbsp;protected $table = \'posts\';</p><p>&nbsp; &nbsp;// ...<br>}</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 08:43:14','2022-06-22 08:43:14'),(23,'Laravel','Basic','What are Models?','<p>With Laravel, each database table can have a model representation using a model file which can be used to interact with that table using Laravel Eloquent ORM.</p><p>We can create a model using this artisan command:</p><p>php artisan make:model Post</p><p>This will create a file in the models’ directory and will look like below:</p><p>class Post extends Model<br>{<br>&nbsp; &nbsp;/**<br>&nbsp; &nbsp; * The attributes that are mass assignable.<br>&nbsp; &nbsp; *<br>&nbsp; &nbsp; * @var array<br>&nbsp; &nbsp; */<br>&nbsp; &nbsp;protected $fillable = [];</p><p>&nbsp; &nbsp;/**<br>&nbsp; &nbsp; * The attributes that should be hidden for arrays.<br>&nbsp; &nbsp; *<br>&nbsp; &nbsp; * @var array<br>&nbsp; &nbsp; */<br>&nbsp; &nbsp;protected $hidden = [];<br>}<br>A Model can have properties like table, fillable, hidden, etc which defines properties of the table and model.</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 08:43:58','2022-06-22 08:43:58'),(24,'Laravel','Advanced','What are Relationships in Laravel?','<p>Relationships in Laravel are a way to define relations between different models in the applications. It is the same as relations in relational databases.</p><p>Different relationships available in Laravel are:</p><p>One to One<br>One to Many<br>Many to Many<br>Has One Through<br>Has Many Through<br>One to One (Polymorphic)<br>One to Many (Polymorphic)<br>Many to Many (Polymorphic)<br>Relationships are defined as a method on the model class. An example of One to One relation is shown below.</p><p>&lt;?php</p><p>namespace App\\Models;</p><p>use Illuminate\\Database\\Eloquent\\Model;</p><p>class User extends Model<br>{<br>&nbsp; &nbsp;/**<br>&nbsp; &nbsp; * Get the phone associated with the user.<br>&nbsp; &nbsp; */<br>&nbsp; &nbsp;public function phone()<br>&nbsp; &nbsp;{<br>&nbsp; &nbsp; &nbsp; &nbsp;return $this-&gt;hasOne(Phone::class);<br>&nbsp; &nbsp;}<br>}<br>The above method phone on the User model can be called like : `$user-&gt;phone` or `$user-&gt;phone()-&gt;where(...)-&gt;get()`.</p><p>We can also define One to Many relationships like below:</p><p>&lt;?php</p><p>namespace App\\Models;</p><p>use Illuminate\\Database\\Eloquent\\Model;</p><p>class User extends Model<br>{<br>&nbsp; &nbsp;/**<br>&nbsp; &nbsp; * Get the addresses for the User.<br>&nbsp; &nbsp; */<br>&nbsp; &nbsp;public function addresses()<br>&nbsp; &nbsp;{<br>&nbsp; &nbsp; &nbsp; &nbsp;return $this-&gt;hasMany(Address::class);<br>&nbsp; &nbsp;}<br>}<br>Since a user can have multiple addresses, we can define a One to Many relations between the User and Address model. Now if we call `$user-&gt;addresses`, eloquent will make the join between tables and it will return the result.</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 08:45:08','2022-06-22 08:45:08'),(25,'Laravel','Advanced','What is Eloquent in Laravel?','<p>Eloquent is the ORM used to interact with the database using Model classes. It gives handy methods on class objects to make a query on the database.</p><p>It can directly be used to retrieve data from any table and run any raw query. But in conjunction with Models, we can make use of its various methods and also make use of relationships and attributes defined on the model.</p><p>Some examples of using the Eloquent are below:</p><ul><li>`DB::table(‘users’)-&gt;get()`</li><li>`User::all()`</li><li>`User::where(‘name’, ‘=’, ‘Eloquent’)-&gt;get()`</li></ul>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 08:45:55','2022-06-22 08:45:55'),(26,'Laravel','Advanced','What is throttling and how to implement it in Laravel?','<p>Throttling is a process to rate-limit requests from a particular IP. This can be used to prevent DDOS attacks as well. For throttling, Laravel provides a middleware that can be applied to routes and it can be added to the global middlewares list as well to execute that middleware for each request.</p><p>Here’s how you can add it to a particular route:</p><p>Route::middleware(\'auth:api\', \'throttle:60,1\')-&gt;group(function () {<br>&nbsp; &nbsp;Route::get(\'/user\', function () {<br>&nbsp; &nbsp; &nbsp; &nbsp;//<br>&nbsp; &nbsp;});<br>});<br>This will enable the /user route to be accessed by a particular user from a particular IP only 60 times in a minute.</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 08:46:55','2022-06-22 08:46:55'),(27,'Laravel','Advanced','What are facades?','<p>Facades are a way to register your class and its methods in Laravel Container so they are available in your whole application after getting resolved by Reflection.</p><p>The main benefit of using facades is we don’t have to remember long class names and also don’t need to require those classes in any other class for using them. It also gives more testability to the application.</p><p>The below image could help you understand why Facades are used for:</p><p>&nbsp;</p><p>&nbsp;</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 08:48:02','2022-06-22 08:48:02'),(28,'Laravel','Advanced','What are Events in Laravel?','<p>In Laravel, Events are a way to subscribe to different events that occur in the application. We can make events to represent a particular event like user logged in, user logged out, user-created post, etc. After which we can listen to these events by making Listener classes and do some tasks like, user logged in then make an entry to audit logger of application.</p><p>For creating a new Event in laravel, we can call below artisan command:</p><p>php artisan make:event UserLoggedIn</p><p>This will create a new event class like below:</p><p>&lt;?php</p><p>namespace App\\Events;</p><p>use App\\Models\\User;<br>use Illuminate\\Broadcasting\\InteractsWithSockets;<br>use Illuminate\\Foundation\\Events\\Dispatchable;<br>use Illuminate\\Queue\\SerializesModels;</p><p>class UserLoggedIn<br>{<br>&nbsp; &nbsp;use Dispatchable, InteractsWithSockets, SerializesModels;</p><p>&nbsp; &nbsp;/**<br>&nbsp; &nbsp; * The user instance.<br>&nbsp; &nbsp; *<br>&nbsp; &nbsp; * @var \\App\\Models\\User<br>&nbsp; &nbsp; */<br>&nbsp; &nbsp;public $user;</p><p>&nbsp; &nbsp;/**<br>&nbsp; &nbsp; * Create a new event instance.<br>&nbsp; &nbsp; *<br>&nbsp; &nbsp; * @param &nbsp;\\App\\Models\\User &nbsp;$user<br>&nbsp; &nbsp; * @return void<br>&nbsp; &nbsp; */<br>&nbsp; &nbsp;public function __construct(User $user)<br>&nbsp; &nbsp;{<br>&nbsp; &nbsp; &nbsp; &nbsp;$this-&gt;user = $user;<br>&nbsp; &nbsp;}<br>}<br>For this event to work, we need to create a listener as well. We can create a listener like this:</p><p>php artisan make:listener SetLogInFile --event=UserLoggedIn</p><p>The below resultant listener class will be responsible to handle when the UserLoggedIn event is triggered.</p><p>use App\\Events\\UserLoggedIn;</p><p>class SetLogInFile<br>{<br>&nbsp; &nbsp;/**<br>&nbsp; &nbsp; * Handle the given event.<br>&nbsp; &nbsp; *<br>&nbsp; &nbsp; * @param &nbsp;\\App\\Events\\UserLoggedIn<br>&nbsp; &nbsp; * @return void<br>&nbsp; &nbsp; */<br>&nbsp; &nbsp;public function handle(UserLoggedIn $event)<br>&nbsp; &nbsp;{<br>&nbsp; &nbsp; &nbsp; &nbsp;//<br>&nbsp; &nbsp;}<br>}</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 08:49:07','2022-06-22 08:49:07'),(29,'Laravel','Advanced','Explain logging in Laravel?','<p>Laravel Logging is a way to log information that is happening inside an application. Laravel provides different channels for logging like file and slack. Log messages can be written on to multiple channels at once as well.</p><p>We can configure the channel to be used for logging in to our environment file or in the config file at config/logging.php</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 08:50:16','2022-06-22 08:50:16'),(30,'Laravel','Intermediate','What is Localization in Laravel?','<p>Localization is a way to serve content concerning the client\'s language preference. We can create different localization files and use a laravel helper method like this: `__(‘auth.error’)` to retrieve translation in the current locale. These localization files are located in the resources/lang/[language] folder.</p>','https://www.interviewbit.com/laravel-interview-questions/','2022-06-22 08:50:48','2022-06-24 01:31:11'),(31,'AWS','Basic','What is EC2?','<p>EC2, a Virtual Machine in the cloud on which you have OS-level control. You can run this cloud server whenever you want and can be used when you need to deploy your own servers in the cloud, similar to your on-premises servers, and when you want to have full control over the choice of hardware and the updates on the machine.</p>','https://www.interviewbit.com/aws-interview-questions/','2022-06-24 07:38:32','2022-06-24 07:38:32');
/*!40000 ALTER TABLE `qand_a_s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-24 20:54:11
