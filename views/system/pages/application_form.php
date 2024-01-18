
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of Student Applicant</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-black" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="4%">ID</th>
                                            <th width="7%">Student ID</th>
                                            <th width="25%">Name</th>
                                            <th width="10%">Personal Information</th>
                                            <th width="10%">Educational Background</th>
                                            <th width="10%">Requirements</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM p_information_tbl";
                                        $res = mysqli_query($db->conn, $sql);
                                        if(mysqli_num_rows($res) > 0){
                                            $id = '';
                                            foreach($res as $row){
                                                $id++;
                                                echo '
                                                <tr>
                                                    <td>'.$id.'</td>
                                                    <td>'.$row['user_id'].'</td>
                                                    <td>'.$row['name'].'</td>
                                                    <td><button class="btn btn-info btn-sm btn-perinfo" data-id="'.$row['user_id'].'">Show</button></td>
                                                    <td><button class="btn btn-info btn-sm btn-eduback" data-id="'.$row['user_id'].'">Show</button></td>
                                                    <td><button class="btn btn-info btn-sm btn-req" data-id="'.$row['user_id'].'">Show</button></td>
                                                </tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                <div class="modal fade bd-example-modal-lg" id="informationModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title"><b class="text-black" id="info-title"></b></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body" id="modal-table">
                      </div>
                    </div>
                  </div>
                </div>

                <script>
                    $(document).ready(function(){
                        var dataTable = $('#dataTable').DataTable({
                            paging: false
                        });
                        $('.btn-perinfo').click(function(){
                            var user_id = $(this).data('id');
                            $.ajax({
                                url:'template/application_form_action.php',
                                method:'POST',
                                data:{user_id:user_id, action:'perinfo'},
                                success:function(data){
                                    $('#info-title').html('Personal Information');
                                    $('#modal-table').html(data);
                                    $('#informationModal').modal('show');
                                }
                            });
                        });

                        $('.btn-eduback').click(function(){
                            var user_id = $(this).data('id');
                            $.ajax({
                                url:'template/application_form_action.php',
                                method:'POST',
                                data:{user_id:user_id, action:'eduBack'},
                                success:function(data){
                                    $('#info-title').html('Educational Background');
                                    $('#modal-table').html(data);
                                    $('#informationModal').modal('show');
                                }
                            });
                        });

                        $('.btn-req').click(function(){
                            var user_id = $(this).data('id');
                            $.ajax({
                                url:'template/application_form_action.php',
                                method:'POST',
                                data:{user_id:user_id, action:'req'},
                                success:function(data){
                                    $('#info-title').html('Student Requirements');
                                    $('#modal-table').html(data);
                                    $('#informationModal').modal('show');
                                }
                            });
                        });
                    });
                </script>
                