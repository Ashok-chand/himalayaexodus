// for image upload jquery
jQuery(function (jQuery) {

    jQuery('.custom_upload_image_button').click(function () {
        formfield = jQuery(this).siblings('.custom_upload_image');
        preview = jQuery(this).siblings('.custom_preview_image');
        tb_show('', 'media-upload.php?type=image&TB_iframe=true');
        window.send_to_editor = function (stuff) {
            //console.log(stuff);
            var data = jQuery(stuff).filter('img');
            //console.log(data);
            imgurl = data.attr("src");
            //console.log(imgurl);
            classes = data.attr("class");
            //console.log(classes);
            id = classes.replace(/(.*?)wp-image-/, '');
            formfield.val(id);
            preview.attr('src', imgurl);
            tb_remove();

        }
        return false;
    });

    jQuery('.custom_clear_image_button').click(function () {
        var defaultImage = jQuery(this).parent().siblings('.custom_default_image').text();
        jQuery(this).parent().siblings('.custom_upload_image').val('');
        jQuery(this).parent().siblings('.custom_preview_image').attr('src', defaultImage);
        return false;
    });

    ///for repeatable add

    jQuery(document).on('click','.repeatable-add', function (e) {
    
        e.preventDefault();
        
        
        fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
        
        var html = '';
        var counter = 0;
        $.each(jQuery(this).closest('td').find('.custom_repeatable li'), function (index, item) {
            counter++;
        });
        if ($(this).attr('id') == "faqs") {

            html += '<li>';
            html += '<span><label>Question</label></span><br/><input class="full_length" id="repeatable_info_two_faqs' + counter + '" name="repeatable_info_two_faqs[' + counter + '][0]" size="30" type="text" value=""><br />';
            html += '<span><label>Answer</label></span><br/>';
            html += '<textarea class="faqs" id="repeatable_info_two_faqs_' + counter + '" name="repeatable_info_two_faqs[' + counter + '][1]" cols="90" rows="4"></textarea>';
            html += '<a class="repeatable-remove button" href="#">-</a></li>';
           
            $(html).insertAfter(fieldLocation, jQuery(this).closest('td'));
            
            CKEDITOR.replace('repeatable_info_two_faqs_' + counter + '');
            
        } else if ($(this).attr('id') == "itinerary") {
            html += '<li>';
            html +=  '<span><label>Title</label></span><br/> <input class="full_length" id="repeatable_info_itinerary' + counter + '" name="repeatable_info_itinerary[' + counter + '][0]" size="30" type="text" value=""><br />';
            html +=  '<span><label>Description</label></span><br/><textarea class="itinerary"  id="repeatable_info_itinerary_' + counter + '" name="repeatable_info_itinerary[' + counter + '][1]"  cols="90" rows="4"></textarea>';
            html += '<a class="repeatable-remove button" href="#">-</a></li>';
           
            $(html).insertAfter(fieldLocation, jQuery(this).closest('td'));
            CKEDITOR.replace('repeatable_info_itinerary_' + counter + '');
            
        } else {
            
            field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
            
            jQuery('.custom_preview_image', field).attr('src','');
            
            jQuery('input, textarea', field).val('').attr('name', function (index, name) {
                return name.replace(/(\d+)/, function (fullMatch, n) {
                    return Number(n) + 1;
                });
            })
            jQuery('input, textarea', field).attr('id', function (index, name) {
                return name.replace(/(\d+)/, function (fullMatch, n) {
                    return Number(n) + 1;
                });
            })

            field.insertAfter(fieldLocation, jQuery(this).closest('td'));
        }


        return false;

    });


    jQuery(document).on('click','.repeatable-remove', function () {
        counter = 0;
        $.each(jQuery(this).closest('ul').find('li'), function (index, item) {
            counter++;
        });
        
        if (counter > 1) {
            jQuery(this).parent().remove();
            
            return false;
        } else {
            return false;
        }
    });

    jQuery('.custom_repeatable').sortable({
        opacity: 0.6,
        revert: true,
        cursor: 'move',
        handle: '.sort'
    });

});



