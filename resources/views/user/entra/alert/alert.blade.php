@if(\Illuminate\Support\Facades\Session::has('success'))
    <div class="note note-success">
        <h4 class="block">Successful</h4>

        <p> Your company was successfully {{\Illuminate\Support\Facades\Session::get('success')}}

        </p>
    </div>
@endif
@if(\Illuminate\Support\Facades\Session::has('project'))
    <div class="note note-success">
        <h4 class="block">Successful</h4>

        <p> Your project was successfully {{\Illuminate\Support\Facades\Session::get('project')}}

        </p>
    </div>
@endif
@if(\Illuminate\Support\Facades\Session::has('send'))
    <div class="note note-success">
        <h4 class="block">Successful</h4>

        <p> Successfully Send

        </p>
    </div>
@endif
@if(\Illuminate\Support\Facades\Session::has('need_to_register'))
    <div class="note note-success">
        <h4 class="block">Notice</h4>

        <p> {{\Illuminate\Support\Facades\Session::get('need_to_register')}}

        </p>
    </div>
@endif
@if(\Illuminate\Support\Facades\Session::has('empty'))
    <div class="note note-danger">
        <h4 class="block">Empty</h4>

        <p> No Data for your searching

        </p>
    </div>
@endif