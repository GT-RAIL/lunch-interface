<?php
/**
 * Pacman Interface without ROS/robot integration
 *
 * The Trains Interface view. This interface will for testing queuing and chat.
 *
 * @author		Aaron St. Clair - astclair@gatech.edu
 * @copyright	2015 Georgia Institute of Technology
 * @link		https://github.com/WPI-RAIL/TrainsInterface
 * @since		TrainsInterface v 0.0.1
 * @version		0.0.1
 * @package		app.Controller
 */
?>

<?php
// user id
if (isset($appointment['Appointment']['user_id'])){
    $user_id = $appointment['Appointment']['user_id'];
}

else if(isset($userId)) {
    $user_id = $userId;
} else if(isset($_GET['userid'])){
    $user_id = $_GET['userid'];
}
else{
    $user_id = '';
}
?>


<?php
// Do analytics and logging 
//echo $this->Html->script('analytics.js');

//jquery
//echo $this->Html->script('jquery-1.11.0');

// bootstrap
//echo $this->Html->script('bootstrap.min');
//echo $this->Html->css('bootstrap.min');

echo $this->Html->script('modernizr-1.5.min');
echo $this->Html->script('pacman');

//echo $this->Html->script('tutorial.js');

// CSS
// For spinner etc.
//echo $this->Html->css('font-awesome.min.css');

//Init study information
echo $this->Rms->initStudy();

$appointment = $environment['Condition'][0]['Slot'][0];
?>

<style type="text/css">
    #pacman {
      height:450px;
      width:342px;
      margin:20px auto;
    }
    body { width:342px; margin:0px auto; font-family:sans-serif; }
    a { text-decoration:none; }
</style>

<section>

    <h1>Pacman</h1>

    <div id="pacman"></div>

    <script>
        var el = document.getElementById("pacman");

        if (Modernizr.canvas && Modernizr.localstorage && 
            Modernizr.audio && (Modernizr.audio.ogg || Modernizr.audio.mp3)) {
          window.setTimeout(function () { PACMAN.init(el, "./"); }, 0);
        } else { 
          el.innerHTML = "Sorry, needs a decent browser<br /><small>" + 
            "(firefox 3.6+, Chrome 4+, Opera 10+ and Safari 4+)</small>";
        }
    </script>
</section>