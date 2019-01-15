

    <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover"	id="dataTables-example">
                                    <thead>
                                      <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $count=1; ?>
                                      @foreach($datas as $data)
                                      <tr>
                                        <td><?php echo $count;$count +=1; ?></td>
                                        <td>{{$data->name}}</td>
                                        <td><a href="countries/delete/{{$data->id}}" class="btn btn-danger">Delete</a> </td>
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
