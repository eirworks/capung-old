<?php
$session_keys = ['success','danger','error', 'warning', 'info'];
?>
@foreach($session_keys as $session_key)
    @if(session()->has($session_key))
        <div class="container">
            <div class="alert alert-{{ $session_key }}">
                {{session($session_key)}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        </div>
    @endif
@endforeach
