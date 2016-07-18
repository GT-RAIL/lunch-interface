<?php
/**
 * Trains Interface
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
// bootstrap
echo $this->Html->script('bootstrap.min');
echo $this->Html->css('bootstrap.min');

echo $this->Html->css('TrainsInterface');
?>


<header class="special container">
	<span class="icon fa-cloud"></span>

	<!--<h2>TRAINS Intewwrface</h2>-->
</header>

<!-- intro section -->
<section class="style4 container queue" id="experiment-intro">
    <h3>Thanks for completing the GT RAIL Lab Crowd-sourced Robot Experiment</h3>
    <div class='row'>
        <div class='col-4'>
            <p>
            If you are from CrowdFlower, please enter your Crowdflower ID.
            </p>
            <p>
            <label>ID:</label><input type='text' id='crowdflower_id'/>  
            <div style='display:none' id='crowdlower_code'>
                TA3LE30T STU0Y<?php echo $user_id?>
            </div>
            </p>
            <p>
            <button id='click_btn' class='btn btn-success'>Submit and reveal Crowdflower Code</button>
            <div id='done' style='display:none'>Thank You. You can go back to Crowdflower</div>
            </p>
        </div>
    </div>
</section>

<script type="text/javascript">
    $('#click_btn').click(function(event){       
        $.ajax({
        'type':'POST',
        'url':"/Logs/add",
        'data':{
            'type' :'string',//'string', //options: string json numeric score
            'label':'crowdflower',
            'entry' :'{data:crowdflower,crowdflower_id:'+$('#crowdflower_id').val()+',user_id:<?php echo $user_id;?>}'
        },
        success: function () {
            $('#crowdlower_code').html('TA3LE30T STU0Y'+$('#crowdflower_id').val())
            $('#crowdflower_id').css('display','none')
            $('#click_btn').css('display','none')
            $('#done').css('display','block')
            $('#crowdlower_code').css('display','block')
        }
        });
    })
</script>
