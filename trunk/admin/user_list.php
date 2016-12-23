<?php 
  include_once('header.php');
  $result = array();
  $data = mysqli_query($GLOBALS['conn'],"SELECT * FROM users where role != 1 ");
  //Basic Validation  
  
 ?> 
     <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
             <div class="row top_tiles">
              <a href = "restaurant_list.php"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-home"></i></div>
                  <div class="count"><?php echo mysqli_num_rows(mysqli_query($GLOBALS['conn'],"SELECT * FROM `users` Where `role`= 2 "));?></div>
                  <h3>Total Restaurants</h3>
                  
                </div>
              </div>
              </a>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-car"></i></div>
                  <div class="count">0</div>
                  <h3>Total Taxi</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo mysqli_num_rows(mysqli_query($GLOBALS['conn'],"SELECT * FROM `booked_records_restaurant`"));?></div>
                  <h3>Total Restaurant Bookings</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count">0</div>
                  <h3>Total Taxi Bookings</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User List</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-responsive" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Email</th>
                          <th>Contact No.</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <input type="hidden" id = "delete_type" value ="users">
                      <tbody>
                       <?php while($record = mysqli_fetch_assoc($data)){ ?>
                         <tr>
                          <td><?php echo $record['email'];?></td>
                          <td><?php echo $record['country_code'].$record['mobile_no'];?></td>
                          <td><?php if($record['status']=="1"){?>
                             <button type="button" id="activatedeactivate-<?php echo $record['user_id'];?>" class="btn btn-round btn-warning">Deactivate</button>
                              <?php }else{?>
                              <button type="button" id="activatedeactivate-<?php echo $record['user_id'];?>" class="btn btn-round btn-success">Activate</button>
                              <?php }?>
                             <button type="button" id="deletepopup-<?php echo $record['user_id'];?>" class="btn btn-round btn-danger">Delete</button>
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