$(function() {
    //this function is called to give the analytics back to the user 
    $.ajax({
        type: "POST",
        url: '/Analytics/add',
        data: {
            'Analytics':{
                'os':navigator.oscpu,
                'browser':navigator.userAgent,
                'screen_size':$(window).width()+"x"+$(window).height(),
                'user_id':"<?php echo $userId?>"
            }
        },
        success: function(){
            console.log('Analytics Complete!')
        },
    });


    $.ajax({
        'type':'POST',
        'url':"/Logs/add",
        'data':{
            'type' :'string',//'string', //options: string json numeric score
            'label':'trains',
            'entry' :'{data:startingstudy,user_id:<?php echo $user_id;?>}'
        },
        success: function () {
          console.log('Logging Started!')
        }
    });
});
