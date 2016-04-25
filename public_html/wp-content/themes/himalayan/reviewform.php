<form class="review_form" id="review_form" method="post" action="">
    <div class="form-group">
            <label class="col-xs-4 control-label">Full Name*:</label>
            <div class="col-xs-8">
               
                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name"/>
            </div>
    </div>
    <div class="form-group">
            <label class="col-xs-4 control-label">Address:</label>
            <div class="col-xs-8">
               
                <input type="text" class="form-control" id="address" name="address" placeholder="Address"/>
            </div>
    </div>
     <div class="form-group">
            <label class="col-xs-4 control-label">Title*:</label>
            <div class="col-xs-8">
               
                <input type="text" class="form-control" id="title" name="title" placeholder="Title"/>
            </div>
    </div>
    <div class="form-group">
            <label class="col-xs-4 control-label">Description*:</label>
            <div class="col-xs-8">
                <textarea class="form-control" name="description" id="description" cols="40" rows="4"  placeholder="Comments"></textarea> 
            </div>            
    </div>
    <div class="form-group">
            <label class="col-xs-4 control-label">Image:</label>
            <div class="col-xs-8">
               <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary btn-file">
                        Browse&hellip; <input type="file" id="image" name="image" multiple>
                    </span>
                </span>
                <input type="text" class="form-control"  readonly>
            </div>
                
            </div>
    </div>
    <div class="form-group">
            <label class="col-xs-4 control-label">Review Rate:</label>
            <div class="col-xs-8 radio_button">
               
                <input type="radio"  name="review_rate" value="1"/>One 
                <input type="radio"  name="review_rate" value="2"/>Two 
                <input type="radio"  name="review_rate" value="3"/>Three 
                <input type="radio"  name="review_rate" value="4"/>Four 
                <input type="radio"  name="review_rate" value="5"/>Five 
            </div>
    </div>
    <div class="form-group">
            
            <div class="col-xs-12">
               
                <input type="submit" class="btn btn-primary"  name="submit" value="Submit"/>
            </div>
    </div>
</form>