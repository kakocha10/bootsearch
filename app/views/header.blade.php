@section("header")
    <div class="header">
        <div class="container">
            <h1 style="float:left;">Tutorial</h1>
            <span style="float:right;">
            @if (Auth::check())
                {{ HTML::link('logout', 'Logout') }}
                |
                <a href="{{ URL::to("/home") }}">
                    profile
                </a>
            @else
                {{ Form::open(array('url' => 'login')) }}
                    <!-- username field -->
                    {{ Form::label('username', 'Username') }}
                    {{ Form::text('username') }}
                
                    <!-- password field -->
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password') }}
                
                    <!-- submit button -->
                    {{ Form::submit('Login') }}
                {{ Form::close() }}
            @endif
            </span>
        </div>
    </div>
@show