
<?php
session_start();
 $error =[];
 if ($_SERVER['REQUEST_METHOD'] == "POST"){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $address = $_POST['address'];
     $url = $_POST['linkedin'];
     $image= $_POST['image'];

      if (empty($name) && is_string($name)){

      
        $error['name'] ="invalid error ...." ;

      }
      if (!empty($email) &&  filter_var($email, FILTER_VALIDATE_EMAIL)){
        
      }else{
        $error['email'] ="invalid error ...." ;

      }
       if (!empty($password) && strlen($password<6)){
        
      } else{
        $error['password'] ="invalid error ...." ;

      }
      if (!empty($address) && strlen(trim ($address))  != 10){
        
      }else{
        $error['address'] ="invalid error ...." ;

      }
       if (!empty($url)&& filter_var($url, FILTER_VALIDATE_URL)){
        
      }else{
        $error['linkin'] ="invalid error ...." ;

      }
       if (!empty($image)){

        $filename=$_FILES[$image]["name"];
        $arr=explode(".",$filename);
        $ext=strtolower(end($arr));
        if (! in_array($ext,["png"])) {
          echo($cv ."is a valid  image");
        }
      }else{
        $error['cv'] ="invalid " ;

      }
      $_SESSION["name" ]= $name ;
      $_SESSION["email" ]= $email ;
      $_SESSION["password"] = $password;
      $_SESSION["linkin"] = $url ;
      $_SESSION["image"] = $image ;     
      header('Location: profile.php');

    }

  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register</h2>
  <form action = "<?php echo $_SERVER['PHP_SELF'] ;?> " method ="post">

  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" id="InputName" 
        name = "name" aria-describedby="" placeholder="Enter Name" required>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail">Email</label>
    <input type="email"   class="form-control" id="InputEmail" 
        name ="email" aria-describedby="emailHelp" placeholder="Enter email"required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword">password</label>
    <input type="password"   class="form-control" id="InputEmail" 
        name ="password"  placeholder="Enter password"required>
  </div>
  <div class="form-group">
    <label for="exampleInputAddress">Address</label>
    <input type="text"   class="form-control" id="InputAddress" 
        name ="address" placeholder="Enter Address"required>
  </div>
  <div class="form-group">
    <label for="exampleInputLinkedin">linkedin url</label>
    <input type="url"   class="form-control" id="InputLinkedin" 
            name ="linkedin" placeholder="linkedin url"required>
  </div>
  <div class="form-group">
    <label for="exampleInputCV">image</label>
    <input type="file"   class="form-control" id="InputCV" 
            name ="image" placeholder="CV"required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>

