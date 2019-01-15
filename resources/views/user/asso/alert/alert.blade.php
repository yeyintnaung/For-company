@if(\Illuminate\Support\Facades\Session::has('join'))
    <div class="note note-success">
        <h4 class="block">Successful</h4>

        <p>  {{\Illuminate\Support\Facades\Session::get('join')}}

        </p>
    </div>
@endif
@if(\Illuminate\Support\Facades\Session::has('activity'))
    <div class="note note-success">
        <h4 class="block">Successful</h4>

        <p>  {{\Illuminate\Support\Facades\Session::get('activity')}}

        </p>
    </div>
@endif