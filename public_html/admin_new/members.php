<style type="text/css">
    .sidebar-light .sidebar-brand {
    color: #000000;
    background-color: #ffffff;
}
</style>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Bookings</li>
    </ol>
</div>

<!-- Row -->
          <div class="row">
            
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Bookings </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover" style="font-size:10px">
                    <thead class="thead-light">
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Registeration</th>
                        <th>Membership</th>
                        <th>Wallet</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                          arsort($members);
                          foreach ($members as $key => $value) {
                              
                              ?>


                      <tr >
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['mobile']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td><?php echo ($value['active']==1)?'<span class="text-success">Yes</span>':'<span class="text-danger">No</span>'; ?></td>
                        <td><?php echo ($value['membership']==1)?'<span class="text-success">Yes</span>':'<span class="text-danger">No</span>'; ?></td>
                        <td style="display: flex;justify-content: space-between;width: 70px;">
                            
                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                    data-target="#exampleModalScrollable" id="memberinfo" data-id="<?php echo $value['id']; ?>"><i class="fas fa-info-circle"></i></a>
                            <?php
                             if($value['active']==1){
                                 ?>
                                <a href="#" class="btn btn-danger btn-sm inactive" data-id="<?php echo $value['id']; ?>"><i class="fas fa-window-close"></i></a>     
                             <?php
                             }else{
                                 ?>
                                <a href="#" class="btn btn-success btn-sm activate" data-id="<?php echo $value['id']; ?>"><i class="fas fa-check"></i></a> 
                            <?php
                             }
                            ?>
                             
                        </td>
                      </tr>
                      <?php
                          }
                         ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->