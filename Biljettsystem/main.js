window.onload=function(){

    document.getElementById('remove').addEventListener('click', function() {
        
        document.cookie = "Produktnamn=; expires=Thu, 01 Jan 1970 00:00:01 GMT";
        document.cookie = "Antal=; expires=Thu, 01 Jan 1970 00:00:01 GMT";
        document.cookie = "Pris=; expires=Thu, 01 Jan 1970 00:00:01 GMT";
        document.cookie = "Eventid=; expires=Thu, 01 Jan 1970 00:00:01 GMT";
      });
   
}