var enabled = true;
var rosQueue = new ROSQUEUE.Queue({
    ros: _ROS,
    studyTime: 1000,
    chatEnabled: true,
    userId: user_id
});

/*
 * notify user if I receive a now_active message
 * This method is called once when you're first enabled
 * for a method called continuously, use on 'enabled'
 * When this is called, add all the control elements to the interface.
 * This includes interactive markers, keyboard controls, and button controls
 * @param message Int32 message, the id of the user to remove
 */
rosQueue.on('activate', function () {
    //slight pause helps with loading the webpage
    //setTimeout(tutorial, 1000);
    if(rosQueue.userId!=''){

    }

    document.title='ACTIVE '+document.title
    console.log('queue activated')
    $('#queue-waiting').hide();
});

/**
 * update user wait time for active user
 */
rosQueue.on('enabled', function (message) {
    var d = new Date();
    d.setSeconds(message.sec);
    d.setMinutes(message.min);
    $('#experiment-intro').hide();
    $('#queue-status').html('Estimated time Remaining ' + d.toLocaleTimeString().substring(3, 8));

});

/**
 * when I receive a new time update the interface
 * @param data objected with time in min & sec
 */
rosQueue.on('wait_time', function(data) {
    var d = new Date();
    d.setSeconds(data.sec);
    d.setMinutes(data.min);
    //substring removes hours and AM/PM
    //$('#queue-status').html('Your approximate wait time is ' + d.toLocaleTimeString().substring(3, 8));
    if(data.min<1){
        id(data.sec>0)
    window.document.title=d.toLocaleTimeString().substring(3, 8)+' to study'
    }
});

/*
 * notify user if I receive a pop_front message
 * @param message Int32 message, the id of the user to remove
 */
rosQueue.on('disabled', function () {
    $('#experiment-intro').hide();
    $('#study-page').hide();
    $('#queue-waiting').show();
    enabled = false;
    //		document.getElementById('segment').className = 'button fit';
    //		document.getElementById('ready').className = 'button fit';
    //		document.getElementById('retract').className = 'button fit';
});

/**
 * when the user is dequeued, send them back to their account
 */
rosQueue.on('dequeue', function () {

});
rosQueue.updateQueueClient.advertise();

/**
 * when I exit the webpage, kick me out
 */
window.onbeforeunload = function () {
    rosQueue.dequeue();
    return undefined;
};

/**
 * Add me when I first visit the site
 */
rosQueue.enqueue();

function addQueueStatus(){
    $('#queue-status').html('robot active!');
}
