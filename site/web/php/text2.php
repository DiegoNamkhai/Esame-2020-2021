<?php
    include "../../startup/starter.php";

?>

<script>

fetch("text.php", {
      
      // Adding method type
      method: "POST",
        
      // Adding body or contents to send
      body: {
          title: "foo"
      },
  })
    .then(response => {
        response.json()
        console.log(response)
    })
    .then(sas =>console.log(sas))
</script>

<?php
    include "../../html/close.html";
?>