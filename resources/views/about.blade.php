@extends ( "layouts.app" )

@section("title", "Rólunk")

@section("content")
<h1>Rólunk oldal dinamikus</h1>

<x-message type="Hiba" message="Hiba üzenet" :page="$page" />

<x-alert>
    <x-slot name="title">
        Rólunk oldal komponens
    </x-slot>
    Adatok Rólunk
</x-alert>

@endsection