jQuery(document).ready(function($) {
    "use strict";
        $('.wd-color-picker').colorpicker(
          {format: 'rgba'}
        );


        // detect the change
        $('.wd-color-picker').bind("change keyup paste input select focusin focusout focus click",function() {
            //$(this).parent().css('background', $(this).val());
            var $item=$(this).data("picker");
            $('#'+$item).css('background', $(this).val());
        });
        
        $('.iris-square-value').on('mousedown', function(e) {
          //alert('clicked');
        }).on('mouseup', function(e) {
          $(this).parent().parent().parent().parent().parent().parent().css('background', $(this).parent().parent().parent().parent().parent().find('.wd-color-picker').val() );
        })
         
       $('.option-item.tile .iris-square-value').each(function( index ) { 
        $(this).parent().parent().parent().parent().parent().parent().css('background', $(this).parent().parent().parent().parent().parent().find('.wd-color-picker').val() );
       });
        
      //---------------logo script-----------  
      jQuery('#wd_upload_btn').on("click", function(){
      wp.media.editor.send.attachment = function(props, attachment){
        jQuery('#wd_logo_filed').val(attachment.url);
          jQuery('#wd_logo_filed').click();
      }
      wp.media.editor.open(this);
      
      return false;
      });
      //---------------404 page-----------  
      jQuery('#wd_bg_404_page').on("click", function(){
      wp.media.editor.send.attachment = function(props, attachment){
        jQuery('#wd_404_page_filed').val(attachment.url);
          jQuery('#wd_404_page_filed').click();
      }
      wp.media.editor.open(this);
      
      return false;
      });
       //---------------footer bg image script-----------
      jQuery('#wd_footer_bg_btn').on("click", function(){
      wp.media.editor.send.attachment = function(props, attachment){
        jQuery('#wd_footer_bg_filed').val(attachment.url);
          jQuery('#wd_footer_bg_filed').click();
      }
      wp.media.editor.open(this);

      return false;
      });
      //---------------bg home page-----------  
      jQuery('#wd_bg_home_page').on("click", function(){
      wp.media.editor.send.attachment = function(props, attachment){
        jQuery('#wd_home_page_filed').val(attachment.url);
          jQuery('#wd_home_page_filed').click();
      }
      wp.media.editor.open(this);
      
      return false;
      });


      //---------------bg title bar page-----------  
      jQuery('#copallyt_title_bg_btn').on("click", function(){
      wp.media.editor.send.attachment = function(props, attachment){
        jQuery('#copallyt_title_bg_filed').val(attachment.url);
          jQuery('#copallyt_title_bg_filed').click();
      }
      wp.media.editor.open(this);

      return false;
      });
      
    
      
      //------favicon script-----    
      jQuery('#wd_upload_favicon').on("click", function(){
        wp.media.editor.send.attachment = function(props, attachment){
          jQuery('#wd_favicon_filed').val(attachment.url);
            jQuery('#wd_favicon_filed').click();
        }
        wp.media.editor.open(this);        
        return false;
      });
      
      //------ Menu Background image -----    
      jQuery('#wd_upload_btn_bg').on("click", function(){
        var that = this;
        wp.media.editor.send.attachment = function(props, attachment){
          jQuery('#wd_menu_bg_img_filed').val(attachment.url);
            jQuery('#wd_menu_bg_img_filed').click();
        }
        wp.media.editor.open(this);        
        return false;
      });
      
      
      
      jQuery('.img-container .remove-img').on("click", function(){
        jQuery(this).parent().parent().find('input[type="text"]').val('none');
        jQuery(this).parent().remove();
      });
    //-------------------------------------
        
        
        $('.option-item.big.tile select').on("change", function () {
         var optionSelected = $(this).find("option:selected");
         var valueSelected  = optionSelected.val();
         
         if( valueSelected == 'big-custom_text'){
          $(this).parent().find('textarea').show();
         }else{
          $(this).parent().find('textarea').hide();
         }
        });
        /**--------logo --------*/
		$('.chekbox_logo').on("change", function () {
    if ($(this).attr("checked")) 
    {
        
        $('.path_logo').fadeIn();
        return;
    }
   $('.path_logo').fadeOut();
});
/**--------social icon --------*/
		$('.checkbox_social').on("change", function () {
    if ($(this).attr("checked")) 
    {
        
        $('.social_link').fadeIn();
        return;
    }
   $('.social_link').fadeOut();
});
    });        