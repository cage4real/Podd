<?php 
ob_start();
include_once('header.php'); 
$error="";
$sucess="";
try {
      $item_data = mysqli_fetch_assoc(mysqli_query($GLOBALS['conn'],"SELECT * FROM `delivery_bookings` db join restaurant_details rd on db.restaurant_id = rd.restaurant_id WHERE `delivery_id` ='".decrypt_var($_GET['delivery_id'])."'"));  
      
      $user_data = mysqli_fetch_assoc(mysqli_query($GLOBALS['conn'],"SELECT * FROM `users`  WHERE `user_id` ='".$item_data['user_id']."'"));  
      }
//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

?>
<!-- page content -->
       <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Delivery Order </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <a href="booking_list_restaurant_delivery.php"><button class="btn btn-success pull-right">Back</button></a>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <!-- <h2>Delivery Order</h2> -->
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          <i class="fa fa-home"></i> <?php echo $item_data['restaurant_name'];?>
                                          <small class="pull-right">Date:<?php echo $item_data['delivery_date'];?></small>
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          From
                          <address>
                                          <strong><?php echo $item_data['restaurant_name'];?></strong>
                                          <br><b>Address:</b><?php echo $item_data['restaurant_full_address'];?>
                                          <br><b>Phone:</b> <?php echo $user_data['mobile_no'];?>
                                          <br><b>Email:</b> <?php echo $user_data['email'];?>
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          To
                          <address>
                                          <strong><?php echo $item_data['name'];?></strong>
                                          <br><b>Address</b>:<?php echo $item_data['address'];?>
                                          <br><b>Phone:</b> <?php echo $item_data['contact_no'];?>
                                          <br><b>Email:</b> <?php echo $item_data['email'];?>
                                      </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          
                          <b>Order ID:</b> <?php echo $item_data['delivery_id'];?>
                          <br>
                          <b>Payment Due:</b> <?php echo $item_data['delivery_date'];?>
                          
                        
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table  class="table table-striped">
                            <thead>
                              <tr>
                                <th width="25%">Meal Name</th>
                                <th width="25%">Subtitle Name</th>
                                <th width="20%">Item Name</th>
                                <th width="15%">Quantity</th>
                                <th width="15%">Price</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $order_data = mysqli_query($GLOBALS['conn'],"SELECT * FROM `order_item` oi join meals m on oi.meal_name = m.id join subtitle s on oi.subtitle_name = s.subtitle_id join items i on oi.item_name = i.id WHERE `order_id` ='".$item_data['delivery_id']."'");
                            
                             while($record = mysqli_fetch_assoc($order_data)){
                              
                            ?>
                              <tr>
                                <td><?php echo $record['meal_name'];?></td>
                                <td><?php echo $record['subtitle'];?></td>
                                <td><?php echo $record['name'];?></td>
                                <td><?php echo $record['quantity'];?></td>
                                <td><?php echo $record['price'];?> </td>
                               
                              </tr>
                              <?php } ?>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Total Price:</b></td>
                                <td><b><?php echo $item_data['total_price'];?></b> </td>
                               
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                     
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                      <div class="row no-print">
                        <div class="col-xs-6">
                        <!--  <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>  -->

                        </div>
                       
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

    <?php include_once('footer.php'); ?>