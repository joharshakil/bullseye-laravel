@component('mail::message')
   {{-- <img src="{{asset('logo.png')}}">--}}
    Hello
    <br>
    Thank You for Your Payment

    @component('mail::button', ['url' =>  route('/inoive/'.$invoice->id) ])
        Get Your Inovice
    @endcomponent
   <br>
   <br>
    Thanks,<br>

    {{ config('app.name') }}
@endcomponent
