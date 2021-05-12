fetch('../web/php/sketch_call.php', {
})
  .then(response => response.json())
  .then(data =>{  
    alert (response);
  });

