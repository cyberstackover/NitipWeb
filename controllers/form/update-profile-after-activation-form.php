
<form action="classes/update-profile-after-activation.php" method="post" enctype="multipart/form-data" id="UploadForm" autocomplete="off">
    <div class="col-md-6">
        <div class="form-group float-label-control">
            <label for="">First Name</label>
            <input type="text" class="form-control" placeholder="First Name" name="user_firstname" required>
        </div>
        <div class="form-group float-label-control">
            <label for="">Last Name</label>
            <input type="text" class="form-control"  placeholder="Last Name=" name="user_lastname" required>
        </div>
        <div class="form-group float-label-control">
            <label for="">Profile Picture</label>
            <center><input name="ImageFile"  class="btn btn-primary ladda-button" data-style="zoom-in"  type="file"/></center>
        </div>           
    </div>    
    <div class="col-md-6">
        <label for="">Username</label>
        <div class="form-group float-label-control">
            <a href=#>        
                <div class="input-group">
                    <span class="input-group-addon">http://</span>
                    <fieldset disabled> 
                        <input type="text" class="form-control" placeholder="<?php echo $username; ?>" name="username" id="disabledTextInput" autocomplete="off" required>
                    </fieldset>
                </div>
            </a>
        </div>
        <div class="form-group float-label-control">
            <label for="">Email</label>
            <input type="text" class="form-control" placeholder="<?php echo $email;?>" name="user_email" value="<?php echo "$email"; ?>" required>
        </div>
    </div>          

    <hr>                 

    <div class="submit">           
        <center>
            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" />Save Your Profile</button>
        </center>
    </div>
</form>


	
