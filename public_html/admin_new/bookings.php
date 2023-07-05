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
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover" style="font-size: 10px">
                    <thead class="thead-light">
                      <tr>
                        <th>Id</th>
                        <th>Service</th>
                        <th>M.Name</th>
                        <th>Mobile</th>
                        <th>date</th>
                        <th>Total amount</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                          arsort($bookings);
                          foreach ($bookings as $key => $value) {
                              
                              ?>


                      <tr style="<?php echo ($value['status']==0)?'background: #aa0000;color: #fff':'background: green;color: #fff'; ?>">
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['servicename']; ?></td>
                        <td><?php echo $value['membername']; ?></td>
                        <td><?php echo $value['mobile']; ?></td>
                        <td><?php echo $value['date']; ?></td>
                        <td><?php echo $value['servicecharge']; ?></td>
                        <td style="display: flex;justify-content: space-between;">
                            <a href="#" class="btn btn-success btn-sm" id="confirmbooking" data-id="<?php echo $value['id']; ?>"><i class="fas fa-check"></i></a>
                            <a href="#" class="btn btn-warning btn-sm" id="bookinginfo" data-toggle="modal"
                    data-target="#exampleModalScrollable" data-id="<?php echo $value['id']; ?>"><i class="fas fa-info-circle"></i></a>
                            <a href="#" class="btn btn-danger btn-sm" id="rejectbooking" data-id="<?php echo $value['id']; ?>"><i class="fas fa-trash"></i></a>
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