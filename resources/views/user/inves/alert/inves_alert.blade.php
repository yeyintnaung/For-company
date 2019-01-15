@if(\Illuminate\Support\Facades\Session::has('activity'))
    <div class="note note-success">
        <h4 class="block">Successful</h4>

        <p>Your Activity was successfully {{\Illuminate\Support\Facades\Session::get('activity')}}

        </p>
    </div>
@endif