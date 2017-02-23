<script type="text/javascript">
        // For Upload Thumbnail Media
        function uploader(id){
            jQuery('#thumb_upload_btn_'+id).click(function(e) {
                e.preventDefault();
                var image = wp.media({ 
                    title: 'Upload Image',
                    multiple: false
                }).open()
                .on('select', function(e){
                    var uploaded_image = image.state().get('selection').first();
                    var image_url = uploaded_image.toJSON().url;
                    jQuery('#spot_thumb_image_url_'+id).val(image_url);
                });
            });
        }
        // For Upload Normal Spot Media
        function uploaderSelf(id, j){
            for(var j= 1; j<=count; j++){
                jQuery('#spot_upload_btn_'+id+'_'+j).click(function(e) {
                    e.preventDefault();
                    var setField = jQuery(this).attr('counter');
                    var image = wp.media({ 
                        title: 'Upload Image',
                        multiple: false
                    }).open()
                    .on('select', function(e){
                        var uploaded_image = image.state().get('selection').first();
                        var image_url = uploaded_image.toJSON().url;
                        jQuery('#'+setField).val(image_url);
                    });
                });
            }
        }

        // For Upload New Spot Media
        function uploaderNew(id, j){
            //for(var j= 1; j<=count; j++){
                jQuery('#spot_upload_btn_'+id+'_'+j).click(function(e) {
                    e.preventDefault();
                    var setField = jQuery(this).attr('counter');
                    var image = wp.media({ 
                        title: 'Upload Image',
                        // mutiple: true if you want to upload multiple files at once
                        multiple: false
                    }).open()
                    .on('select', function(e){
                        // This will return the selected image from the Media Uploader, the result is an object
                        var uploaded_image = image.state().get('selection').first();
                        // We convert uploaded_image to a JSON object to make accessing it easier
                        // Output to the console uploaded_image
                        //console.log(uploaded_image);
                        var image_url = uploaded_image.toJSON().url;
                        // Let's assign the url value to the input field
                        jQuery('#'+setField).val(image_url);
                    });
                });
           // }
        }
</script>