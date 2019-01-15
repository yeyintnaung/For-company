@if(\Illuminate\Support\Facades\Session::has('success'))
    <div class="note note-success">
        <h4 class="block">Successful</h4>

        <p> Your company was successfully {{\Illuminate\Support\Facades\Session::get('success')}}

        </p>
    </div>
@endif
@if(\Illuminate\Support\Facades\Session::has('msg_delete'))
    <div class="note note-success">
        <h4 class="block">Successful</h4>

        <p>  {{\Illuminate\Support\Facades\Session::get('msg_delete')}}

        </p>
    </div>
@endif
@if(\Illuminate\Support\Facades\Session::has('email'))
    <div class="note note-success">
        <h4 class="block">Successful</h4>

        <p> Your Message Was Successfully  {{\Illuminate\Support\Facades\Session::get('email')}}

        </p>
    </div>
@endif