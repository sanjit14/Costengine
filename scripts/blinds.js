function blinds(cat,catid,typ,cf,o,ws,fr,fw,uw,pw,vr,s,sw,iw,iww,ow,oww,lb,lbw,ld,ldw,ls,lsw,wpr,wpw,hpr,hpw)
{
    var qty=1,nc=1,wlength=0,wwidth=0,opacityreq=0,mount=0,motorized=0,powertype=0,controltype=0;
    qty = document.getElementById("quantity").value;
    wlength = document.getElementById("wlength").value;
    wwidth = document.getElementById("wwidth").value;
    if(wlength && wwidth)
    {
        if(document.getElementById("lt_blackout").checked) opacityreq = 2;
        else if (document.getElementById("lt_dimout").checked) opacityreq = 1;
        else opacityreq = 0;
        if(document.getElementById("wallmount").checked) mount = 1;
        if(document.getElementById("motorized").checked) motorized = 1;
        if(document.getElementById("battery").checked) powertype = 1;
        if(document.getElementById("remote").checked) controltype = 1;

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
        xhttp.open("POST", "blinds.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cat="+cat+"&catid="+catid+"&typ="+typ+"&qty="+qty+"&wlength="+wlength+"&wwidth="+wwidth+"&opacityreq="+opacityreq+"&mount="+mount+"&motorized="+motorized+"&powertype="+powertype+"&controltype="+controltype+"&cf="+cf+"&o="+o+"&ws="+ws+"&fr="+fr+"&fw="+fw+"&uw="+uw+"&pw="+pw+"&vr="+vr+"&s="+s+"&iw="+iw+"&ow="+ow+"&lb="+lb+"&ld="+ld+"&ls="+ls+"&wpr="+wpr+"&hpr="+hpr+"&sw="+sw+"&iww="+iww+"&oww="+oww+"&lbw="+lbw+"&ldw="+ldw+"&lsw="+lsw+"&wpw="+wpw+"&hpw="+hpw); 
    }
}

