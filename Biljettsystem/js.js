document.addEventListener('DOMContentLoaded', function(){
           console.log('DOM loaded');

           
    document.getElementById('addtocart').addEventListener('click', function(){
        
         document.cookie = "Produktnamn=" + document.getElementById('title').innerText;
         document.cookie = "Antal=" + parseInt(document.getElementById('qty').value);         
         document.cookie = "Pris=" + document.getElementById('price').innerText;
         document.cookie = "Eventid=" + parseInt(document.getElementById('eventid').value); 
    });
    

    document.getElementById('addtocart').addEventListener('click', function() {
       if (document.cookie.length != 0) 
       {
           let cookiesArray = document.cookie.split("; ");
           for (let i = 0; i<cookiesArray.length; i++) 
            {
               let nameValueArray = cookiesArray[i].split("=");
               
               if (nameValueArray[0] == "Produktnamn") 
               {
                   document.getElementById("i").innerText = nameValueArray[1];
               }
               else if (nameValueArray[0] == "Eventid") 
               {
                   document.getElementById("t").innerText = nameValueArray[1];
               }
               else if (nameValueArray[0] == "Antal") 
               {
                   document.getElementById("q").innerText = nameValueArray[1];
               }
               else if (nameValueArray[0] == "Pris") 
               {
                   document.getElementById("p").innerText = nameValueArray[1];
               }
            }
        }
        else 
        {
           alert("No cookies found");
        }
    });


});
