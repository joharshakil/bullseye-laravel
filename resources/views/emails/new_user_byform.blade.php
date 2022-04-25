@component('mail::message')
  {{--<img src="{{asset('logo.png')}}">--}}
  Hello  <strong> {{$name}} </strong>
  <br>
  Welcome In BullsEye
  <br>
  @component('mail::button', ['url' =>  route('login') ])
    Log in to Dashboard
  @endcomponent
  <br>
  <br>
  Your Request Successfully generated Kindly login to continue your process <br>

  Thanks,<br>

#  {{ config('app.name') }}
@endcomponent



