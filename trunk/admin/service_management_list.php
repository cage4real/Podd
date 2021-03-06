<?php 
  include_once('header.php');
  $result = array();
  $data = get_all_data('service_management');
 
  //Basic Validation  
  
 ?> 
     <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Service Category List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="add_service_category.php"><button type="button" class="btn btn-round btn-success">Add Service</button></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Profile Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <input type="hidden" id = "delete_type" value = "service_management">
                      <tbody>
                       <?php while($record = mysqli_fetch_assoc($data)){ ?>
                         <tr>
                          <td><?php echo $record['service_name'];?></td>
                          <td><?php if($record['service_image']){ ?><img src="<?php echo url().$record['service_image']; ?>" alt="Smiley face" height="42" width="42"><?php }?></td>
                          <td><?php if($record['status']=="1"){?>
                             <button type="button" id="activatedeactivate-<?php echo $record['service_id'];?>" class="btn btn-round btn-warning">Deactivate</button>
                              <?php }else{?>
                              <button type="button" id="activatedeactivate-<?php echo $record['service_id'];?>" class="btn btn-round btn-success">Activate</button>
                              <?php }?>
                             <a type="button" href="edit_service_management.php?id=<?php echo encrypt_var($record['service_id']);?>" id="edit" class="btn btn-round btn-primary">Edit</a>
                             <button type="button" id="deletepopup-<?php echo $record['service_id'];?>" class="btn btn-round btn-danger">Delete</button>
                             
                          </td>
                         </tr>
                        <?php }?> 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php include_once('footer.php'); ?>
