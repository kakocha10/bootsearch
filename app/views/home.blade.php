@extends("layout")
@section("content")

<div class="header">
    Welcome back, {{ Auth::user()->username }}!<br />
</div>

<div class="content">
    <h1>Squirrel Info</h1>
    <p>This is our super red squirrel information page.</p>
    <p>Be careful, the grey squirrels are watching.</p>
</div>
@stop
@section("footer")
    @parent
    <script src="//polyfill.io"></script>
@stop