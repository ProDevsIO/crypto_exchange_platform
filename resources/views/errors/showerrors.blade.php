@if($errors->any())

    <ul class="alert alert-info" style="list-style: none;width: 100%;">
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
    </ul>

@endif

<div class="flash-message" id="alertdiv" style="width: 100%;">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }} alert-dismissible" style="color: #000;width: 100%;">{!! Session::get('alert-' . $msg)  !!} </p>
        @endif
    @endforeach
</div>