<script type="text/javascript">
        // For Showing Embeded Map
        function show_embed_map(id){
            jQuery('#spot_address_'+id).each(function(){
                var fromAddressMap = document.getElementById('spot_address_'+id).value;
                var fromMaualLinkMap = document.getElementById('spot_maplink_'+id).value;
                var source = '';
                if(fromMaualLinkMap != '' || fromMaualLinkMap.length > 0){
                    source = fromMaualLinkMap + '&output=embed';
                }else{
                   source = 'https://maps.google.com/maps?&q=' + encodeURIComponent(fromAddressMap) + '&output=embed';
                }
                var embed ="<iframe width='300' height='200' class='embed_map' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'   src='"+ source +"'></iframe>";
                jQuery(this).parent('div').append(embed);       
            });
        }
</script>