var oldTime = new Date().getTime();
var newTime = new Date().getTime();
var outTime =  10 * 60 * 1000; //设置超时时间： 10分钟

$(function(){
    /* 鼠标移动事件 */
    $(document).mouseover(function(){
        oldTime = new Date().getTime(); //鼠标移入重置停留的时间

    });
});

function OutTime(){
    newTime = new Date().getTime(); //更新未进行操作的当前时间
    if(newTime - oldTime > outTime){ //判断是否超时不操作
       if($.cookie("frontUser")){
           layer.msg('10 Minutes Not Operated,Log out!', function () {
               window.location = '/ThinkPHPProject/tp/public/api/logout/index';
           });
       }
    }
}

/* 定时器  判断每5秒是否长时间未进行页面操作 */
window.setInterval(OutTime, 5000);