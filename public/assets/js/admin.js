$(window).load(function () {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
});
$(function () {

    $('.file-input').imgPreview({
        thumbnail_size: 70,
    });
    $(":file").jfilestyle();
    $('#productCategoryList').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
    $('#couponList').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
    $('#usersList').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
    //Date picker
    $('#from_date').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    $('#to_date').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    $('#expiry_date').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    $('[data-toggle="tooltip"]').tooltip();
    function ConfirmDelete()
    {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            return true;
        else
            return false;
    }
    $('.colorpicker').colorpicker({format: 'rgb', });
    $(".select2").select2({
        theme: "bootstrap"
    });
    $(".size").select2({
        closeOnSelect: false,
        placeholder: "Select a size",
        allowClear: true,
        theme: "bootstrap"
    });
     $(".product-category").select2({
        closeOnSelect: false,
        placeholder: "Select a category",
        allowClear: true,
        theme: "bootstrap"
    });
    $(".size").on("select2:select", function (e) {
        var items = $(this).val();
        var lastSelectedItem = e.params.data.id;
        $('#'+lastSelectedItem).parent().removeClass('disabled');
        event.preventDefault();
        $('#'+lastSelectedItem).removeAttr("disabled")
    });
    $(".size").on("select2:unselect", function (e) {
        var lastSelectedItem = e.params.data.id;
        event.preventDefault();
        $('#'+lastSelectedItem).prop( "checked", true );
        $('#'+lastSelectedItem).parent().addClass('disabled');  
        $('#'+lastSelectedItem).parent().removeClass('checked');  
        $('#'+lastSelectedItem).attr("disabled","")
    });
    $(".color").select2({
        closeOnSelect: false,
        placeholder: "Select a color",
        allowClear: true,
        theme: "bootstrap"
    });
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
    $('.remove-image-category').click(function () {
        var category_id = $(this).attr("category-id");
        var type = $(this).attr("type");
        $.ajax({
            url: window.location.protocol + "//" + window.location.host + "/" + 'admin/product-category/removeImage',
            type: "POST",
            data: {'category_id': category_id, '_token': $('input[name=_token]').val(), 'type': type},
            success: function (data) {
                location.reload();
            }
        });
    });

    $('.delete-image-category').click(function () {

        var category_id = $(this).parent().parent().find("img").attr("category-id");
        var type = $(this).parent().parent().find("img").attr("type");
        $.ajax({
            url: window.location.protocol + "//" + window.location.host + "/" + 'admin/product-category/removeImage',
            type: "POST",
            data: {'category_id': category_id, '_token': $('input[name=_token]').val(), 'type': type},
            success: function (data) {
                location.reload();
            }
        });
    });
    $('.remove-image-color').click(function () {
        var color_id = $(this).attr("color-id");
        $.ajax({
            url: window.location.protocol + "//" + window.location.host + "/" + 'admin/color/removeImage',
            type: "POST",
            data: {'color_id': color_id, '_token': $('input[name=_token]').val()},
            success: function (data) {
                location.reload();
            }
        });
    });

    $('.delete-icon-product').click(function () {

        var product_id = $(this).closest("span").attr("product-id");
        var type = $(this).closest("span").attr("type");
        $.ajax({
            url: window.location.protocol + "//" + window.location.host + "/" + 'admin/product/removeImage',
            type: "post",
            data: {'product_id': product_id, '_token': $('input[name=_token]').val(), 'type': type},
            success: function (data) {
                location.reload();
            }
        });
    });

    $('.delete-product-video').click(function () {
        var product_id = $(this).attr("product-id");
        var video_id = $(this).attr("video-id");
        $.ajax({
            url: window.location.protocol + "//" + window.location.host + "/" + 'admin/product/removeVideo',
            type: "post",
            data: {'product_id': product_id, '_token': $('input[name=_token]').val(), 'video_id': video_id},
            success: function (data) {
                location.reload();
            }
        });
    });
    function readURLForCategoryImage(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#categoryImageShow').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURLForCategoryBannerImage(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#categoryImageBannerShow').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file-1").change(function () {
        readURLForCategoryImage(this);
    });
    $("#file-2").change(function () {
        readURLForCategoryBannerImage(this);
    });
});
'use strict';

(function ($, window, document, undefined)
{
    $('.inputfile').each(function ()
    {
        var $input = $(this),
                $label = $input.next('label'),
                labelVal = $label.html();

        $input.on('change', function (e)
        {
            var fileName = '';

            if (this.files && this.files.length > 1)
                fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
            else if (e.target.value)
                fileName = e.target.value.split('\\').pop();

            if (fileName)
                $label.find('span').html(fileName);
            else
                $label.html(labelVal);
        });

        // Firefox bug fix
        $input
                .on('focus', function () {
                    $input.addClass('has-focus');
                })
                .on('blur', function () {
                    $input.removeClass('has-focus');
                });
    });
})(jQuery, window, document);

jQuery('select[name=coupon_id]').on('change', function () {
    var e = document.getElementsByName('coupon_id')[0];
    var coupon_id = e.options[e.selectedIndex].value;

    $(".customer_checkbox").each(function (i,el) {
        jQuery(el).iCheck('uncheck');
    });
    
    getCustomers(coupon_id);
    
})

function getCustomers(coupon_id) {
    jQuery.get('/admin/coupon/getCustomersfromCoupon/'+ coupon_id)
        .then(function(response) {
            $(".customer_checkbox").each(function (i,el) {
                var index = jQuery.inArray(this.value, response);
                if(index > -1){
                    jQuery(el).iCheck('check');
                }
            });
       }, function () {
       });
}

