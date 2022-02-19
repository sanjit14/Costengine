function bbutton(protocol,host,port,path,val)
{
    //if(document.getElementById("bbutton") != null) 
    //{
        if(port) url = host+":"+port;
        if(path) url = protocol+"//"+url;
        if(host == "localhost") url = url+"/Tulio";
        //alert(protocol+" "+host+" "+port+" "+url);
        //val = document.getElementById("bbutton").innerHTML;
        //alert(url);
        if(val == "Explore Collection") location.replace(url+"/index.php?p=product-list&cat_id=1");
        if(val == "Login") location.replace(url+"/index.php?p=login");
        if(val == "View All Products") location.replace(url+"/index.php?p=product-list&cat_id=1");
        if(val == "Explore Tulio Portal") location.replace(url+"/index.php?p=designers");
        if(val == "Explore Portfolio") location.replace(url+"/index.php?p=hotelier");
        if(val == "Explore Tulio Care Program") location.replace(url+"/care-program.html");

    //}
}