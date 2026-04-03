let base_url = "http://localhost/greeny/";

function set_combo(action, id) {
    let data = {id: id};
    let url = base_url + 'backend/' + action;

    $("#" + action).html('<option>Loading..</option>');
    setTimeout(function () {
        $.post(url, data, function (output) {
            $("#" + action).html(output);
        });
        } , 1000);
}

//change status
function change_status( action , id ){
    
    if( $("#status_"+id+" i").hasClass('fa-toggle-on') ){
        $("#status_"+id+" i")
                .removeClass('fa fa-toggle-on')
                .addClass('fa fa-toggle-off')
                .css('color','');
    }
    else{
        $("#status_"+id+" i")
                .removeClass('fa fa-toggle-off')
                .addClass('fa fa-toggle-on')
                .css('color','');
    }
    
    let url = base_url + 'backend/change_status/';
    let data = { action:action , id:id };
    
    $.post(url , data );
}


function change_price(img_id) {
    let data = {img_id: img_id};
    let url = base_url + 'backend/change_price/';

    $.post(url, data, function (output) {
        $("#price").html(output);
        check_stock_status(img_id);
        change_cart_btn(img_id);
        
    });
}

function delete_review(id) {

    if (confirm('Are You Sure Want To Remove This Review ? ')) {
//        alert(id);
        let url = base_url + 'backend/delete_review/';

        let data = {rid: id};
        $.post(url, data, function (output) {
//            alert(output);
            $("#review-data").html(output);
        });
    }
}

function remove_cart( cart_id ){
    if( confirm('Are You Sure Want To Remove This Item From Cart ?') ){
        let url = base_url + 'backend/remove_cart';
        let data = {cart_id: cart_id};
        $.post(url, data, function (output) {
            if( output == 1 ){
                cartdata();
            }
        });
    }
}

function delete_wishlist(id) {

    if (confirm('Are You Sure Want To Remove This Wishlist ? ')) {
//        alert(id);
        let url = base_url + 'backend/delete_wishlist/';

        let data = {wid: id};
        $.post(url, data, function (output) {
//            alert(output);
            $("#wishlist-data").html(output);
        });
    }
}


function change_stock_status(img_id) {
    let data = {img_id: img_id};
    let url = base_url + 'backend/change_stock_status/';

    $.post(url, data, function (output) {
        $("#stock").html(output);
    });
}

function add_cart_detail(pid){
    let data = {pid:pid};
    let url = base_url + 'backend/add_cart/';
    
    $.post(url , data , function(output){
        if(output == 1){   
            let surl = base_url + "viewcart";
            $("#cart-" + pid).html('<a href="'+viewcart+'") ?>" title="Added in Cart"><i class="fas fa-shopping-basket" style="color: black ; cursor:pointer"></i></a>');
        }
    });
}

function product_data( action , id , limit ){
    
    let url = base_url + 'backend/product_data/';
    
    let filter_data = $("#filter-data").serializeArray();
    let data = { action:action , id:id , limit:limit , filter_data:filter_data };
    $.post(url, data, function (output) {
            $("#product-data").html(output);
    });
} 

function add_cart(pid){
    let data = {pid:pid};
    let url = base_url + 'backend/add_cart/';
    $.post(url , data , function(output){
        if( output == 1 ){
            $("#cart-btn").html('<button class="product-add"><i class="fas fa-shopping-basket"></i><span>Added in Cart</span></button>');
        }
    });
}

function add_wish(pid) {
    let data = {pid: pid};
    let url = base_url + 'backend/add_wish/';

    $.post(url, data, function (output) {
        if (output == 1) {

            $("#wish-" + pid).html('<i class="fas fa-heart"></i>Added Wish');
        }
    });
}

function cartdata(){
    let url = base_url + 'backend/cartdata';
    $.post(url, function (output) {
        $("#cartdata").html(output);
    });
}

function change_cart( cart_id , qty ){
    let url = base_url + 'backend/change_cart';
    let data = {cart_id: cart_id, qty:qty};
    $.post(url, data, function (output) {
        if( output == 1 ){
            cartdata();
        }
    });
}

function change_shipment(shipment_id) {
//    alert();
    let data = {shipment_id: shipment_id};
    let url = base_url + 'backend/shipment_id/';
    $.post(url, data, function (output) {
//        alert(output);
        $("#ship_data").html(output);
    });
}

function apply_code() {    
    let code = $("#promocode").val();
    
    if (code == "") {
        $("#msg").html('<span style="color:red">Please Enter Promocode.</span>');
    } else {
        let data = {code: code};
        let url = base_url + 'backend/apply_code/';
        $.post(url, data, function (output) {
            if (output == 1) {
                checkout_cartdata();
                $("#msg").html('<span style="color:green">' + code + ' Applied Successfully.</span>');
//                $("#promocode").val('');
            } else if (output == 2) {
//                alert(output);
                $("#msg").html('<span style="color:red">Please Enter Valid Promocode.</span>');
            }
        });
    }
}

function checkout_cartdata() {
    let url = base_url + 'backend/checkout_cartdata/';
    $.post(url, function (output) {
        $("#checkout_cartdata").html(output);
    });
}

function add_review(pid){
    $rate = $("#rate-value").val();
    $msg = $("#review-msg").val();
    
    if( $rate > 0 && $msg != "" ){
        
        
        let url = base_url + 'backend/add_review';
        let data = {pid:pid , msg:$msg , rate:$rate };
        $.post(url, data, function (output) {
//            alert(output);
            if( output == 1 ){
//                alert(output);
                $("#review-output").html("<span style='color:green;'>Thank You For Giving Review To This Product.</span>");
                    $msg = $("#review-msg").val('');
            }else{
                $("#review-output").html("<span style='color:red;'>You Already Add Review to This Product.</span>");
            }
        });
    }
    else{
        $("#review-output").html("<span style='color:red;'>Please Enter Rate and Review.</span>");
    }
}
function subscribe()
{
    $email = $("#email").val();

    // Blank Validation
    if ($email.length > 0)
    {
        //pattern Validation
        var ptn = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if ($email.match(ptn))
        {
            $data = {email: $email};

            $path = base_url + 'backend/subscribe';
            $.post($path, $data, function (output) {
                if (output == 1)
                {
                    $("#email").val("");
                    $("#msg").html("<span style='color:white;'>Thank You For Subscribe With Us.</span>");
                }
                if (output == 2)
                {
                    $("#email").val("");
                    $("#msg").html("<span style='color:red;'>You Already Subscribe With Us.</span>");
                }
            });
        } 
        else{
            $("#msg").html("<span style='color:red;'>Please Enter Valid Email.</span>");
        }
    } 
    else{
        $("#msg").html("<span style='color:red;'>Please Enter Email.</span>");
    }
}

(function ($) {
    /*------------------------------------
     35. password hide/show code
     -------------------------------------*/
    document.getElementById('eye').addEventListener('click', function ()
    {
        let type = document.getElementById('box').getAttribute('type');

        if (type == "password")
        {
            document.getElementById('box').type = 'text';
            document.getElementById('eye').className = 'fa-solid fa-eye';
        } else
        {
            document.getElementById('box').type = 'password';
            document.getElementById('eye').className = 'fa-solid fa-eye-slash';
        }
    }
    );
    /*------------------------------------
     36. password hide/show code
     -------------------------------------*/
    document.getElementById('eye1').addEventListener('click', function ()
    {
        let type = document.getElementById('box1').getAttribute('type');

        if (type == "password")
        {
            document.getElementById('box1').type = 'text';
            document.getElementById('eye1').className = 'fa-solid fa-eye';
        } else
        {
            document.getElementById('box1').type = 'password';
            document.getElementById('eye1').className = 'fa-solid fa-eye-slash';
        }
    }
    );

    document.getElementById('eye2').addEventListener('click', function ()
    {
        let type = document.getElementById('box2').getAttribute('type');

        if (type == "password")
        {
            document.getElementById('box2').type = 'text';
            document.getElementById('eye2').className = 'fa fa-eye ';
        } else
        {
            document.getElementById('box2').type = 'password';
            document.getElementById('eye2').className = 'fa fa-eye-slash ';
        }
    }
    );
    function change_price(pri_id) {
        let data = {pri_id: pri_id};
        let url = base_url + 'backend/change_price';

        $.post(url, data, function (output) {
            $("#pri_priview").html(output);
        });
    }

})(jQuery);