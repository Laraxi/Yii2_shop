$(function () {

    /*
     $('#button-add').click(function () {
     var data = $('#shop-form').serializeArray();
     var postData = {};
     $(data).each(function () {
     postData[this.name] = this.value;
     });
     var url = '/user/test';
     $.post(url, postData, function (data) {
     if (data.status != 0) {
     alert(data.message);
     } else if (data.status == 0) {
     alert(data.message);
     window.location.href = data.jumpUrl;
     }
     }, 'json')
     });
     */
    // *******************************短信发送************************************************

    enable = true;
    $('#phone_code').click(function () {
        var phone_code = $('#phone_code');
        var phone = $('input[name=phone]').val();
        if (phone == '') {
            $('.bk_toptips').show();
            $('.bk_toptips span').html('用户名不为空');
            setTimeout(function () {
                $('.bk_toptips').hide()
            }, 2000);
            return;
        }
        if (phone.length != 11 || phone[0] != '1') {
            $('.bk_toptips').show();
            $('.bk_toptips span').html('手机号码格式不正确');
            setTimeout(function () {
                $('.bk_toptips').hide()
            }, 2000);
            return;
        }

        //短信发送相关
        if (enable == false) {
            return;
        }
        $(this).removeClass('bk_important');
        $(this).addClass('bk_summary');
        enable = false;
        var num = 5;
        var Interval = window.setInterval(function () {
            phone_code.html(--num + '秒重新发送');
            if (num == 0) {
                phone_code.removeClass('bk_summary');
                phone_code.addClass('bk_important');
                enable = true;
                window.clearInterval(Interval);//清除定时器
                phone_code.html('重新发送');
            }
        }, 1000);

        $.ajax({
            type: 'get',
            url: '/user/sms',
            data: {phone: phone},
            dataType: 'json',
            success: function (data) {
                //服务器返回失败原因
                if (data.status != 0) {
                    $('.bk_toptips').show();
                    $('.bk_toptips span').html(data.message);
                    setTimeout(function () {
                        $('.bk_toptips').hide()
                    }, 2000);
                    return false;
                }
                //服务器返回成功的消息
                $('.bk_toptips').show();
                $('.bk_toptips span').html(data.message);
                setTimeout(function () {
                    $('.bk_toptips').hide()
                }, 2000);
            },
            error: function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });


    });


    //注册点击事件表单数据接收验证
    $('#OnclickRegister').click(function () {

        var phone = $('input[name=phone]').val();
        var password = $('input[name=password]').val();
        var repassword = $('input[name=repassword]').val();
        var phone_code = $('input[name=phone_code]').val();
        if (verifyPhone(phone, phone_code, password, repassword) == false) {
            return false;
        }
        var csrfToken = $('meta[name="csrf-token"]').attr("content");//防跨站脚本攻击
        $.ajax({
            type: 'post',
            url: '/user/registerphone',
            data: {phone: phone, password: password, repassword: repassword, phone_code: phone_code, _csrf: csrfToken},
            dataType: 'json',
            success: function (data) {
                //服务器返回失败原因
                if (data.status != 0) {
                    $('.bk_toptips').show();
                    $('.bk_toptips span').html(data.message);
                    setTimeout(function () {
                        $('.bk_toptips').hide()
                    }, 2000);
                    return false;
                }
                //服务器返回成功的消息
                $('.bk_toptips').show();
                $('.bk_toptips span').html(data.message);
                setTimeout(function () {
                    $('.bk_toptips').hide()
                }, 2000);
            },
            error: function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });


    });


    //注册号手机验证
    function verifyPhone(phone, phone_code, password, repassword) {
        if (phone == '') {
            $('.bk_toptips').show();
            $('.bk_toptips span').html('手机不为空');
            setTimeout(function () {
                $('.bk_toptips').hide()
            }, 2000);
            return false;
        }
        if (phone.length != 11 || phone[0] != '1') {
            $('.bk_toptips').show();
            $('.bk_toptips span').html('手机格式不正确');
            setTimeout(function () {
                $('.bk_toptips').hide()
            }, 2000);
            return false;
        }
        if (phone_code == '') {
            $('.bk_toptips').show();
            $('.bk_toptips span').html('手机验证码不为空');
            setTimeout(function () {
                $('.bk_toptips').hide()
            }, 2000);
            return false;
        }

        if (phone_code.length < 6) {
            $('.bk_toptips').show();
            $('.bk_toptips span').html('手机验证码为6位');
            setTimeout(function () {
                $('.bk_toptips').hide()
            }, 2000);
            return false;
        }
        if (password == '' || repassword == '') {
            $('.bk_toptips').show();
            $('.bk_toptips span').html('密码不为空');
            setTimeout(function () {
                $('.bk_toptips').hide()
            }, 2000);
            return false;
        }

        if (password.length < 6 || repassword < 6) {
            $('.bk_toptips').show();
            $('.bk_toptips span').html('密码长度不能小于6位');
            setTimeout(function () {
                $('.bk_toptips').hide()
            }, 2000);
            return false;
        }

        if (password != repassword) {
            $('.bk_toptips').show();
            $('.bk_toptips span').html('两次密码不一致');
            setTimeout(function () {
                $('.bk_toptips').hide()
            }, 2000);
            return false;
        }
        return true;
    }
});