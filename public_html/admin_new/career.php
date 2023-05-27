<style type="text/css">
  
</style>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Career</li>
    </ol>
</div>

<!-- Row -->
          <div class="row">
            
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Career </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Address</th>
                       <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                          arsort($career);
                          foreach ($career as $key => $value) {
                              
                              ?>


                      <tr>
                        <td><?php echo $value['Name']; ?></td>
                        <td><?php echo $value['Mobile']; ?></td>
                        <td><?php echo $value['Email']; ?></td>
                        <td><?php echo $value['Address']; ?></td>
                      
                        <td style="display: flex;justify-content: space-between;">
                            
                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                    data-target="#exampleModalScrollable" id="careerinfo" data-id="<?php echo $value['id'] ?>"><i class="fas fa-info-circle"></i></a>
                            
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