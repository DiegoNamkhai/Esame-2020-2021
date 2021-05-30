<?php
    include "../../startup/starter.php";

?>
<link rel="stylesheet" href="../css/login.css">

<div class="simple-login-container" id="div-form">
<div class="row, text-center">
        <div class="col-md-12 form-group">
            <h1>Inquinamento Firenze</h1>
        </div>
    </div>
    <!--form login -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="email" placeholder="tua_email@zmail.it" class="form-control" name="email" maxlength="64" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="password" placeholder="Password" class="form-control" name="password" maxlength="32" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="submit" class="btn btn-block btn-login" value="Accedi" >
            </div>
        </div>
    </form>
    <!--fine form login -->
    <div class="row">
        <div class="col-md-12 form-group">
            <?php
                if(isset($_SESSION['Ecode']) && $_SESSION['Ecode']>0){
                    echo "<h4>".$_SESSION['errore']."</h4>";
                    echo "<h4>ritenta modificando i dati</h4>";
                }
            ?>
            <a href="signing.php" id="rdr_signing"><button type="button" class="btn btn-primary" id="registrati"></button></a>
        </div>
    </div>
    
</div>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['Ecode'] = 0;
        //query inserimento dati di registrazione
        include "component_login_query.php";
        
    }


?>


<?php
    include "../../html/close.html";
?>