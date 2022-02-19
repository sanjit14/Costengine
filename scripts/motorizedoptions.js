function displaymotorizedoptions()
{
    if(document.getElementById("cur_motorized") != null)
    {
        if(document.getElementById("cur_motorized").checked)
        {

            document.getElementById("cur_motorizedoptions").style.visibility="visible";
            document.getElementById("cur_motorizedoptions").style.display="block";
        }
        else
        {
            document.getElementById("cur_motorizedoptions").style.visibility="hidden";
            document.getElementById("cur_motorizedoptions").style.display="none";
        }
    }
    if(document.getElementById("bli_motorized") != null)
    {
        if(document.getElementById("bli_motorized").checked)
        {

            document.getElementById("bli_motorizedoptions").style.visibility="visible";
            document.getElementById("bli_motorizedoptions").style.display="block";
        }
        else
        {
            document.getElementById("bli_motorizedoptions").style.visibility="hidden";
            document.getElementById("bli_motorizedoptions").style.display="none";
        }
    }
}

