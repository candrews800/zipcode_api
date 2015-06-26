<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Zipcode API</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <style>
        @media (min-width: 768px) {
            .container {
                max-width: 1200px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation"><a href="{{ url('/') }}">Home</a></li>
                <li role="presentation"><a href="{{ url('/docs') }}">Docs</a></li>
                @if (Auth::guest())
                    <li role="presentation"><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li role="presentation"><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/user') }}">My Account</a></li>
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <h3><a href="{{ url('/') }}">zzipcode api</a></h3>
    </div>

    <div class="row">
        <div class="col-xs-3">
            <div class="panel panel-{{ $page == 'getting-started' ? 'primary' : 'default' }}">
                <div class="panel-heading">
                    <h3 class="panel-title"><a href="{{ url('docs/getting-started') }}">Getting Started</a></h3>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ url('docs/getting-started') }}#register">Registering for API Key</a></li>
                    <li class="list-group-item"><a href="{{ url('docs/getting-started') }}#usage">Usage Limits</a></li>
                    <li class="list-group-item"><a href="{{ url('docs/getting-started') }}#status">Checking Status</a></li>
                </ul>
            </div>

            <div class="panel panel-{{ $page == 'how-to-use' ? 'primary' : 'default' }}">
                <div class="panel-heading">
                    <h3 class="panel-title"><a href="{{ url('docs/how-to-use') }}">How To Use</a></h3>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ url('docs/how-to-use') }}#request-format">Request Format</a></li>
                    <li class="list-group-item"><a href="{{ url('docs/how-to-use') }}#request-example">Request Example</a></li>
                    <li class="list-group-item"><a href="{{ url('docs/how-to-use') }}#response-format">Response Format</a></li>
                    <li class="list-group-item"><a href="{{ url('docs/how-to-use') }}#errors">Errors</a></li>
                </ul>
            </div>

            <div class="panel panel-{{ $page == 'endpoints' ? 'primary' : 'default' }}">
                <div class="panel-heading">
                    <h3 class="panel-title"><a href="{{ url('docs/endpoints') }}">API Endpoints</a></h3>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ url('docs/endpoints') }}#get">get</a></li>
                    <li class="list-group-item"><a href="{{ url('docs/endpoints') }}#near">near</a></li>
                    <li class="list-group-item"><a href="{{ url('docs/endpoints') }}#find">find</a></li>
                    <li class="list-group-item"><a href="{{ url('docs/endpoints') }}#distance">distance</a></li>
                </ul>
            </div>

            <div class="panel panel-{{ $page == 'libraries' ? 'primary' : 'default' }}">
                <div class="panel-heading">
                    <h3 class="panel-title"><a href="{{ url('docs/libraries') }}">API Libraries</a></h3>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ url('docs/libraries') }}#php">PHP</a></li>
                </ul>
            </div>
        </div>
        <div class="col-xs-9">
            @yield('content')
        </div>
    </div>

    <footer class="footer">
        <p>&copy; Zipcode API {{ date('Y') }}</p>
    </footer>

</div> <!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>

@yield('js')