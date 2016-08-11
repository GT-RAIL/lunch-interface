var chat_topic = new ROSLIB.Topic({
    ros: _ROS,
    name: '/web_interface/chat',
    messageType: 'std_msgs/String'
});
chat_topic.advertise();

chat_topic.subscribe(function (message) {
    $('#chat-display').append('<br>'+message.data);
    $("#chat-display").scrollTop($("#chat-display")[0].scrollHeight);
});
// Detect resizing of the text box or display div and resize the other to 
// matching width

var chat_resizable_elements = $('#chat-text-input, #chat-display');

// set init (default) state   
chat_resizable_elements.data('x', chat_resizable_elements.width());
chat_resizable_elements.data('y', chat_resizable_elements.height()); 

// Bind to mouseup and check for resize
chat_resizable_elements.mouseup(function(){
    if (  $(this).width()  != $(this).data('x') 
    || $(this).height() != $(this).data('y') )
    {
        chat_resizable_elements.not(this).width( $(this).width() );
    }
    // set new height/width
    $(this).data('x', $(this).width());
    $(this).data('y', $(this).height());
});


$('#chat-text-input').keyup(function(event) {
    event.preventDefault();
    if(event.keyCode == 13) {
        //rosQueue.sendChat($('#chat-text-input').val());

        chat_topic.publish(new ROSLIB.Message({data:'<b>Me:</b>'+$('#chat-text-input').val(),}));
        $('#chat-text-input').val('');
    }
});

