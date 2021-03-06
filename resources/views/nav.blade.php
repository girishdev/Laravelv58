        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- <li class="nav-item"> -->
                            <!-- <a class="nav-link" href="{{ action('HomeController@index') }}">Dasboard</a> -->
                            <!-- <a class="nav-link" href="{{ action([\App\Http\Controllers\HomeController::class, 'index']) }}">Dasboard</a> -->
                        <!-- </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="/readme">Read me</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/laravelfeatures">Laravel Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/customers">Customer List</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="/qanda">Q and A</a>
                        </li>-->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="/userlist">User List</a>
                        </li>-->

                        <div class="dropdown" style="margin-right: 5px;">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Laravel
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/qanda/laravelbasic">Laravel Basic</a>
                                <a class="dropdown-item" href="/qanda/laravelintermediate">Laravel Intermediat</a>
                                <a class="dropdown-item" href="/qanda/laraveladvanced">Laravel Advance</a>
                            </div>
                        </div>
                        <div class="dropdown" style="margin-right: 5px;">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                PHP
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/qanda/phpbasic">PHP Basic</a>
                                <a class="dropdown-item" href="/qanda/phpintermediate">PHP Intermediat</a>
                                <a class="dropdown-item" href="/qanda/phpadvanced">PHP Advance</a>
                            </div>
                        </div>
                        <div class="dropdown" style="margin-right: 5px;">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Mysql
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/qanda/mysqlbasic">Mysql Basic</a>
                                <a class="dropdown-item" href="/qanda/mysqlintermediate">Mysql Intermediat</a>
                                <a class="dropdown-item" href="/qanda/mysqladvanced">Mysql Advance</a>
                            </div>
                        </div>
                        <div class="dropdown" style="margin-right: 5px;">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                JavaScript
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/qanda/javascriptbasic">JavaScript Basic</a>
                                <a class="dropdown-item" href="/qanda/javascriptintermediate">JavaScript Intermediat</a>
                                <a class="dropdown-item" href="/qanda/javascriptadvanced">JavaScript Advance</a>
                            </div>
                        </div>
                        <div class="dropdown" style="margin-right: 5px;">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                AWS
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/qanda/awsbasic">AWS Basic</a>
                                <a class="dropdown-item" href="/qanda/awsintermediate">AWS Intermediat</a>
                                <a class="dropdown-item" href="/qanda/awsadvanced">AWS Advance</a>
                            </div>
                        </div>
                        <div class="dropdown" style="margin-right: 5px;">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                GIT
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/qanda/gitbasic">GIT Basic</a>
                                <a class="dropdown-item" href="/qanda/gitintermediate">GIT Intermediat</a>
                                <a class="dropdown-item" href="/qanda/gitadvanced">GIT Advance</a>
                            </div>
                        </div>
                        <div class="dropdown" style="margin-right: 5px;">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                jQuery
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/qanda/jquerybasic">jQuery Basic</a>
                                <a class="dropdown-item" href="/qanda/jqueryintermediate">jQuery Intermediat</a>
                                <a class="dropdown-item" href="/qanda/jqueryadvanced">jQuery Advance</a>
                            </div>
                        </div>
                        <div class="dropdown" style="margin-right: 5px;">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                AJAX
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/qanda/ajaxbasic">AJAX Basic</a>
                                <a class="dropdown-item" href="/qanda/ajaxintermediate">AJAX Intermediat</a>
                                <a class="dropdown-item" href="/qanda/ajaxadvanced">AJAX Advance</a>
                            </div>
                        </div> <!-- -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
