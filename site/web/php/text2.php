<?php
    include "../../startup/starter.php";

?>

<script>

fetch("../API/text.php", {
      
      // Adding method type
      method: "POST",

      headers: {
        'Content-Type' : 'application/json'
      },
        
      // Adding body or contents to send
      body: JSON.stringify({
          postazione : 123
      }),
  })
    .then(response => {
         return response.json();
    })
    .then(sas =>{
        console.log(sas);
        alert(sas);
        })
</script>

<?php
    include "../../html/close.html";
?>