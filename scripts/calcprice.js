function calcprice(cat,catid,typ,cf,o,ws,pl,fr,fw,uw,pw,vr,bt,btw,s,sw,lc,lcw,ct,ctw,cw,cww,iw,iww,ow,oww,lb,lbw,ld,ldw,ls,lsw,jt,jtw,tb,tbw,brsr,brsw,brdr,brdw,brwr,brww,wpr,wpw,hpr,hpw,trabr,trabw)
{
    var qty=1,nc=1,wlength=0,wwidth=0,opacityreq=0,mount=0,motorized=0,powertype=0,controltype=0;
    qty = document.getElementById("quantity").value;
    wlength = document.getElementById("wlength").value;
    wwidth = document.getElementById("wwidth").value;
    if(wlength && wwidth)
    {
        if(document.getElementById("pyes").checked) nc = 2;
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
        xhttp.open("POST", "calcprice.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cat="+cat+"&catid="+catid+"&typ="+typ+"&qty="+qty+"&nc="+nc+"&wlength="+wlength+"&wwidth="+wwidth+"&opacityreq="+opacityreq+"&mount="+mount+"&motorized="+motorized+"&powertype="+powertype+"&controltype="+controltype+"&cf="+cf+"&o="+o+"&ws="+ws+"&pl="+pl+"&fr="+fr+"&fw="+fw+"&uw="+uw+"&pw="+pw+"&vr="+vr+"&bt"+bt+"&s="+s+"&lc="+lc+"&ct="+ct+"&cw="+cw+"&iw="+iw+"&ow="+ow+"&lb="+lb+"&ld="+ld+"&ls="+ls+"&jt="+jt+"&tb="+tb+"&brsr="+brsr+"&brdr="+brdr+"&brwr="+brwr+"&trabr="+trabr+"&btw="+btw+"&sw="+sw+"&lcw="+lcw+"&ctw="+ctw+"&cww="+cww+"&iww="+iww+"&oww="+oww+"&lbw="+lbw+"&ldw="+ldw+"&lsw="+lsw+"&jtw="+jtw+"&tbw="+tbw+"&brsw="+brsw+"&brdw="+brdw+"&brww="+brww+"&trabr="+trabw); 
    }
}

