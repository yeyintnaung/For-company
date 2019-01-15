@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="row">
            <div class="col-xs-10">

                <div class="alert alert-danger" style="padding:4px;">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>

                    <strong>
                        <i class="ace-icon fa fa-times"></i>
                        {{$error}}
                    </strong>

                    <br/>
                </div>
            </div>
        </div>
    @endforeach
@endif