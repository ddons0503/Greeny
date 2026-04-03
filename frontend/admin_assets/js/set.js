let base_url = "http://localhost/greeny/";
    
function  delete_record(action,id){
    let url =base_url + 'delete/' + action + '/' + id;
    $('#delete_link').attr('href',url);
 }    
 // change status
function change_status( action , id ){
    
    if( $("#status_"+id+" i").hasClass('fa-toggle-on')){
        $("#status_"+id+" i").removeClass('fa-toggle-on').addClass('fa-toggle-off').css('color','green');
    }else{
        $("#status_"+id+" i").removeClass('fa-toggle-off').addClass('fa-toggle-on').css('color','green');
    }
    
    let url = base_url + 'backend/change_status/';
    let data = { action:action , id:id };
    
    $.post( url , data );
}

function change_order_status(bill_id, status) {
//    alert(status);
    if (confirm('Are You Sure Want To Change Order Status ?')) {
        let data = {bill_id: bill_id, status: status};
        let url = base_url + 'backend/change_order_status/';

        $.post(url, data, function (output) {
//            alert(output);
            $("#order_data").html(output);
        });
    }
}
 
 //set dropdown
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

(function ($) {
    
    
    /*------------------------------------
     1. password hide/show code
     -------------------------------------*/
    document.getElementById('eye').addEventListener('click', function ()
    {
        let type = document.getElementById('box').getAttribute('type');

        if (type == "password")
        {
            document.getElementById('box').type = 'text';
            document.getElementById('eye').className = 'fa fa-eye';
        } else
        {
            document.getElementById('box').type = 'password';
            document.getElementById('eye').className = 'fa fa-eye-slash ';
        }
    }
    );
    
    /*------------------------------------
     2. password hide/show code
     -------------------------------------*/
    document.getElementById('eye1').addEventListener('click', function ()
    {
        let type = document.getElementById('box1').getAttribute('type');

        if (type == "password")
        {
            document.getElementById('box1').type = 'text';
            document.getElementById('eye1').className = 'fa fa-eye ';
        } else
        {
            document.getElementById('box1').type = 'password';
            document.getElementById('eye1').className = 'fa fa-eye-slash ';
        }
    }
    );
    /*------------------------------------
     3. password hide/show code
     -------------------------------------*/
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
    /*------------------------------------
     3. password hide/show code
     -------------------------------------*/
    document.getElementById('eye4').addEventListener('click', function ()
    {
        let type = document.getElementById('box4').getAttribute('type');

        if (type == "password")
        {
            document.getElementById('box4').type = 'text';
            document.getElementById('eye4').className = 'fa fa-eye ';
        } else
        {
            document.getElementById('box4').type = 'password';
            document.getElementById('eye4').className = 'fa fa-eye-slash ';
        }
    }
    );


})(jQuery);