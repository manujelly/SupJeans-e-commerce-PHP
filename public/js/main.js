function handleError(message,pr) {
    pr.preventDefault();
    $('#message').html("<p class='alert alert-danger'>"+message+"</p>")

}

function verification()
{
    $('#submit').click(function (e) {

        var email=$('#email').val();
        var password=$('#password').val();
        var password_confirmation=$('#password_confirmation').val();
        if (email.length<1)
        {
            handleError("Email is required",e)
        }
        else
        {
            if (password.length<1)
            {
                handleError("Password is required",e)
            }
            else
            {
                if (password_confirmation.length<1)
                {
                    handleError("Password confirmation is required",e);
                }
                else
                {
                    if (password_confirmation!=password)
                    {
                        handleError("Password confirmation and password doesn't match",e)
                    }
                }
            }
        }

    });
}
function AddToCart(product_name,price,id,img) {
    $.ajax(
        {
            url:'/Controller/Functions.php?action=addtocart',
            type:'post',
            data:{id:id,product_name:product_name,price:price,img:img},
            success:function (data) {
                $('#mycart').html('<span><a href="/Controller/Functions.php?action=mycart" class="text-info text-decoration-none">My cart <span class="badge badge-light">'+data+'</span>\n' +
                    '  <span class="sr-only">unread messages</span></a></span>');
                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            error:function () {
                console.log('error')
            }
        }
    )
}

$(document).ready(function () {
    verification();
});