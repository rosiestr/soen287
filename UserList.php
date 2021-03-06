<?php
if(!isset($_SERVER['HTTP_REFERER'])){   // redirect unwanted user to the front store even if they enter the URL manually
    header('Location: index.php');
    exit;
}

session_start();
 ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags for Bootstrap, provided by https.getbootstrap.com-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <!-- FontAwesome CSS - for icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <!-- Link to icon for title -->
        <link rel="shortcut icon" href="images/KMicon.ico" />
        <!-- css for backstore.html -->
        <link rel="stylesheet" href="backstoreStyles.css">
        <!--title to appear in tab-->
        <title>Kalamari Market:User List</title>
    </head>

            <body>
                <!--NAVIGATION BAR -->
                <nav class="nav-top" id = "topbar">
                    <!--first row of navigation bar-->
                    <section>
                        <!-- <div><a class="active" href="/index.html">Home</a></div> -->
                        <div><a href="products.php">Products</a></div>
                        <div><a href="ordersList.php">Orders</a></div>
                        <div><a href="UserList.php">Users</a></div>
                        <img src="images/KMicon.ico">
                    </section>
                </nav>
                    <!--end of html for first row of topbar -->
                <main id = "userList-main">
                    <h1> User List</h1>
                    <?php
                    if ($_SESSION['backFirstName']) {
                      echo "<h6>Hello, ".$_SESSION['backFirstName']." </h6>";
                    }
                     ?>
                    <form action="" method ="POST">
                    <table class="product-table">
                        <thead>
                            <tr>

                                <th>Profile</th>
                                <th>Account</th>

                            </tr>
                        </thead>

                    </table>
                    <table class="user-table">
                        <thead>
                            <tr>

                                <th> <img src = "images/km.1.png" width="150" height="90" align="left"></th>

                                <th>Jackie Frost <br> jakie23@gmail.com <br> <a href="#">
                                    <a href="EditUser.php"> <button class="button button2"> Edit <i class="fas fa-edit"></i></button></a>
                                    <!-- <button class="button button2">Save </button> -->
                                    <button class="button button2" id="delete_user">Delete <i class="fas fa-trash-alt"></i></button>
                                </a></th>


                            </tr>
                        </thead>

                    </table>


                    <!-- <table class="user-table">
                        <thead>
                            <tr>

                                <th> <img src = "images/km.1.png" width="150" height="90" align="left"></th>
                                <th>Sophie McKnight <br> sophie@gmail.com <br> <a href="#">
                                    <a href="EditUser.html"> <button class="button button2"> Edit <i class="fas fa-edit"></i></button></a> -->
                                    <!-- <button class="button button2">Save </button> -->
                                    <!-- <button class="button button2">Delete <i class="fas fa-trash-alt"></i></button>
                                </a></th>


                            </tr>
                        </thead>

                    </table> -->
                    <!-- <table class="user-table">
                        <thead>
                            <tr>

                                <th> <img src = "images/km.1.png" width="150" height="90" align="left"></th>
                                <th>Edward Eleric <br> edward@gmail.com <br> <a href="#">
                                    <a href="EditUser.html"> <button class="button button2"> Edit <i class="fas fa-edit"></i></button></a> -->
                                    <!-- <button class="button button2">Save </button> -->
                                    <!-- <button class="button button2">Delete <i class="fas fa-trash-alt"></i></button>
                                </a></th>


                            </tr>
                        </thead>

                    </table> -->
                    <div class="button-bar">
                        <a href="#">
                            <a href="EditUser.php"> <button class="button button1" name= "add-btn">Add <i class="fas fa-plus-square"></i></button></a>
                        </a>

                    </div>

                    </form>

                    <!-- <script>
                        var read_localstorage=document.getElementById("read_localstorage")

                        var delete_data=document.getElementById("delete_user")


                        //delete user from local storage
                        delete_data.onclick=function(){
                            localStorage.removeItem("name")
                        }

                    </script> -->

                </main>


                <footer><a href="index.html">Back to Front Store</a></footer>


                <!--footer -->

                <!-- <footer><a href="index.html">Back to Front Store</a></footer> -->

        </body>

  </body>
</html>
