<!-- <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script> -->
<!-- <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script> -->
<!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=geometry,places&sensor=false"></script> -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap,libraries=geometry,places&sensor=false"></script>
<script src="js/jquery.min.js"></script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=geometry,places"></script> -->
<style type="text/css">
	ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 600px;
    background-color: #f1f1f1;
}

li {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

/* Change the link color on hover */
li:hover {
    background-color: #fcf5e3;
    color: white;
    border: solid;
}
	#wrapper {
    height: 250px;
    width: 100%;
    overflow: auto;
}
</style>
<script type="text/javascript">
   function initialize() {
      var input = document.getElementById('searchTextField');
      var input1 = document.getElementById('searchTextField1');
	  var autocomplete = new google.maps.places.Autocomplete(input);
      var autocomplete = new google.maps.places.Autocomplete(input1);
   }
   // google.maps.event.addDomListener(window, 'load', initialize);

   function cariTraveller() {
   		var asal = document.getElementById("awal").value;
		var tujuan = document.getElementById("akhir").value;

		$.ajax({ //Process the form using $.ajax()
            type      : 'GET', //Method type
            url       : 'http://herwintika.id/nitip/getTrip.php?asal='+asal+'&tujuan='+tujuan, //Your form processing file URL
            // dataType  : 'json',
            success   : function(traveler) {
            	// alert('test');
            	console.log(traveler);
            
            // text = text + "<li><div class='partners-item'><a href='#'><img id='imagitem' src='userfiles/item-pic/canon-9801982152.jpg' alt=''/><span class='caption'>Rp. 100.K</span></a></div></li>";  
            document.getElementById("listtrip").innerHTML = traveler;
            }             
        });
	
   	// body...
   }

   function setidtrip(a) {
   		document.getElementById("tripId").value = a;
   		document.getElementById("listtrip").innerHTML = '';
   }

   function titip(a) {
   		alert(a);
   }

</script>


<form method="post" id="createRequestForm" action="classes/request-item.php" enctype="multipart/form-data">
	<?php if($reqmessage){?>
		<label><font color="red">Request Gagal Mohon Untuk Memilih Trip Reverence Terlebih Dahulu ... !!!</font></label>
		<br>
	<?php }?>
	<?php if(!$tripID){?>
	<label>Trip Reference</label>
	<div class="form-group" style="margin-bottom: 25px;padding-bottom: 25px;">
		    
			<div class="col-sm-3">
			<input name="awal" class="form-control" id="awal" type="text" size="10" placeholder="E.g. London, England" autocomplete="on">
			</div>
			<div class="col-sm-1">To</div> 
			<div class="col-sm-3">
			<input name="akhir" class="form-control" id="akhir" type="text" size="10" placeholder="E.g. Jakarta, Indonesia" autocomplete="on">
			</div>
			<div class="col-sm-2">
			<button class="btn btn-primary ladda-button" data-style="zoom-in" type="button"  id="searchButton" onclick="cariTraveller()" />Search Trip</button>
			</div>
			<div class="col-sm-3">(<font color="red">*</font>) Cari Traveller yang bisa dititipi </div>
	</div>
	<div class="form-group">
		<!-- <div id="wrapper" > -->
		<div id="listtrip"></div>
		<!-- <label>Trip List Reference :</label>
		<ul> -->
		  <!-- <li>
		  <table>
		  <tbody>
		  	<tr>
		  		<td width="90%">
		  			<span style="float: left;">Nama User : Kota asal - Tujuan, Tanggal Kembali</span>
		  		</td>
		  		<td width="10%">
		  			<button class="btn btn-primary ladda-button" type="button" onclick="titip(1)" />Titipin</button>
		  		</td>
		  	</tr>
		  </tbody>
		  </table>
		  </li> -->


		  <!-- <li><span style="float: left;">Nama User : Kota asal - Tujuan, Tanggal Kembali</span><button class="btn btn-primary ladda-button" type="button" onclick="titip(1)" />Titipin</button></li> -->
		<!-- </ul> -->

		<!-- </div> -->
		<!-- <a href="">
			<table width="100%" style="margin-bottom: 10px;">
				<thead>
					<tr>
						<td colspan="2">
							Nama User
						</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td width="20%" valign="middle">
							<div class="commenterImage" style="margin-left: 50px;">
			                  <img src="http://placekitten.com/45/45" />
			                </div>
						</td>
						<td width="80%" valign="middle">
			                    <h3>Tanggal Kembali</h3><br>
			                    <span class="date sub-text">Tanggal Kembali</span>
						</td>

					</tr>
				</tbody>
			</table>				
		</a> -->
	</div>

	<?php } ?>
	<div class="form-group" >
		    <label>Trip Id</label>
		    <input class="form-control" id="tripId" name="tripId" maxlength="50" placeholder="What do you want to buy?" value="<?php echo $tripID;?>" readonly>
	</div>
	<div class="col-xs-12 col-sm-6" id="section1">
		<br>
		<h4>Item <span class="subtext">
		<!-- <i class="fa fa-chevron-circle-right"></i> -->
		</span></h4><br>
		<div class="form-group">
		    <label>Item name</label>
		    <input class="form-control" id="itemName" name="itemName" maxlength="50" placeholder="What do you want to buy?" required>
		</div>
		<div class="form-group">
		    <label>Item description</label>
		    <textarea class="form-control" rows="5" style="resize:none" id="itemDescription" name="itemDescription" maxlength="500"
		    placeholder="Describe your item e.g. size, quantity, colour, packaging, how to buy" required>
		    </textarea>
		</div>
		<div class="form-group">
		    <label>Category</label>
			<select class="form-control" id="category" name="category" required>
				<option value="" disabled selected>Select from list</option>
				<option value="nice">nice</option>
			</select>
		</div>

		<input type="hidden" name="parentRequestId" value="0"><input type="hidden" name="parentRecommendationId" value="0">						
		
		<!-- <div class="form-group">
				<label>Upload a picture</label>				
				<input type="file" name="file" id="file">
		</div> -->

		<div class="form-group float-label-control">
            <label for="">Upload Picture</label>
            <center><input name="ImageFile"  class="btn btn-primary ladda-button" data-style="zoom-in"  type="file" required></center>
        </div>        

		<div class="form-group">
		  	<label>URL</label>
		    <input class="form-control" id="url" name="url" placeholder="(Optional)">
		</div>
		
	</div>
	<div class="col-xs-12 col-sm-6" id="section2" >
		<br>
		<h4><span class="subtext">Location <span class="subtext">
		<!-- <i class="fa fa-chevron-circle-right"> -->
		</span></h4><br>
		<div id="locationField" class="form-group">
			<label>City to buy from</label>
	      	<input name='citybuy' class="form-control" id="searchTextField" type="text" size="50" placeholder="E.g. London, England" autocomplete="on">
	    </div>
	    
	    <div id="locationField" class="form-group">
			<label>Transaction Location </label>
	      	<input name="citytrans" class="form-control" id="searchTextField1" type="text" size="50" placeholder="E.g. Jakarta, Indonesia" autocomplete="on">
	    </div>
	
	</div>

	<div class="col-xs-12 col-sm-6" id="section3">
		<br>
		<h4>Transaction Price</h4><br>
		<table class="table borderless">
			<tr>
				<td style="vertical-align:middle;width:155px">
				
					<div class="hidden-xs">
						<label>Price you are willing to pay: 
						<!-- <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" data-html="true"></i> -->
						</label>
					</div>
				</td>
				<td style="width:45px">
					<input class="form-control" id="itemName" name="paid" maxlength="50" placeholder="1.000.000" required>
				</td>
			</tr>

		</table>
		<br>
		<div class="submit">           
	        <center>
	            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" />Request</button>
	        </center>
	    </div>
		<br><br>
	</div>
	<div class="col-xs-12 col-sm-3"></div>
</form>
