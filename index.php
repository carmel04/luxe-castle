<?php
    session_start(); 
    include("./includes/head.php");
?>
    <div class="bg-container"></div>

    <div class="bg-white">
        <?php
            $password = password_hash("1", PASSWORD_BCRYPT);
            // echo $password;
        ?>
    </div>
    <div class="container-lg text-center">
        <div class="row justify-content-end text-white align-items-center">
            <div class="col-lg-8 col-md-6 mb-3">
                <div class="text-white text-start d-block position-relative">
                    <h1>Luxe Castle</h1>
                    <h4>A luxury place to stay</h4>

                    <div class="row mx-0 px-0">
                        <div class="col-lg-8 col-md-8 col-12 p-0">
                            <div class="d-block w-100 position-relative py-3 d-block" id="availability-container">
                                <form class="d-block position-relative w-100" method="post"
                                    enctype="multipart-form-data" action="./scripts/book.php">
                                    <div class="row mx-0">
                                        <input type="date" name="check-in" 
                                        class="p-3 rounded-0 mb-4 col-6 border-0"/>
                                        <input type="date" name="check-out" 
                                            class="p-3 rounded-0 mb-4 col-6 border-0"/>
                                    </div>

                                    <div class="row mx-0">
                                        <input name="rooms" type="number" value=""
                                            placeholder="Rooms" 
                                            class="col-4 p-3 border-0 no-outline"/>
                                        <input name="adults" type="number" value=""
                                            placeholder="Adults" 
                                            class="col-4 p-3 border-0 no-outline"/>
                                        <input name="children" type="number" value=""
                                            placeholder="Child" 
                                            class="col-4 p-3 border-0 no-outline"/>
                                    </div>  

                                    <?php
                                        if(isset($_SESSION["errors"])){
                                            $errors = $_SESSION['errors'];
                                    ?>
                                            <div class="bg-danger p-3 mt-4">
                                                <?php                                                
                                                    foreach ($errors as $singleError) {
                                                ?>
                                                    <div class="d-block position-relative">
                                                        - <?php echo $singleError;?>
                                                    </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>        
                                    <?php        
                                        }  
                                    ?>                            

                                    <input type="submit" value="Book" class="mt-4 w-100 py-3 fw-bolder bg-success text-white border-0 rounded-0"/>
                                </form>
                            </div>
                        </div>
                    </div>
                

                    <div class="d-block position-relative py-4">
                        <a id="availability-checker" class="cursor-pointer d-inline-block link-button text-white py-3 px-5 text-decoration-none fw-bolder">
                            <h4 class="m-0">Check Availability &raquo;</h4>
                        </a>
                    </div>
                </div> 
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 col-12 login-box mt-5 p-5 rounded-0">
                <h3 class="text-white fw-bolder mb-3">LUXE CASTLE <img src = "./assets/imgs/lcc.jpg" class="w-25 rounded-circle"></h3>  
                <form method="post" action="./scripts/login.php" 
                        enctype="multipart-form-data">
                    <div class="mb-4">
                        <input type="email" name="username"
                            class="form-control rounded-0" 
                            value="carmel@gmail.com"
                            id="exampleFormControlInput1" 
                            placeholder="enter your email">
                    </div>
                    <div class="mb-4">
                        <input type="password" name="pwd"
                            class="form-control rounded-0" 
                            id="exampleFormControlInput1" 
                            value="1"
                            placeholder="enter your password">
                    </div>

                    <?php
                        if(isset($_SESSION["error"])){
                    ?>
                            <div class="bg-danger text-white px-3 py-2 mb-4 fw-bolder">
                                <?php echo $_SESSION['error'];?>
                            </div>
                    <?php
                        }
                    ?>
            
                    <button type="submit" 
                        class="btn bg-black bg-info w-100 rounded-0 text-white fw-bolder">login
                    </button>
                </form>
            </div>
            
            
        </div>
    </div>

    <?php
        if(isset($_SESSION["adults"])){
            echo $_SESSION["adults"] ." number of adults";
            include("./includes/booking-popup.php");
        }
    ?>

    <script>
        const AVAIL_BTN = document.getElementById("availability-checker"),
            AVAILABILITY_FORM_CONTAINER = document.getElementById("availability-container");
        AVAIL_BTN.addEventListener("click", ()=>{
            console.log("Clicked");
            AVAILABILITY_FORM_CONTAINER.classList.remove("d-none").add("d-block");
            AVAIL_BTN.classList.remove("d-block").add("d-none");
        });
    </script>

    <?php include("./includes/footer.php");?>
