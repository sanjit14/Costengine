
$(document).ready(function(){
    $("#enquiry-form").submit(function(event){
        event.preventDefault();
 
        var valid = true;
        //$(".info").html("");
        $("#nm").css('border', 'none');
        $("#ph").css('border', 'none');
        $("#em").css('border', 'none');
        $('.lbl').css('color', '#666666');

        var nm = $("#nm").val();
        var ph = $("#ph").val();
        var em = $("#em").val();
        var cl = "";
        var nl = "";
        if($('input[name="clients"]').is(":checked"))
        {
            cl = $('input[name="clients"]:checked').val();
        }
        else
        {
            $('.lbl').css('color', '#e66262');
            valid = false;
        }
        if ($('#nl').is(":checked"))
        {
            nl = $('#nl').val();
        }

        if (nm == "") {
          //  $("#userName-info").html("Required.");
            $("#nm").css('border', '#e66262 1px solid');
            valid = false;
        }
        if (em == "") {
          //  $("#em").html("Required.");
            $("#em").css('border', '#e66262 1px solid');
            valid = false;
        }
        if (!em.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/))
        {
          //  $("#em").html("Invalid Email Address.");
            $("#em").css('border', '#e66262 1px solid');
            valid = false;
        }

        if (ph == "") {
            //$("#subject-info").html("Required.");
            $("#ph").css('border', '#e66262 1px solid');
            valid = false;
        }

        if (valid)
        {
                //alert('Form validated successfully');
            var formValues= $(this).serialize();
  
            $.post("send-email.php", formValues, function(data){

                // Display the returned data in browser
                $("#result").html('<div style="color:green">'+data+'</div>');
                $("#result").fadeIn(2500);
                $("#result").fadeOut(2500);

                alert(data);
                $("#enquiry-form")[0].reset();
            });
        }
    });
    $("#affiliate-form").submit(function(event){
        event.preventDefault();
 
        var valid = true;
        //$(".info").html("");
        $("#afnm").css('border', 'none');
        $("#aforg").css('border', 'none');
        $("#afem").css('border', 'none');
        $("#afph").css('border', 'none');

        var nm = $("#afnm").val();
        var org = $("#aforg").val();
        var em = $("#afem").val();
        var ph = $("#afph").val();


        if (nm == "") {
          //  $("#userName-info").html("Required.");
            $("#afnm").css('border', '#e66262 1px solid');
            valid = false;
        }
        if (org == "") {
            //  $("#userName-info").html("Required.");
            $("#aforg").css('border', '#e66262 1px solid');
            valid = false;
        }
        if (em == "") {
          //  $("#em").html("Required.");
            $("#afem").css('border', '#e66262 1px solid');
            valid = false;
        }
        if (!em.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/))
        {
          //  $("#em").html("Invalid Email Address.");
            $("#afem").css('border', '#e66262 1px solid');
            valid = false;
        }

        if (ph == "") {
            //$("#subject-info").html("Required.");
            $("#afph").css('border', '#e66262 1px solid');
            valid = false;
        }

        if (valid)
        {
                //alert('Form validated successfully');
            var formValues= $(this).serialize();
  
            $.post("send-email.php", formValues, function(data){

                // Display the returned data in browser
                $("#result").html('<div style="color:green">'+data+'</div>');
                $("#result").fadeIn(2500);
                $("#result").fadeOut(2500);

                alert(data);
                $("#enquiry-form")[0].reset();
            });
        }
    });
});


    
  