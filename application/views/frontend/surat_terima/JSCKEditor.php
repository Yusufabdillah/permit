<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 16/02/2019
 * Time: 14:38
 */
?>
<script src="<?= site_url('assets/vendor/frontend/js/helpers/ckeditor/ckeditor.js') ?>"></script>
<script type="text/javascript">
    CKEDITOR.config.toolbarCanCollapse = true;
    CKEDITOR.config.toolbar = [
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
        { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
        { name: 'insert', items: [ 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar' ] },
        '/',
        { name: 'styles', items: [ 'Styles', 'Format', 'FontSize' ] }
    ];
</script>
