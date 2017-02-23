<?php

// add boxe information to post
function add_spot_spot_information_box(){
    add_meta_box('spot_information', 'Add Model Cause Spot Information','spot_information_box','model_cause');
}
add_action('add_meta_boxes', 'add_spot_spot_information_box');

function spot_information_box($post){
    $information = get_post_meta($post->ID,'spot_information',true);

    $information = unserialize($information);
    $size_inf = sizeof($information);
    $pos = array();
    ?>
    <fieldset class="translatable article-places" data-language="eng">
        <div class="place-container">
            <?php
            $i = 0;
            do{
                $spot_img = $information[$i]['spot_image'];
                ?>
                <div name="place-form[]" style="display: inline-block; width: 98%;" class="place-form">
                    <!-- Spot No & Put Shortcode -->
                    <div class="form-group">
                        <label class="control-label">Spot No.</label>
                        <div class="control-input">
                            <input type="text" name="spot_No_<?php echo $i;?>" id="spot_no_<?php echo $i;?>" class="spot-no form-control" value="<?php echo base64_decode($information[$i]['spot_no'])?>" >
                        </div>
						<div style="width: 80px; line-height: 1.2em !important; right: -50px; position: absolute;" class="control-input">
                            <a class="btn insert-post" style="line-height: 1.2em !important;" href="javascript:void(0)" id="insert_post_<?php echo $i;?>">Put to Post</a>
                        </div>
                    </div><!-- #End of Spot No & Put Shortcode -->

                    <!-- Title Section -->
                    <div class="form-group">
                        <label class="control-label">Title</label>
                        <div class="control-input">
                            <textarea type="text" name="spot_Mtitle_<?php echo $i;?>" id="spot_title_<?php echo $i;?>" class="spot-title form-control"><?php echo base64_decode($information[$i]['spot_title'])?></textarea>
                        </div>
                    </div> <!-- #End of Title Section -->

                    <!-- Thumbnail Image Section -->
                    <div class="form-group">
                        <label class="control-label">Thumbnail Image</label>
                        <div class="control-input">
                            <input type="text" name="spot_Thumb_image_url_<?php echo $i;?>" id="spot_thumb_image_url_<?php echo $i;?>" class="thumb_image_url" 
                                value="<?php echo (isset($information[$i]['spot_thumbimg'])) ? base64_decode($information[$i]['spot_thumbimg']):''; ?>">
                            <input type="button" name="thumb_upload_Btn_<?php echo $i;?>" id="thumb_upload_btn_<?php echo $i;?>" class="thumb_upload_btn" value="Upload">
                            <?php if(isset($information[$i]['spot_thumbimg']) && $information[$i]['spot_thumbimg']!= ''){
                                echo '<img src="'.base64_decode($information[$i]['spot_thumbimg']).'" width="100" height="100">';
                            }?>
                        </div>
                    </div> <!-- #End of Thumbnail Image Section -->                    

                    <!-- Address Section -->
                    <div class="form-group">
                        <label class="control-label">Address</label>
                        <div class="control-input">
                            <textarea type="text" name="spot_Address_<?php echo $i;?>" id="spot_address_<?php echo $i;?>" class="spot-address form-control"><?php echo base64_decode($information[$i]['spot_address'])?></textarea>
                        </div>
                        <div class="control-input set_map">
                            <a class="btn show-map" style="line-height: 1.2em !important;" href="javascript:void(0)" id="show_map_<?php echo $i;?>">Set Map</a>
                        </div>
                    </div> <!-- #End of Address Section -->

                    <!-- Map Link Section -->
                    <div class="form-group">
                        <label class="control-label">Map Link</label>
                        <div class="control-input">
                            <textarea type="text" name="spot_MapLink_<?php echo $i;?>" id="spot_maplink_<?php echo $i;?>" class="spot-maplink form-control"><?php echo base64_decode($information[$i]['spot_maplink'])?></textarea>
                        </div>
                    </div> <!-- #End of Map Link Section --> 

                    <!-- Spot Image Section -->
                    <div class="form-group add_spot_parent_<?php echo $i;?>" id="add_spot_parent">
                        <label class="control-label">Spot Image</label>
                        <?php
                            if(!empty($spot_img)){
                                $count = 0;
                                foreach ($spot_img as $spImg) { 
                                    if(isset($spImg) && $spImg != null){
                                        $count++;
                                    ?>
                                    <div class="control-input">
                                        <input type="text" name="spot_Image_url_<?php echo $i;?>[]" id="spot_image_url_<?php echo $i.'_'.$count;?>" class="spot_image_url" value="<?php echo $spImg; ?>">
                                        <input type="button" name="spot_upload_Btn_<?php echo $i;?>" counter="spot_image_url_<?php echo $i.'_'.$count;?>" id="spot_upload_btn_<?php echo $i.'_'.$count;?>" class="spot_upload_btn" value="Upload">
                                        <a class="btn delete_spot_img" href="javascript:void(0)" id="delete_spot_img_<?php echo $i.'_'.$count;?>">X</a>
                                    </div>                                    
                                <?php } }
                            }
                            $dCount = 1;
                            if(isset($count) && $count > 1){ $dCount = $count +1; }
                        ?>
                        <div class="control-input add_spot_div_<?php echo $i;?>" id="add_spot_div">
                            <input type="text" name="spot_Image_url_<?php echo $i;?>[]" id="spot_image_url_<?php echo $i.'_'.$dCount;?>" class="spot_image_url">
                            <input type="button" name="spot_upload_Btn_<?php echo $i;?>" counter="spot_image_url_<?php echo $i.'_'.$dCount;?>" id="spot_upload_btn_<?php echo $i.'_'.$dCount;?>" class="spot_upload_btn" value="Upload">
                            <a class="btn delete_spot_img" href="javascript:void(0)" id="delete_spot_img_<?php echo $i.'_'.$dCount;?>">X</a>
                        </div>
                            <a class="btn add-spot-img" style="line-height: 1.2em !important;" href="javascript:void(0)" id="add_spot_img_<?php echo $i;?>">Add Image</a>
                    </div> <!-- #End of Spot Image Section -->                                                               

					<div class="form-group">
						<a class="delete_spot" id="delete_spot_<?php echo $i;?>" <?php if($i == 0 || $i == ($size_inf-1)) echo 'style ="display: none;"';?>><span><i class="fa fa-close"></i>&nbsp; Remove</span></a>
                    </div>
					<a class="remove_spot" id="remove_spot_<?php echo $i;?>" <?php if($i == 0) echo 'style ="display: none;"';?>title="Remover"><span><i class="fa fa-close"></i>&nbsp; Remove</span></a>
                </div>
                <?php
                $i++;
            }while($i < $size_inf);?>
        </div>
        <a class="article-place-add" title="Add More Model"><span><i class="fa fa-plus"></i>&nbsp; Add Spot</span></a>
    </fieldset>

    <?php include( PLUGIN_ROOT_DIR . 'style/style.php'); ?>
    <?php include( PLUGIN_ROOT_DIR . 'script/uploader.php'); ?>
    <?php include( PLUGIN_ROOT_DIR . 'script/displayEmbedMap.php'); ?>
    <?php include( PLUGIN_ROOT_DIR . 'script/spotCloner.php'); ?>
    <?php include( PLUGIN_ROOT_DIR . 'script/shortCoder.php'); ?>


    <script type="text/javascript">
        var width_place = jQuery('.place-form').height();
        var bottom = (width_place - width_place) + 40; //var bottom = width_place + 17;
		
        //For Detecting Position of Each Section
        jQuery('.article-place-add, .remove_spot').css('bottom', bottom);
        (function (jQuery, undefined) {
            jQuery.fn.getCursorPosition = function () {
                var el = jQuery(this).get(0);
                var pos = 0;
                if ('selectionStart' in el) {
                    pos = el.selectionStart;
                } else if ('selection' in document) {
                    el.focus();
                    var Sel = document.selection.createRange();
                    var SelLength = document.selection.createRange().text.length;
                    Sel.moveStart('character', -el.value.length);
                    pos = Sel.text.length - SelLength;
                }
                return pos;
            }
        })(jQuery);

        //For Counting How Many Section Goes there
        var cntx_count = [];
        var pos_ob = <?php echo json_encode($information); ?>;
		//console.log('Information :' + pos_ob);
        var size_of_pos;
        if(pos_ob != null && pos_ob != false){
            size_of_pos = pos_ob.length;
        }else{
            size_of_pos = 0;
        }
		console.log('Size of POS :' + size_of_pos);

        var cPF = size_of_pos;
        if(size_of_pos != 0){
            cPF = size_of_pos - 1;
        }else{
            cPF = size_of_pos;
        }
        for(var i = 0; i<=cPF; i++){
            add_short_code(i);
            show_embed_map(i);
            uploader(i);
            var count = jQuery('.add_spot_parent_'+i).children('div').length;
            var dCount = 0;
            for(var j= 1; j<=count; j++){
                removeSpotImage(i, j);
            }
            uploaderSelf(i, dCount);
            //uploaderSelf(i);
        }

        //Remove Spot Image
        function removeSpotImage(i, j){
            jQuery('#delete_spot_img_'+i+'_'+j).click(function(){
                console.log('Execute Image Remover');
                //jQuery(this).parent('.place-form').remove();
                var retVal = confirm("Do you want to continue ?");
                if( retVal == true ){
                    jQuery('#spot_image_url_'+i+'_'+j).val('');
                    jQuery(this).parent('div').hide();
                }
                else{}
            }); 
        }

    </script>
<?php }
?>
<?php
function save_information($post_id){
    if(get_post_type($post_id) == 'model_cause'){
        $count = 0;
        $information = array();
        while(isset($_POST['spot_Mtitle_'.$count])){
            if(isset($_POST['spot_Image_url_'.$count])){
				$spot_image = $_POST['spot_Image_url_'.$count];
			}
            $place_form = array(
                'spot_no' => base64_encode(stripslashes($_POST['spot_No_'.$count])),
                'spot_title' => base64_encode(stripslashes($_POST['spot_Mtitle_'.$count])),
                'spot_address' => base64_encode(stripslashes($_POST['spot_Address_'.$count])),
                'spot_maplink' => base64_encode(stripslashes($_POST['spot_MapLink_'.$count])),
                'spot_thumbimg' => base64_encode(stripslashes($_POST['spot_Thumb_image_url_'.$count])),
                'spot_image' => $spot_image
            );
            $information[]=$place_form;
            $count++;
        }
        if(!empty($information)) {
          $information = serialize($information);
          update_post_meta($post_id,'spot_information',$information);
        }
    }
    $count = 0;
}
add_action('save_post', 'save_information');

include( PLUGIN_ROOT_DIR . 'helper/short_code_helper.php');
include( PLUGIN_ROOT_DIR . 'helper/caption_fetcher.php');

function getMultiLang_InformationTitle($string){
    return $string;
}
