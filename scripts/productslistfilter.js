function productslistfilter(catid,n)
{
    alert(catid+" "+n);
    typ = document.getElementById("type").value;
    tec = document.getElementById("technique").value;
    amb = document.getElementById("ambience").value;
    dsn = document.getElementById("design").value;

    if((typ != "Type") || (tec != "Technique") || (amb != "Ambience") || (dsn != "Design"))
    {
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
        xhttp.open("POST", "filter-images-in-a-row-element-productlist.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cat_id="+catid+"&n="+n); 
    }

}