<script type="text/javascript">
        // For Place New Spot Frame
        jQuery(document).ready(function(){
            var countPlaceForm = size_of_pos;
            if(size_of_pos != 0){
                countPlaceForm = size_of_pos - 1;
            }else{
                countPlaceForm = size_of_pos;
            }

            var placeFormTemplate = jQuery('.place-form').eq(0).clone();
            jQuery('.article-place-add').click(function(){
                var fieldset = jQuery(this).parent('.article-places');
                var placeForm =  fieldset.find('.place-form:last-child');
				placeFormTemplate.find('textarea').text(''); // Newly Add
                placeFormTemplate.find('iframe.embed_map').remove();
				placeFormTemplate.find('.marker-parent').html('');
				//placeFormTemplate.appendTo('.place-form:last-child');
                var newPlaceForm = placeFormTemplate.clone();
                countPlaceForm++;

                newPlaceForm.find('.spot-no').attr('name', 'spot_No_' + countPlaceForm);
                newPlaceForm.find('.spot-no').attr('id', 'spot_No_' + countPlaceForm);
                newPlaceForm.find('.spot-title').attr('name', 'spot_Mtitle_' + countPlaceForm);
                newPlaceForm.find('.spot-title').attr('id', 'spot_Mtitle_' + countPlaceForm);
                newPlaceForm.find('.spot-address').attr('name', 'spot_Address_' + countPlaceForm);
                newPlaceForm.find('.spot-address').attr('id', 'spot_address_' + countPlaceForm);
                newPlaceForm.find('.show-map').attr('id', 'show_map_' + countPlaceForm);
                newPlaceForm.find('.spot-maplink').attr('name', 'spot_MapLink_' + countPlaceForm);
                newPlaceForm.find('.spot-maplink').attr('id', 'spot_maplink_' + countPlaceForm);

                newPlaceForm.find('.thumb_image_url').attr('name', 'spot_Thumb_image_url_' + countPlaceForm);
                newPlaceForm.find('.thumb_upload_btn').attr('name', 'thumb_upload_Btn_' + countPlaceForm);
                newPlaceForm.find('.thumb_image_url').attr('id', 'spot_thumb_image_url_' + countPlaceForm);
                newPlaceForm.find('.thumb_upload_btn').attr('id', 'thumb_upload_btn_' + countPlaceForm);

                newPlaceForm.find('.spot_image_url').attr('name', 'spot_Image_url_' + countPlaceForm + '[]');
                newPlaceForm.find('.spot_upload_btn').attr('name', 'spot_upload_Btn_' + countPlaceForm);
                newPlaceForm.find('.spot_image_url').attr('id', 'spot_image_url_' + countPlaceForm + '_1');
                newPlaceForm.find('.spot_upload_btn').attr('id', 'spot_upload_btn_' + countPlaceForm + '_1');
                newPlaceForm.find('.spot_upload_btn').attr('counter', 'spot_image_url_' + countPlaceForm + '_1');
                newPlaceForm.find('.add-spot-img').attr('id', 'add_spot_img_' + countPlaceForm);
                
                
                newPlaceForm.find('#add_spot_parent').attr('class', 'form-group add_spot_parent_' + countPlaceForm);
                newPlaceForm.find('#add_spot_div').attr('class', 'control-input add_spot_div_' + countPlaceForm);
                newPlaceForm.find('.delete_spot_img').attr('id', 'delete_spot_img_' + countPlaceForm + '_1');                 

                newPlaceForm.find('.insert-post').attr('id', 'insert_post_' + countPlaceForm);
				newPlaceForm.find('.remove_spot').attr('id', 'remove_spot_' + countPlaceForm);
                newPlaceForm.find('.remove_spot').css('display', 'block');
				newPlaceForm.find('.delete_spot').attr('id', 'delete_spot_' + countPlaceForm);
                newPlaceForm.find('.delete_spot').css('display', 'none');

                fieldset.find('.place-container').append(newPlaceForm);

				jQuery('#delete_spot_'+ (countPlaceForm-1)).css('display', 'block');
				jQuery('#delete_spot_0').css('display', 'none');
				//console.log('#delete_spot_'+ (countPlaceForm-1));
                add_short_code(countPlaceForm);
                //show_embed_map(countPlaceForm);
                uploader(countPlaceForm);
                uploaderSelf(countPlaceForm, 1);
                removeSpotImage(countPlaceForm, 1);
                //uploaderSelf(countPlaceForm);
                jQuery('#remove_spot_'+countPlaceForm).click(function(){
					//console.log('Execute first');
                    //jQuery(this).parent('.place-form').remove();
					var retVal = confirm("Are you sure! You want to Remove This Spot?");
					if( retVal == true ){
					   jQuery(this).parent('.place-form').remove();
					   jQuery('#delete_spot_'+ (countPlaceForm-1)).css('display', 'none');
					}
					else{}
				});
                
            }); // Articlae Place Add End

           jQuery('.remove_spot').click(function(){
				//console.log('Execute Second');
                //jQuery(this).parent('.place-form').remove();
			    var retVal = confirm("Do you want to continue ?");
			    if( retVal == true ){
				   jQuery(this).parent('.place-form').remove();
			    }
			    else{}
            });           
        });
</script>