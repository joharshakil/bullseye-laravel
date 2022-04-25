@component('mail::message')

    Hello  <strong> {{$name}} </strong> .
    <br>
    Thank You for registration

    @component('mail::button', ['url' =>  route('login') ])
        Log in to Dashboard
    @endcomponent
    <br>
    <br>
    Thanks,<br>

    {{ config('app.name') }}
@endcomponent
