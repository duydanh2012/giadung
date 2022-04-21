$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

function calc_total(){
    var sum = 0;
    $(".cart_total_price").each(function(){
      sum += parseFloat($(this).data('value'));
    });

    $('#bill_total').text(addCommas(sum * 1000) + ' ₫');
}
calc_total();

$(document).ready(function(){
    $(document).on('click', '.add-to-cart', function(e){
        e.preventDefault();
        let code = $(this).data('value');
        let url = $(this).data('href');
        $.ajax({
            url : url,
            data : {
                code: code,
            },
            type : 'POST',
            dataType : 'json',
            success : function(result){
                alert('Đã thêm sản phẩm ' + result.name + ' vào giỏ hàng');
            }
        });
    })

    
    $(document).on('keyup', '.quantity', function(){
        let quantity = $(this).val();
        let id = $(this).data('id');
        let price = $('#price-' + id).data('price');
        let total = addCommas(price * quantity * 1000);

        let url = $(this).data('href');
        $.ajax({
            url : url,
            data : {
                code: id,
                quantity : quantity,
            },
            type : 'PUT',
            dataType : 'json',
        });
        $('#total-' + id).text(total + ' ₫');
        $('#total-' + id).data('value', price * quantity);
        calc_total();
    })

    $(document).on('click', '.cart_quantity_delete', function(){
        let id = $(this).data('id');

        let url = $(this).data('href');
        $.ajax({
            url : url,
            data : {
                code: id,
            },
            type : 'DELETE',
            dataType : 'json',
            success : function(result){
                $('#row-' + result.code).remove();
                calc_total();
            }
        });
    })

    $(document).on('click', '.cart_quantity_clear', function(){

        let url = $(this).data('href');

        $.ajax({
            url : url,
            type : 'GET',
            dataType : 'json',
            success : function(result){
                $('#row-' + result.code).remove();
            }
        });
        $('.product').remove();
        $('#bill_total').text(addCommas(0) + ' ₫');
    })

    $(document).on('click', '.btn_add_cart', function(e){
        e.preventDefault();

        let code = $(this).data('value');
        let url = $(this).data('href');
        let quantity = $('input[name=quantity]').val();

        $.ajax({
            url : url,
            data : {
                code: code,
                quantity : quantity,
            },
            type : 'POST',
            dataType : 'json',
            success : function(result){
                alert('Đã thêm sản phẩm ' + result.name + ' vào giỏ hàng');
            }
        });
    })
});

$(document).ready(function(){
    let totalCart = $('#totalCart').data('value');
    let ship = $('#ship').data('value');
    let promotion = $('#promotion').data('value');
    const total = totalCart + ship - promotion;
    $('#formTotal').val(total);
    $('#total').text(addCommas(total * 1000) + ' ₫'); 

    $(document).on('click', '.applyPromotion', function(){
        alert('Chức năng hiện chưa hoàn thiện!');
    })
})
