<?php

// Add shortcode information on single post
function create_shortcode_information($atts,$content=null){
    $count = $atts["count"];
    $post_id = $atts["post_id"];
    $id = $atts["id"];
    $information = get_post_meta($post_id,'spot_information',true);
    $information = unserialize($information);

    $id = $atts['id'];

    $html ='';

    $html .= '
        <div class="model_clause">
            <div class="spot_no">'.base64_decode($information[$id]["spot_no"]).'</div>
            <div class="spot_title">'.base64_decode($information[$id]["spot_title"]).'</div>
            <div class="spot_thumbimg"><img src="'.base64_decode($information[$id]["spot_thumbimg"]).'"></div>
            <div class="spot_address">'.base64_decode($information[$id]["spot_address"]).'</div>
            <div class="spot_maplink"><a href="'.base64_decode($information[$id]["spot_maplink"]).'">View Map</a></div>';
            if(!empty($information[$id]["spot_image"])){
                $html .= '<div class="spot_Image">';
                foreach ($information[$id]["spot_image"] as $spotImage) {
                    if (isset($spotImage) && $spotImage!= '') {
                        $caption = pn_get_attachment_id_from_url($spotImage);
                        $html .= '<div><img src="'.$spotImage.'"><span class="spot_img_caption">'.$caption['caption'].'</span></div>';
                    }
                }
                $html .= '</div>';
            }
     $html .='</div>';

    return $html;
}
add_shortcode( 'modelcause', 'create_shortcode_information' );

?>