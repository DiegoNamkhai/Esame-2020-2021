<?php
    include "../../startup/starter.php";

?>
<link rel="stylesheet" href="../css/login.css">
<div class="row, text-center">
        <div class="col-md-12 form-group">
            <h1>Inquinamento Firenze</h1> 
        </div>
    </div>
<div class="simple-login-container" id="div-form">
    <!--form login -->
    <form action="homepage.php" method="POST">
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="text" class="form-control" placeholder="Username">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="password" placeholder="Enter your Password" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="submit" class="btn btn-block btn-login" value="accedi" >
            </div>
        </div>
    </form>
    <!--fine form login -->
    <div class="row">
        <div class="col-md-12">
            <a href="signing.php" id="rdr_signing"><h4 id="registrati"><h4></a>
        </div>
    </div>
</div>

<?php
    include "../../html/close.html";
?>