<?php
    include "../../startup/starter.php";

?>
<link rel="stylesheet" href="../css/login.css">

<div class="simple-login-container" id="div-form">
<h1>Registrazione</h1> 
    <!--form signign -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="text" class="form-control" placeholder="Nome" name="nome" maxlength="32"required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="text" class="form-control" placeholder="Cognome" name="cognome" maxlength="32" required>
            </div>
        </div>
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
                <input type="hidden" name="check" value="form_sign">
                <input type="submit" class="btn btn-block btn-login" value="Registrati" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <?php
                    if(isset($_SESSION['Ecode']) && $_SESSION['Ecode']>0){
                        echo "<h4>".$_SESSION['errore']."</h4>";
                        if($_SESSION['Ecode']!=3)echo "<h4>ritenta modificando i dati</h4>";
                        //errore 3 da login nel caso in cui non si è registrati
                    }
                ?>
                <a href="login.php"><button type="button" class="btn btn-primary" >Torna al Login</button></a>
            </div>
        </div>


    </form>
    <!--fine form login -->
</div>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['Ecode'] = 0;
        //query inserimento dati di registrazione
        include "component_signign_query.php";

        if($cn->qr($call)){
            $_SESSION['errore'] = "";
            header("Location: login.php");
            exit;
        }
        else{
            $_SESSION['errore'] = "errore dati o connessione";
            $_SESSION['ECode'] = 2;
            header("Location: signing.php");
            exit;
        }
        
      }
      else{
        $_SESSION['Ecode'] = 0; 
      }


?>


<?php
    include "../../html/close.html";
?>