
<h1 class="h3 mb-2 text-gray-800">Bookings</h1>            

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="card-title">
            <a class="py-2 px-5 btn-primary" href="./index.php?page=new-user">
                Add New User
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>First name</th>
                        <th>Lastname</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Username</th>
                        <th>First name</th>
                        <th>Lastname</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>                                    
                        <?php
                            include("../scripts/database/connection.php");
                            $stmt = $connection->prepare("SELECT * FROM users order by id desc");
                            $stmt->execute();
                            $data = $stmt->fetchAll();
                            if(count($data)>0){
                                foreach($data as $singleUser){
                        ?>
                                <tr>
                                    <td>
                                        <?php echo $singleUser["username"];?>      
                                    </td>
                                    <td>
                                        <?php echo $singleUser["first_name"];?>      
                                    </td>
                                    <td>
                                        <?php echo $singleUser["last_name"];?>
                                    </td> 
                                    <td>
                                        Update
                                    </td>       
                                    <td>
                                        <?php
                                            if($singleUser['id']===$_SESSION['adminId']){
                                                echo "<span>--</span>";
                                            } else {
                                        ?>
                                                <a href="./scripts/delete-user.php?id=<?php echo $singleUser['id'];?>">Delete</a>
                                        <?php
                                            }
                                        ?>
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