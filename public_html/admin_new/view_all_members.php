<div class="container-fluid">
	<div class="row">
                    <div class="col-12">
                      
                      
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Members Data</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
                                             for ($i=0; $i <count($members) ; $i++) { 
                                             	
                                        	?>
                                            <tr>
                                                <td><?php echo $members[$i]['name']; ?></td>
                                                <td><?php echo $members[$i]['mobile']; ?></td>
                                                <td><?php echo $members[$i]['email']; ?></td>
                                                <td><?php echo $members[$i]['password']; ?></td>
                                                <td><?php echo $members[$i]['address']; ?></td>
                                                <td>  
                                                	<button type="button" class="btn btn-cyan btn-sm"><i class="mdi mdi-border-color"></i></button>
                                                	<button type="button" class="btn btn-success btn-sm"><i class="mdi mdi-eye"></i></button>
                                                	
                                                </td>
                                            </tr>
                                            <?php
                                             
                                             }
                                            ?>
                                            
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
</div>