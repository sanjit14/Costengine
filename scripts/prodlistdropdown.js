function prodlistdropdown(catid,numofcategories)
{   
    for(i=1;i<=numofcategories;i++)
    {
        if(document.getElementById(i) != null)
        {
            if(i == catid)
            {
                document.getElementById(i).style.display = "block";
                document.getElementById(i).style.visibility = "visible";
            }
            else
            {
                document.getElementById(i).style.display = "none";
                document.getElementById(i).style.visibility = "hidden";
            }
        }
    }
     // Create an XMLHttpRequest object
     const xhttp = new XMLHttpRequest();
    
     // Define a callback function
     xhttp.onreadystatechange = function() 
     {
         if (this.readyState == 4 && this.status == 200) 
         {
             // Here you can use the Data
             document.getElementById("productlist").innerHTML = this.responseText;
         }
     };
     // Send a request
     xhttp.open("POST", "proddropdownlist.php");
     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhttp.send("&catid="+catid); 
}