@component('mail::message')
    {{--<img src="{{asset('logo.png')}}">--}}
    Hello  <strong> {{$name}} </strong>
    <br>
    Welcome In BullsEye
    <br>
    @component('mail::button', ['url' =>  route('login') ])
        Log in to Dashboard
    @endcomponent
<p> Your Request Successfully Schdule kindly login to view </p> <br>
    <br>  <br>

    <p>
    Thanks,
    </p>
        <br>

     {{ config('app.name') }}
@endcomponent



