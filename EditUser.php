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
        <title>Kalamari Market:Edit User List</title>
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
        <main>

          </article>
            <h1> Edit/Add a User Profile</h1>
            <?php
            if ($_SESSION['backFirstName']) {
              echo "<h6>Hello, ".$_SESSION['backFirstName']." </h6>";
            }
             ?>
            <div class="EDIT_DIV">


            <form  method="POST" name="edit">
            Full Name: <input type="addName" name="name" class="user" id="fullName" placeholder="Full Name" required >
            Email: <input type="addEmail" name="email" class="user" id="fullEmail" placeholder="example@example.com" required >
            <input type="button" name="save" value="Add Data" onclick="addUsers();" class="button button2" >

              <table class="product-table" id="tbl" >
                <thead>
                  <!-- <tr> -->
                    <th> Full Name</th>
                    <th> Email</th>
                    <th> Delete</th>
                    <th> Update</th>
                  <!-- </tr> -->
                </thead>
                <tbody>
                  <!-- <tr> -->
                  <!-- <td> <input type="addName" name="name" class="user" placeholder="Full Name" required ></td> -->
                  <!-- <td> <input type="addEmail" name="email" class="user" placeholder="example@example.com" required ></td> -->
                  <!-- <td> <button type="submit" class="button button2" name="save" >Save</td> -->
                  <!-- <td><input type="button" name="save" value="Add Data" onclick="addUsers();" class="button button2" ></td> -->

                  <!-- </tr> -->
                </tbody>
              </table>
              <!-- <div class="button-bar">
                        <a href="#">
                            <a href="EditUser.php"> <button class="button button1" name= "add-btn">Add <i class="fas fa-plus-square"></i></button></a>
                        </a>

                    </div> -->
            </form>
            <script>
             //-----------------------------------------------------------------------------------

              let users=[]; //creating an array to store the users in it
              function addUsers(){

                let user={
                  name: document.edit.name.value ,
                  email: document.edit.email.value
                 }

                users.push(user);
                //document.forms[0].reset();
                var name= document.edit.name.value;
                var email= document.edit.email.value;

                var tr= document.createElement('tr');

                var td1 = tr.appendChild(document.createElement('td'));
                var td2 = tr.appendChild(document.createElement('td'));
                var td3 = tr.appendChild(document.createElement('td'));
                var td4 = tr.appendChild(document.createElement('td'));


                td1.innerHTML=name;
                td2.innerHTML=email;
                td3.innerHTML='<input type="button" name="del" value="Delete" onclick="deleteUser(this);" class="btn btn-danger">'
                td4.innerHTML='<input type="button" name="up" value="Update" onclick="UpdateUser(this);" class="btn btn-primary">'

                document.getElementById("tbl").appendChild(tr);
                //store to local storage
                 localStorage.setItem('UserList',JSON.stringify(users));

              }

              function UpdateUser(user){
                var name=document.edit.name.value;
                var email=document.edit.email.value;
                var u = user.parentNode.parentNode;
                var tr = document.createElement('tr');

                var td1 = tr.appendChild(document.createElement('td'));
                var td2 = tr.appendChild(document.createElement('td'));
                var td3 = tr.appendChild(document.createElement('td'));
                var td4 = tr.appendChild(document.createElement('td'));


                td1.innerHTML='<input type="addName" name="name1">';
                td2.innerHTML='<input type="addEmail" name="email1">';
                td3.innerHTML='<input type="button" name="del" value="Delete" onclick="deleteUser(this);" class="btn btn-danger">'
                td4.innerHTML='<input type="button" name="up" value="Update" onclick="addUpdateUser(this);" class="btn btn-primary">'

                document.getElementById("tbl").replaceChild(tr, u);


              }

              function addUpdateUser(user){
                var name=document.edit.name1.value;
                var email=document.edit.email1.value;
                var u2 = user.parentNode.parentNode;
                var tr = document.createElement('tr');

                var td1 = tr.appendChild(document.createElement('td'));
                var td2 = tr.appendChild(document.createElement('td'));
                var td3 = tr.appendChild(document.createElement('td'));
                var td4 = tr.appendChild(document.createElement('td'));


                td1.innerHTML=name;
                td2.innerHTML=email;
                td3.innerHTML='<input type="button" name="del" value="Delete" onclick="deleteUser(this);" class="btn btn-danger">'
                td4.innerHTML='<input type="button" name="up" value="Update" onclick="UpdateUser(this);" class="btn btn-primary">'

                document.getElementById("tbl").replaceChild(tr, u2);

              }
              function deleteUser(User){
                var u=User.parentNode.parentNode;
                u.parentNode.removeChild(u);
              }

              //--------------------------------------------------------------------------
            </script>

                  <!-- <img src = "images/km.1.png" class="img-banner" width="150" height="90" align="left"> -->
                    <!-- <h4>Jackie Frost <br> jakie23@gmail.com </h4><br>
                        <div class="user" id="registerFirst">
                           <label class="edit"for="first">Old Name: </label>
                            <input type="street"  name="first" class="user" required>
                        </div>
                           <br>

                            <div class="user" id="registerFirst">
                              <label  class="edit" for="first">*New Name: </label>
                                <input type="street" name="first"class="user" required>
                            </div>
                            <br>

                            <div class="user" id="registerEmail">
                              <label class="edit" for="emailAddress"> Old Email: </label>
                              <input type="street" name="first" class="user"required>
                            </div> -->
                                    <!-- <input type="email"name="emailAddress"class="user" required align:left>
                                  </div> -->
                            <!-- <br>
                            <div class="user" id="registerEmail">
                              <label class="edit" for="emailAddress"> *New Email: </label>
                              <input type="street" name="first"class="user"required>
                            </div>
                            <br>
                            <div class="user" id="registerPass">
                              <label class="edit" for="passWord"> Old Password: </label>
                              <input type="password" name="passWord" class="user" required>
                           </div>
                             <br>
                            <div class="user" id="confirmPass">
                                <label class="edit"for="confirm-pass">New Password: </label>
                                <input type="password"name="confirm-pass"placeholder=""class="user"required>
                            </div>
                            <br>
                            <div class="user" id="confirmPass">
                              <label class="edit" for="confirm-pass">*Confirm new Password: </label>
                              <input type="password"name="confirm-pass"placeholder=""class="user"required>
                            </div>
                            <br>

                            <div class="user" id="registerStreet">
                              <label  class="edit" for="street">*New Street: </label>
                                <input type="street" name="street"class="user"id="inputStreet"required>
                            </div>
                            <br>

                            <div class="user" id="registerCity">
                              <label class="edit" for="city">*New City: </label>
                                <input type="city"name="city"class="user"id="inputCity" required>
                              </div>
                              <br>
                              <div class="user" id="registerProvince">
                                        <label  class="edit" for="province">*Province: </label>
                                        <select id="province" name="province" class="province" required>
                                            <option value="Alberta">AB</option>
                                            <option value="Britich Columbia">BC</option>
                                            <option value="Manitoba">MB</option>
                                            <option value="New Brunswick">NB</option>
                                            <option value="Newfoundland and Labrador">NL</option>
                                            <option value="Nova Scotia">NS</option>
                                            <option value="Ontario">ON</option>
                                            <option value="Prince Edward Island">PE</option>
                                            <option value="Quebec">QC</option>
                                            <option value="Saskatchewan">SK</option>
                                            <option value="Nortwest">NT</option>
                                            <option value="Nunavut">NU</option>
                                            <option value="Yukon">YT</option>
                                        </select>
                               </div>

                                    <br>

                                <div class="user" id="registerZip">
                                    <label class="edit" for="zip">*New Postal Code: </label>
                                      <input type="zip" class="user" id="inputZip"required>
                                </div>
                                      <br>

                                <button class="button button2">Edit <i class="fas fa-edit"></i></button>
                                <button class="button button2">Delete <i class="fas fa-trash-alt"></i></button>
                              </a>


            </div> -->
            <!-- <div class="EDIT_DIV">

                  <img src = "images/km.1.png" class="img-banner" width="150" height="90" align="left"></th>
                          <h4>Sophie McKnight <br> sophie@gmail.com</h4> <br>
                            <div class="user" id="registerFirst">
                                <label class="edit"for="first">Old Name: </label>

                                <input type="street"
                                name="first"
                                class="user"
                                required>
                          </div>
                              </div>
                              <br>

                              <div class="user" id="registerFirst">
                                <label class="edit" for="first">*New Name: </label>
                                <input type="street"
                                    name="first"
                                    class="user"
                                    required>
                              </div>
                              <br>

                              <div class="user" id="registerEmail">
                                <label class="edit" for="emailAddress"> Old Email: </label>
                                <input type="street"
                                name="first"
                                class="user"
                                required>
                          </div>
                              </div>
                              <br>
                              <div class="user" id="registerEmail">
                                <label class="edit" for="emailAddress"> *New Email: </label>
                                <input type="street"
                                name="first"
                                class="user"
                                required>
                          </div>
                              </div>
                              <br>
                              <div class="user" id="registerPass">
                                <label class="edit" for="passWord"> Old Password: </label>
                              <input type="password"
                                  name="passWord"
                                  class="user"
                                  required>
                              </div>
                              <br>
                              <div class="user" id="confirmPass">
                                <label class="edit" for="confirm-pass">New Password: </label>
                                <input type="password"
                                    name="confirm-pass"
                                    placeholder=""
                                    class="user"
                                    required>
                              </div>
                              <br>
                              <div class="user" id="confirmPass">
                                <label class="edit" for="confirm-pass">*Confirm new Password: </label>
                                <input type="password"
                                    name="confirm-pass"
                                    placeholder=""
                                    class="user"
                                    required>
                              </div>
                              <br>

                              <div class="user" id="registerStreet">
                                <label class="edit" for="street">*New Street: </label>
                                <input type="street"
                                  name="street"
                                   class="user"
                                   id="inputStreet"
                                   reqired>
                              </div>
                            <br>

                            <div class="user" id="registerCity">
                                <label class="edit" for="city">*New City: </label>
                                <input type="city"
                                  name="city"
                                  class="user"
                                   id="inputCity"
                                   required>
                              </div>
                              <br>
                              <div class="user" id="registerProvince">
                                    <label class="edit" for="province">*Province: </label>
                                    <select id="province" name="province" class="province" required>
                                        <option value="Alberta">AB</option>
                                        <option value="Britich Columbia">BC</option>
                                        <option value="Manitoba">MB</option>
                                        <option value="New Brunswick">NB</option>
                                        <option value="Newfoundland and Labrador">NL</option>
                                        <option value="Nova Scotia">NS</option>
                                        <option value="Ontario">ON</option>
                                        <option value="Prince Edward Island">PE</option>
                                        <option value="Quebec">QC</option>
                                        <option value="Saskatchewan">SK</option>
                                        <option value="Nortwest">NT</option>
                                        <option value="Nunavut">NU</option>
                                        <option value="Yukon">YT</option>
                                    </select>
                                </div>

                                <br>

                                <div class="user" id="registerZip">
                                    <label class="edit" for="zip">*New Postal Code: </label>
                                    <input type="zip"
                                         class="user"
                                         id="inputZip"
                                         required>
                                  </div>
                                  <br>

                            <button class="button button2">Edit <i class="fas fa-edit"></i></button>
                            <button class="button button2">Delete <i class="fas fa-trash-alt"></i></button>
                          </a> -->

                        <!--      Status</th> -->



             <!-- </div>
            <div class="EDIT_DIV">


                           <img src = "images/km.1.png" class="img-banner" width="150" height="90" align="left"></th>
                         <h4> Edward Eleric <br> edward@gmail.com </h4> <br>
                            <div class="user" id="registerFirst">
                                <label class="edit" for="first">Old Name: </label>

                                <input type="street"
                                name="first"
                                class="user"
                                required>
                          </div>
                              </div>
                              <br>

                              <div class="user" id="registerFirst">
                                <label class="edit" for="first">*New Name: </label>
                                <input type="street"
                                    name="first"
                                    class="user"
                                    required>
                              </div>
                              <br>

                              <div class="user" id="registerEmail">
                                <label class="edit" for="emailAddress"> Old Email: </label>
                                <input type="street"
                                        name="first"
                                        class="user"
                                        required>
                                  </div>
                              </div>
                              <br>
                              <div class="user" id="registerEmail">
                                <label class="edit" for="emailAddress"> *New Email: </label>
                               <input type="street"
                                        name="first"
                                        class="user"
                                        required>
                                  </div>
                              </div>
                              <br>
                              <div class="user" id="registerPass">
                                <label class="edit" for="passWord"> Old Password: </label>
                              <input type="password"
                                  name="passWord"
                                  class="user"
                                  required>
                              </div>
                              <br>
                              <div class="user" id="confirmPass">
                                <label class="edit" for="confirm-pass">New Password: </label>
                                <input type="password"
                                    name="confirm-pass"
                                    placeholder=""
                                    class="user"
                                    required>
                              </div>
                              <br>
                              <div class="user" id="confirmPass">
                                <label class="edit" for="confirm-pass">*Confirm new Password: </label>
                                <input type="password"
                                    name="confirm-pass"
                                    placeholder=""
                                    class="user"
                                    required>
                              </div>
                              <br>

                              <div class="user" id="registerStreet">
                                <label class="edit" for="street">*New Street: </label>
                                <input type="street"
                                  name="street"
                                   class="user"
                                   id="inputStreet"
                                   reqired>
                              </div>
                            <br>

                            <div class="user" id="registerCity">
                                <label class="edit" for="city">*New City: </label>
                                <input type="city"
                                  name="city"
                                  class="user"
                                   id="inputCity"
                                   required>
                              </div>
                              <br>
                              <div class="user" id="registerProvince">
                                    <label class="edit" for="province">*Province: </label>
                                    <select id="province" name="province" class="province" required>
                                        <option value="Alberta">AB</option>
                                        <option value="Britich Columbia">BC</option>
                                        <option value="Manitoba">MB</option>
                                        <option value="New Brunswick">NB</option>
                                        <option value="Newfoundland and Labrador">NL</option>
                                        <option value="Nova Scotia">NS</option>
                                        <option value="Ontario">ON</option>
                                        <option value="Prince Edward Island">PE</option>
                                        <option value="Quebec">QC</option>
                                        <option value="Saskatchewan">SK</option>
                                        <option value="Nortwest">NT</option>
                                        <option value="Nunavut">NU</option>
                                        <option value="Yukon">YT</option>
                                    </select>
                                </div>

                                <br>

                                <div class="user" id="registerZip">
                                    <label class="edit" for="zip">*New Postal Code: </label>
                                    <input type="zip"
                                         class="user"
                                         id="inputZip"
                                         required>
                                  </div>
                                  <br>
                            <button class="button button2">Edit <i class="fas fa-edit"></i></button>
                            <button class="button button2">Delete <i class="fas fa-trash-alt"></i></button>

            </div> -->
        </main>

        <!--For some reason, the footer in this page is not correctly placed-->

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>




            <footer><a href="index.html">Back to Front Store</a></footer>

      </body>
</html>
