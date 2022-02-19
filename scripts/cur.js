function cur()
{   
    var catid=1,pid=1,qty=1,nc=1,wlength=0,wwidth=0,opacityreq=0,mount=0,motorized=0,powertype=0,controltype=0;
    catid = document.getElementById("catlist").value;
    pid = document.getElementById("productlist").value;
    qty = document.getElementById("cur_quantity").value;
    wlength = document.getElementById("cur_wlength").value;
    wwidth = document.getElementById("cur_wwidth").value;
    if(wlength && wwidth)
    {
        if(document.getElementById("cur_pyes").checked) nc = 2;
        if(document.getElementById("cur_lt_blackout").checked) opacityreq = 2;
        else if (document.getElementById("cur_lt_dimout").checked) opacityreq = 1;
        else opacityreq = 0;
        if(document.getElementById("cur_wallmount").checked) mount = 1;
        if(document.getElementById("cur_motorized").checked) motorized = 1;
        if(document.getElementById("cur_battery").checked) powertype = 1;
        if(document.getElementById("cur_remote").checked) controltype = 1;

        // Create an XMLHttpRequest object
        const xhttp = new XMLHttpRequest();
    
        // Define a callback function
        xhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                // Here you can use the Data
                document.getElementById("productprice").innerHTML = "&#8377;"+this.responseText;
            }
        };
        // Send a request
        xhttp.open("POST", "curprice.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("&catid="+catid+"&pid="+pid+"&qty="+qty+"&nc="+nc+"&wlength="+wlength+"&wwidth="+wwidth+"&opacityreq="+opacityreq+"&mount="+mount+"&motorized="+motorized+"&powertype="+powertype+"&controltype="+controltype); 
    }
    else
    {
        document.getElementById("productprice").innerHTML = "&#8377;0";
    }
}