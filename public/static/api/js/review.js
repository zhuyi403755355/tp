$('#productId').attr('value',$curProductid);
layui.use('rate', function () {
    var rate = layui.rate;
    var upload = layui.upload;
    var form = layui.form;
    //渲染
    var ins1 = rate.render({
        elem: '#myRate'  //绑定元素
        , theme: '#009688'
        , half: true
        , text: true
        , setText: function (value) {
            var arrs = {
                '0':'no comment'
                ,'0.5':'impossible bad'
                ,'1': 'very bad'
                , '1.5': 'bad'
                , '2': 'little bad'
                , '2.5': 'not really bad'
                , '3': 'just so so'
                , '3.5': 'slightly good'
                , '4': 'good'
                , '4.5': 'really good'
                , '5': 'excellent'
            };
            this.span.text(arrs[value] || (value));
        }
        ,choose: function(value){
            $('#rateValue').attr('value',value);
        }

    });

    //多图片上传
    upload.render({
        elem: '#test2'
        ,url: 'https://httpbin.org/post' //改成您自己的上传接口
        ,multiple: true
        ,before: function(obj){
            //预读本地文件示例，不支持ie8
            obj.preview(function(index, file, result){
                $('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img" style="height:100px;width:100px">')
            });
        }
        ,done: function(res){
            //上传完毕
        }
    });
    form.on('submit(demo1)', function(data){
        data = data.field;
        // console.log($.cookie("frontUser"));
        // console.log(data);
        if(data.title === ''){
            layer.msg('title cannot be empty');
            return false;
        }

        if ($.cookie("frontUser")) {
            //TODO:传上去
            $.ajax({
                url:"/ThinkPHPProject/tp/public/api/review/submitReview",
                data,
                type:"POST",
                success(res){
                    if(res.status === 1){
                        layer.msg('Submit Success!', function () {
                            window.location.href="javascript:history.go(-1)";
                            // console.log(res.message);
                        });
                    }else{
                        layer.msg(res.message);
                        return false;
                    }
                }
            })
        }else{
        //    弹出确认登录框
            layer.open({
                skin: 'layui-layer-molv'
                 ,type: 1
                , title: ['You are not Login yet!', 'font-size:18px;']
                , closeBtn: 1 // 是否显示关闭按钮
                , anim: 1 //动画类型
                , area: ['300px', '200px']
                , content: $('#window')
                ,btn: ['Yes', 'Drop this form']
                ,yes: function(index, layero){
                    console.log(typeof(data))
                    //TODO:传上去
                    $.ajax({
                        url:"/ThinkPHPProject/tp/public/api/review/submitReview",
                        data,
                        type:"POST",
                        success(res){
                            if(res.status === 1){
                                layer.msg('Submit Success!', function () {
                                    window.location.href="javascript:history.go(-1)";
                                    // console.log(res.message);
                                });
                            }else{
                                layer.msg(res.message);
                                return false;
                            }
                        }
                    })
                },
                btn2: function(index, layero){
                    window.parent.location.reload();
                }
                ,cancel: function(layero,index){
                    window.parent.location.reload();
                    // System detected that you havn't login,do you want to login by your ip address?
                }
            });
        }
        return false;
    });
});

