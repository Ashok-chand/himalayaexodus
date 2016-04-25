<!-- multistep form -->
<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/step-form.css">
<div class="form-wrapper">
    <form id="msform">
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">Personal Info</li>
		<li>Travel details</li>
		<li>Confirmation</li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
            <h2 class="fs-title">Personal Info</h2>
                <div class="field_wrap">
                <label>Title:</label>
                <select class="input_field" name="gender">
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Miss.">Miss.</option>
                </select>
                </div>
                <div class="field_wrap">
                <label>Full Name*:</label>
                <input class="input_field required" type="text" id="name" name="name" placeholder="Full Name" />
                </div>
                <div class="field_wrap">
                <label>Date of Birth:</label>
                <div class="input-group date birth_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="input_field" type='text' class="form-control" data-date-format="YYYY/MM/DD" name="birth_date" id="birth_date"  readonly="readonly" placeholder="Date of Birth"/>
			<span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
                </div>
                </div>
                <div class="field_wrap">
                <label>Passport Number:</label>
                <input class="input_field" type="text" id="passport" name="passport" placeholder="Passport Number" />
                </div>
                <div class="field_wrap">
                <label>Email Address*:</label>
                <input class="input_field required" type="text" id="email" name="email" placeholder="Email Address" />
                </div>
                <div class="field_wrap">
                <label>Nationality*:</label>
                <input class="input_field" type="text" id="nationality" name="nationality" placeholder="Nationality" />
                </div>
                 <div class="field_wrap">
                <label>State or Province:</label>
                <input class="input_field" type="text" id="state" name="state" placeholder="State or Province" />
                </div>
                 <div class="field_wrap">
                <label>City*:</label>
                <input class="input_field" type="text" id="city" name="city" placeholder="City" />
                </div>
                <div class="field_wrap">
                <label>Phone No.*:</label>
                <input class="input_field" type="text" id="phone" name="phone" placeholder="Phone No." />
                </div>
		
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
            <h2 class="fs-title">Travel Details</h2>
                <div class="field_wrap">
                <label>Pickup Date:</label>
                <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="input_field" placeholder="Pickup Date" type='text' class="form-control" data-date-format="YYYY/MM/DD" name="from-date" id="from-date"  readonly="readonly" required/>
			<span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
                </div>
													
                </div>
                <div class="field_wrap">
                <label>Drop Off Date:</label>
                <div class="input-group date to_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="input_field" placeholder="Drop Off Date" type='text' class="form-control" data-date-format="YYYY/MM/DD" name="to-date" id="to-date"  readonly="readonly" required/>
			<span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> 
                </div>
                </div>
                <div class="field_wrap">
                <label>No. of Travellers*:</label>
                <input class="input_field" type="number" name="no_traveller" id="no_traveller" placeholder="No. of Travellers" />
                </div>
                <div class="field_wrap">
                <label>How did you find Himalayan Exodus*:</label>
                <select name="howfind" class="input_field">
                    <option value="Select">Select</option>
                    <option value="Google Search">Google Search</option>
                    <option value="Yahoo">Yahoo</option>
                    <option value="Face-book">Face-book</option>
                    <option value="Twitter">Twitter</option>
                    <option value="Newsletter">Newsletter</option>
                    <option value="I m a Previous Client">I m a Previous Client</option>
                    <option value="Others">Others</option>
                </select>
                </div>
                <div class="field_wrap">
                <label>Comments/Questions:</label>
                <textarea name="message" id="message" cols="40" rows="4"  placeholder="Comments"></textarea> 
                </div>
                 <div class="field_wrap">
                <label>Word Verification:</label>
                <input class="input_field" type="text" name="state" placeholder="" />
                </div>
               <input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
        <fieldset class="last_tab">
            <h2 class="fs-title">Confirmation</h2>
            <div class="field_wrap">
                    <label>Name: </label>
                    <strong>Harish shresth</strong>
            </div>
            <div class="field_wrap">
                    <label>Email Address: </label>
                    <strong>demo@gmail.com</strong>
            </div>
            <div class="field_wrap">
                    <label>Phone No.: </label>
                    <strong>01-454 5454</strong>
            </div>
            <div class="field_wrap">
                    <label>Pickup Date: </label>
                    <strong>12 March, 2016</strong>
            </div>
            <div class="field_wrap">
                    <label>Drop Off Date: </label>
                    <strong>16 March, 2016</strong>
            </div>
            <div class="field_wrap">
                    <label>No. of Travellers: </label>
                    <strong>10</strong>
            </div>
            
            <div class="field_wrap subscribe_check">
                    <label>Subscribe to our Newsletter: </label>
                    <input type="checkbox" class="agree_button" name="subscribe" value="subscribe" id="subscribe" />Yes
                </div>
		<div class="field_wrap">
                    <input type="radio" class="agree_button" name="agree" value="agree" id="agree" />I agree to Himalaya Exodus Terms and Conditions
                </div>
		
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="submit" name="submit" class="submit action-button" value="Submit" />
	</fieldset>
</form>
</div>


<!-- jQuery -->
<!-- jQuery easing plugin -->
<script src="<?php bloginfo('template_url'); ?>/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url');?>/js/step-form.js"></script>