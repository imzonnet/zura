(function($) { "use strict";
jQuery(document).ready(function($){
    if($('.zura_upload_button').length >= 1) {
        window.zura_uploadfield = '';

        $('.zura_upload_button').live('click', function() {
            window.zura_uploadfield = $('.upload_field', $(this).parent());
            tb_show('Upload', 'media-upload.php?type=file&TB_iframe=true', false);

            return false;
        });

        $('.zura_clear_button').click(function () {
			var clear_id = $(this).attr("data-id");
			$("#"+clear_id+"").val("");
		})

        window.zura_send_to_editor_backup = window.send_to_editor;
        window.send_to_editor = function(html) {
            if(window.zura_uploadfield) {
                var file_url = $('img', html).attr('src');
                if(file_url == undefined){
                	file_url = $("a", '<div>'+html+'<div>').attr("href");
                }
                console.log(this);
                $(window.zura_uploadfield).val(file_url);
                window.zura_uploadfield = '';
                tb_remove();
            } else {
                window.zura_send_to_editor_backup(html);
            }
        }
    }
});
})(jQuery);
