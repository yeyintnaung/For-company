@extends('layout.master')
@section('title','Members')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Admin and Operation Members Table
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center"> Edited By </th>
                                <th class="text-center"> Edit Link </th>
                                <th class="text-center"> Edit News/Tenders </th>
                                <th class="text-center"> Status </th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $count=1; ?>
                                @foreach($data as $d)
                                    <tr>
                                        <td class="text-center"> <?php echo $count; $count+=1; ?> </td>
                                        <td>  
                                            <?php
                                                 $name = DB::table('admin')->where('id', $d->op_id)->first()->name;
                                            ?>
                                            {{ $name }}
                                        </td>
                                        <td>  
                                            @if($d->main == 'news')
                                                <?php
                                                    if($d->status != 'delete')
                                                        $title = DB::table('news')->where('id', $d->edit_id)->first()->title;
                                                    else
                                                        $title = DB::table('op_edit')->where('edit_id', $d->edit_id)->first()->title;
                                                    // switch ($d->status) {
                                                    //     case 'add':
                                                    //         $link = 'news/view/';
                                                    //         break;
                                                        
                                                    //     default:
                                                    //         $link = 'Not Found!';
                                                    //         break;
                                                    // }
                                                ?>
                                                <!-- <a href="{{ url($d->edit_id) }}"> {{ $title }} </a> -->

                                                @if($d->status == 'delete')
                                                        <a href=""> {{$title}} </a>
                                                @else
                                                    <a href="{{ url('news/view/'.$d->edit_id) }}"> {{ $title }} </a>
                                                @endif

                                            @else
                                                <?php
                                                    if($d->status != 'delete')
                                                        $title = DB::table('tender')->where('id', $d->edit_id)->first()->title;
                                                    else
                                                        $title = DB::table('op_edit')->where('edit_id', $d->edit_id)->first()->title;
                                                ?>

                                                @if($d->status == 'delete')
                                                    <a href=""> {{$title}} </a>
                                                @else
                                                    <a href="{{ url('tenders/view/'.$d->edit_id) }}"> {{ $title }} </a>
                                                @endif

                                            @endif
                                        </td>
                                        <td class="text-center"> {{ $d->main }} </td>
                                        <td class="text-center"> {{ $d->status }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
@endsection
