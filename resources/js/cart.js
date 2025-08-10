$(document).on('change', '.item-quantity', function () {
    let id = $(this).data('id');
    let quantity = $(this).val();

    $.ajax({
        url: '/cart/' + id,
        type: 'PUT',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            quantity: quantity
        },
        success: function (response) {
            console.log(response);
        },
        error: function (xhr) {
            console.error(xhr.responseText);
        }
    });
});

$(document).on('click', '.remove-item', function (e) {
    e.preventDefault();

    if (!confirm('هل أنت متأكد من حذف هذا المنتج؟')) {
        return;
    }

    let id = $(this).data('id');

    $.ajax({
        url: '/cart/' + id,
        method: 'DELETE',
        data: {
            _token: csrf_token
        },
        success: function (response) {
            // نحذف العنصر من الصفحة
            $('#' + id).remove();

            // تحديث الإجمالي في القائمة
            if (response.cart_total !== undefined) {
                $('.total-amount li:first span').text(response.cart_total);
            }

            // لو العربة فاضية
            if ($('.cart-single-list').length === 0) {
                $('.cart-list-head').html('<p class="text-center">سلة التسوق فارغة</p>');
            }

            alert(response.message || 'تم حذف المنتج بنجاح');
        },
        error: function (xhr) {
            console.log(xhr.responseText);
            alert('حدث خطأ أثناء الحذف');
        }
    });
});
