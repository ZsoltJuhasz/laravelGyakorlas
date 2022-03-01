@extends("templates.top-header")

<h1>Admin rólunk oldal</h1>

{{ print_r( $names ) }}

@foreach( $names as $name )
    <h3>{{ $name }}</h3>
@endforeach

