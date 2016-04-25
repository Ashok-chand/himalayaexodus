<style type="text/css">
    #profileForm .content {
        min-height: 100px;
    }
    #profileForm .content > .body {
        width: 100%;
        height: auto;
        padding: 15px;
        position: relative;
    }
</style>
<?php
global $post;
?> 
<form id="profileForm" method="post" class="form-horizontal" action="#">
    <input type="hidden" name="post_id" id="post_id" value="<?php echo $post->ID; ?>">
    <h2>Personal Info</h2>
    <section data-step="0">

        <div class="form-group">
           
            <label class="col-xs-4 control-label">Title</label>
            <div class="col-xs-8">
                <select class="form-control" name="gender">
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Miss.">Miss.</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-4 control-label">Full Name*:</label>
            <div class="col-xs-8">

                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name"/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-4 control-label">Date of Birth:</label>
            <div class="col-xs-8">
                <input class="form-control birth_day" type='text' class="form-control" data-date-format="YYYY/MM/DD"  name="birth_date" id="birth_date"  placeholder="Date of Birth"/>
            </div>
        </div>

        <div class="form-group">

            <label class="col-xs-4 control-label">Passport Number:</label>
            <div class="col-xs-8">
                <input class="form-control" type="text" id="passport" name="passport" placeholder="Passport Number" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-4 control-label">E-mail Address *</label>
            <div class="col-xs-8">
                <input class="form-control" type="text" id="email" name="email" placeholder="Email Address" required/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-4 control-label">Nationality *:</label>
            <div class="col-xs-8">
                <input class="form-control" type="text" id="nationality" name="nationality" placeholder="Nationality" required/>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-4 control-label">State or Province:</label>
            <div class="col-xs-8">
                <input class="form-control" type="text" id="state" name="state" placeholder="State or Province" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-4 control-label">City *:</label>
            <div class="col-xs-8">
                <input class="form-control" type="text" id="city" name="city" placeholder="City" required/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-4 control-label">Phone No *:</label>
            <div class="col-xs-8">
                <input class="form-control" type="text" id="phone" name="phone" placeholder="Phone No." />
            </div>
        </div>
    </section>

    <h2>Travel Details</h2>
    <section data-step="1">
        <div class="form-group">
        <label class="col-xs-4 control-label">Pickup Date:</label>
        <div class="col-xs-8 dateContainer">
            <div class="input-group input-append date" id="startDatePicker">
                <input type="text" class="form-control"  name="from_date" id="from_date"  />
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-4 control-label">Drop Off Date:</label>
        <div class="col-xs-8 dateContainer">
            <div class="input-group input-append date" id="endDatePicker">
                <input type="text"  class="form-control" name="to_date" id="to_date" />
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
        
        <div class="form-group">
            <label class="col-xs-4 control-label">No. of Travellers*:</label>

            <div class="col-xs-8">
                <input class="form-control" type="number" name="no_traveller" id="no_traveller" placeholder="No. of Travellers" />
            </div>

        </div>
        <div class="form-group">
            <label class="col-xs-4 control-label">How did you find Himalayan Exodus*:</label>

            <div class="col-xs-8">
                <select name="howfind" class="form-control" required="required">
                    <option value="">Select</option>
                    <option value="Google Search">Google Search</option>
                    <option value="Yahoo">Yahoo</option>
                    <option value="Face-book">Face-book</option>
                    <option value="Twitter">Twitter</option>
                    <option value="Newsletter">Newsletter</option>
                    <option value="Previous_Client">I m a Previous Client</option>
                    <option value="Others">Others</option>
                </select>
            </div>

        </div>
        <div class="form-group">
            <label class="col-xs-4 control-label">Comments:</label>
            <div class="col-xs-8">
                <textarea class="form-control" name="message" id="message" cols="40" rows="4"  placeholder="Comments"></textarea> 
            </div>            
        </div>

        <div class="row">
            <div class="form-group">
               

                    <label>Please note the numbers and letters and copy them into this box </label>
                    <div class="col-xs-8">
                    <p><img src="<?php echo get_template_directory_uri();?>/captcha/blank.png" class="captcha" id="captcha_image" alt="" />
                        <a href="#" id="captcha_refresh"><img src="<?php echo get_template_directory_uri();?>/images/reload.png"></a>
                    <input type="text" name="security_code" required="required" value="" class="input" />
                    </div>
                </div>
            
        </div>



    </section>
    <h2>Confirmation</h2>
    <section data-step="2">
        <div class="field_wrap">
            <label>Name: </label>
            <strong id="confirmName"></strong>
        </div>
        <div class="field_wrap">
            <label>Email Address: </label>
            <strong id="confirmEmail"></strong>
        </div>
        <div class="field_wrap">
            <label>Phone No.: </label>
            <strong  id="confirmPhoneNo"></strong>
        </div>
        <div class="field_wrap">
            <label>Pickup Date: </label>
            <strong id="confirmFromDate"></strong>
        </div>
        <div class="field_wrap">
            <label>Drop Off Date: </label>
            <strong id="confirmToDate"></strong>
        </div>
        <div class="field_wrap">
            <label>No. of Travellers: </label>
            <strong id="confirmTravellerNo"></strong>
        </div>

        <div class="field_wrap subscribe_check">
            <label>Subscribe to our Newsletter: </label>
            <input type="checkbox" class="agree_button" name="subscribe" value="subscribe" id="subscribe" value="1" />Yes
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" class="agree_button" name="agree" value="1" id="agree"/> I agree to Himalaya Exodus Terms and Conditions
                    </label>
                </div>
            </div>
        </div>


    </section>
</form>

<div class="modal fade" data-backdrop="static" data-keyboard="false" id="bookingModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Welcome</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">Thank you for booking</p>
            </div>
        </div>
    </div>
</div>


