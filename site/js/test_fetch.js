fetch('http://example.com/movies.json', {
    headers: {
        method: "POST"
    }
})
  .then(response => response.json())
  .then(data =>{
    dati = data;    
  });

