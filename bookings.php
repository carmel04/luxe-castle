<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Bookings</h1>            

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">    
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Date In</th>
                        <th>Check Out</th>
                        <th>Age</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Full Name</th>
                        <th>Date In</th>
                        <th>Check Out</th>
                        <th>Age</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>                                    
                        <?php
                            include("../scripts/database/connection.php");
                            $stmt = $connection->prepare("SELECT * FROM bookings order by id desc");
                            $stmt->execute();
                            $data = $stmt->fetchAll();
                            if(count($data)>0){
                                foreach($data as $booking){
                        ?>
                                <tr>
                                    <td>
                                        <?php echo $booking["first_name"]." ".$booking["last_name"];?>                                                            
                                    </td>
                                    <td>
                                        <?php 
                                            $dateIn = new DateTime($booking["date_in"]);
                                            echo $dateIn->format("M d, Y");
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            $dateOut = new DateTime($booking["date_out"]);
                                            echo $dateOut->format("M d, Y");
                                        ?>
                                    </td>
                                    <td><?php echo $booking["age"];?></td>
                                    <td><?php echo $booking["mobile_number"];?></td>
                                    <td><?php echo $booking["email"];?></td>
                                    <td>
                                        <a href="./scripts/delete-booking.php?id=<?php echo $booking['id'];?>">Delete</a>
                                    </td>
                                </tr>
                        <?php
                                }
                            }
                        ?>                                                                        
                </tbody>
            </table>
        </div>
    </div>
</div>