<?php
include 'logincheck.php';
include 'header.php';
?>
  <body>
    <?php //include 'registration.php'; ?>
    <?php include 'navbar.php';?>

    <div class="container">
        <?php
        if(isset($_GET['error'])){

            switch($_GET['error']){
                case 'confirmation':
                $aldaa = 'Password aldaa!';
                break;
                case 'database':
                $aldaa = 'Database aldaa!';
                break;
                case 'username':
                $aldaa = 'Username already taken!';
                break;
                case 'email':
                $aldaa = 'Email already taken!';
                break;
                case 'unknown':
                $aldaa = 'Unknown error! Contact us for more information. ';
                break;
                default: 
                $aldaa = 'Aldaa!';
            }

        }

        ?>
        <form action="registration.php" method="POST">
        <?php
        if(isset($aldaa)){
        ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $aldaa; ?>
        </div>
        <?php
        }
        ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input value="ApprenticeMGL" type="text" required name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input value="uyanga" type="text" required name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input value="" type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" required class="form-control" id="exampleInputPassword1">
        </div>        
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password Confirmation</label>
            <input type="password" name="password_confirmation" required class="form-control" id="exampleInputPassword1">
        </div>  
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Terms and Agreements</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div> 
    <?php include 'footer.php'; ?>