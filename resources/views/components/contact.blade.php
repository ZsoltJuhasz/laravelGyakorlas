<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->

    <h3>{{$slot}}</h3>

    <!-- <h3>Oldal típus: {{ $title }}</h3> -->

    <h3>Üzenet a komponensből</h3>
    @foreach( $contacts as $contact )
        <h3>{{ $contact }}</h3>
    @endforeach
</div>