<?php
    include "../../startup/starter.php";

?>
<link rel="stylesheet" href="../css/login.css">
<div class="row, text-center">
        <div class="col-md-12 form-group">
            <h1>Registrazione</h1> 
        </div>
    </div>
<div class="simple-login-container" id="div-form">
    <!--form signign -->
    <form action="homepage.php" method="POST">
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
                <input type="email" placeholder="tua_email@zmail.it" class="form-control" name="cognome" maxlength="64" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="password" placeholder="Password" class="form-control" name="password" maxlength="32" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="submit" class="btn btn-block btn-login" value="accedi" required>
            </div>
        </div>
    </form>
    <!--fine form login -->
</div>

<?php
    include "../../html/close.html";
?>