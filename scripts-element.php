    <!--<script src="./scripts/jquery.min.js"></script>-->
    <script src="./scripts/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="./scripts/main.js"></script>
    <script src="./scripts/instafeed.min.js"></script>
    <script src="./scripts/tulio-instagram.js"></script>
    <script src="./scripts/footer-form-validation.js"></script>
    <script src="./scripts/collapsible.js"></script>
    <script src="./scripts/calcprice.js"></script>
    <script src="./scripts/blinds.js"></script>
    <script src="./scripts/motorizedoptions.js"></script>
    <script src="./scripts/prodlistdropdown.js"></script>
    <script src="./scripts/productslistfilter.js"></script>
    <script src="./scripts/bbutton.js"></script>
      <script src="./scripts/cur.js"></script>
      <script src="./scripts/bli.js"></script>

      <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<script src="http://code.jquery.com/ui/1.8.24/jquery-ui.min.js" type="text/javascript"></script>
<link href="http://code.jquery.com/ui/1.8.24/themes/blitzer/jquery-ui.css" rel="stylesheet"type="text/css" />

<script type="text/javascript">
$(function () {
    $("#dvSource div").draggable({
        revert: "invalid",
        refreshPositions: true,
        drag: function (event, ui) {
            ui.helper.addClass("draggable");
        },
        stop: function (event, ui) {
            ui.helper.removeClass("draggable");
            var image = this.src.split("/")[this.src.split("/").length - 1];
            if ($.ui.ddmanager.drop(ui.helper.data("draggable"), event)) {
                alert(image + " dropped.");
            }
            else {
                alert(image + " not dropped.");
            }
        }
    });
    $("#dvDest").droppable({
        drop: function (event, ui) {
            if ($("#dvDest div").length == 0) {
                $("#dvDest").html("");
            }
            ui.draggable.addClass("dropped");
            $("#dvDest").append(ui.draggable);
        }
    });
    $("#dvDest div").draggable({
        revert: "invalid",
        refreshPositions: true,
        drag: function (event, ui) {
            ui.helper.addClass("draggable");
        },
        stop: function (event, ui) {
            ui.helper.removeClass("draggable");
            var image = this.src.split("/")[this.src.split("/").length - 1];
            if ($.ui.ddmanager.drop(ui.helper.data("draggable"), event)) {
                alert(image + " dropped.");
            }
            else {
                alert(image + " not dropped.");
            }
        }
    });
    $("#dvSource").droppable({
        drop: function (event, ui) {
            if ($("#dvSource div").length == 0) {
                $("#dvSource").html("");
            }
            ui.draggable.addClass("dropped");
            $("#dvSource").append(ui.draggable);
        }
    });
});
</script>
