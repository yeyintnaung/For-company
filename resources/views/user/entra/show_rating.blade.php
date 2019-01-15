@extends('layouts.dashboard')

@section('content')

        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <a href="#" class="list-name">Home</a> <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="list-name">Rating detail</span>
                        </li>
                    </ul>
                </div>

                @include('user.entra.alert.alert')
                <h1 class="page-title page_title">
                    Rating for your company!
                </h1>

                @if(sizeof($data) == 0)
                    <h4 class="alert alert-info">There is no rating currently</h4>

                @else
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <!-- Advanced Tables -->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Table
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover"	id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Name</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $count=1; ?>

                                            @foreach($data as $d)
                                                <tr>
                                                    <td class="text-center"><?php echo $count; $count+=1; ?></td>
                                                    <td>
                                                        <?php
                                                            $name = DB::table('users')->where('id', $d->from_user)->first()->name;
                                                        ?>
                                                        {{$name}}
                                                    </td>
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
                @endif

            </div>
        </div>

@endsection