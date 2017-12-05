
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<!-- Load jQuery JS -->
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<!-- Load jQuery UI Main JS  -->
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<!-- Load SCRIPT.JS which will create datepicker for input field  -->
<script src="script.js"></script>

<link rel="stylesheet" href="runnable.css" />
<!-- <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script> -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap,libraries=geometry,places&sensor=false"></script>

<script type="text/javascript">
   function initialize() {
      var input = document.getElementById('searchTextField');
      var input1 = document.getElementById('searchTextField1');
      var autocomplete = new google.maps.places.Autocomplete(input);
      var autocomplete = new google.maps.places.Autocomplete(input1);
   }
   google.maps.event.addDomListener(window, 'load', initialize);

   /*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#datepicker" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });

    $('.tanggal').datepicker({
            dateFormat: 'yy-mm-dd'
        });
  }

);

</script>

<form action="classes/post-trip.php" method="post" enctype="multipart/form-data" id="UploadForm" autocomplete="off">  
        <br>
        <h4><span class="subtext">Location <span class="subtext">
        <!-- <i class="fa fa-chevron-circle-right"> -->
        </span></h4><br>
        <div id="locationField" class="form-group">
            <label>Travel To</label>
            <input name='travel' class="form-control" id="searchTextField" type="text" size="50" placeholder="E.g. London, England" autocomplete="on">
        </div>
        
        <div id="locationField" class="form-group">
            <label>Back To </label>
             <input name="back" class="form-control" id="searchTextField1" type="text" size="50" placeholder="E.g. Jakarta, Indonesia" autocomplete="on">
        </div>

        <div>
              <label> Pick a Date: </label> 
              <input name="tanggal" type="text" class="form-control tanggal" id="tanggal" value="<?php echo date('Y-m-d'); ?>"/></p>
        </div>

        <div class="submit">           
            <center>
                <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" />Post Trip</button>
            </center>
        </div>
</form>
