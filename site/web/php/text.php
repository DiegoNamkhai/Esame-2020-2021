<?php
    include "../../startup/starter.php";

?>
<script >

fetch("sketch_call.php")
   .then(response => {
      console.log(response);
      alert(response);
   })
   .catch(error => console.log("Si è verificato un errore!"))
</script>


<?php
    include "../../html/close.html";
?>