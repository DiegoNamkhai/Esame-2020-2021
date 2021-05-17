<?php
    include "../../startup/starter.php";

?>

<script>

fetch("../API/query.php", {
      
      // Adding method type
      method: "POST",

      headers: {
        'Content-Type' : 'application/json'
      },
        
      // Adding body or contents to send
      body: JSON.stringify({
        dato:"PM2dot5",
        postazione:"FI-GRAMSCI"
      }),
  })
    .then(response => {
         return response.json();
    })
    .then(sas =>{
        console.log(sas);
        alert(sas['valore']);
        })
</script>

<?php
    include "../../html/close.html";
?>