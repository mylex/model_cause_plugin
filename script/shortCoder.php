<script type="text/javascript">
        //Call This Function By Loop
        function add_short_code(id){
            // For Add Short Code
            jQuery('#insert_post_'+id).click(function(){
                cntx_count[id] = 0;
                var post_id = '<?php global $post; echo $post->ID; ?>';
                if(jQuery('.mce-tinymce').css('display') == 'none' || document.getElementById('content') != null){
                    var position = jQuery("#content").getCursorPosition();
                    var content = jQuery('#content').val();
                    var newContent = content.substr(0, position) + '[modelcause post_id="' +post_id+ '" id="' + id + '" ]' + content.substr(position);
                    jQuery('#content').val(newContent);

                }
                if(jQuery('.mce-tinymce').css('display') == 'block'){
                    tinymce.activeEditor.execCommand('mceInsertContent', false, '[modelcause post_id="' +post_id+ '" id="' + id + '" ]');
                }
                count[id]++;
                // tinymce.activeEditor.execCommand('mceInsertContent', false, '[modelcause post_id="' +post_id+ '" id="' + id + '" ]');
            });
            // Delete Function
            jQuery('#delete_spot_'+id).click(function(){
                //console.log('Execute outside');
                //jQuery(this).parent('.place-form').remove();
                var retVal = confirm("Are you sure! You want to Remove This Spot?");
                if( retVal == true ){
                    jQuery(this).closest('.place-form').remove();
                }
                else{}
            });
            jQuery('#show_map_'+id).click(function(){
                var fromAddress = document.getElementById('spot_address_'+id).value;
                var src = '';
                if(fromAddress != '' || fromAddress.length > 0){
                    src = 'https://maps.google.com/maps?&q=' + encodeURIComponent(fromAddress);
                    document.getElementById('spot_maplink_'+id).value = src;
                }  
            });
            // For Add More Spot Image
            jQuery('#add_spot_img_'+id).click(function(){
                var count = jQuery('.add_spot_parent_'+id).children('div').length;
                var dCount = count +1;
                var html = '<div class="control-input add_spot_div_'+id+'"> <input type="text" name="spot_Image_url_'+id+'[]" id="spot_image_url_'+id+'_'+dCount+'" class="spot_image_url"><input type="button" name="spot_upload_Btn_'+id+'" counter="spot_image_url_'+id+'_'+dCount+'" id="spot_upload_btn_'+id+'_'+dCount+'" class="spot_upload_btn" value="Upload"><a class="btn delete_spot_img"  href="javascript:void(0)" id="delete_spot_img_'+id+'_'+dCount+'">X</a></div>';
                jQuery('.add_spot_parent_'+id).append(html);  
                uploaderNew(id, dCount);
                removeSpotImage(id, dCount);
            });
        }

</script>