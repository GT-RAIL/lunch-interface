<?php
/**
 * Trains Interface without ROS/robot integration
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

// Do analytics and logging 
echo $this->Html->script('analytics.js');

echo $this->Html->script('tutorial.js');

// jstree for collapsible tree view of HTN
//echo $this->Html->script('jstree.min');
//echo $this->Html->css('jstree-themes/default/style.min.css');

// CSS
// For spinner etc.
echo $this->Html->css(array(
			'//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'));
echo $this->Html->css('LunchesInterface');

//Init study information
echo $this->Rms->initStudy();

$appointment = $environment['Condition'][0]['Slot'][0];
?>
<script>
var user_id =  <?php echo $user_id;?>;
$(function() {
    $("#interface").hide();
    $().tutorial({
        onCompletion: function() {
            $("#tutorial").hide();
            $("#interface").show();

        }
    });
});
</script>

<header class="container">
    <h3 style="text-align: center">Teach a Robot a Task</h3>
</header>
<section class='wrapper style4'>
Stuff here...
</section>

<!-- intro section -->
<section class='wrapper style4'>
    <section id="tutorial" data-num-slides="3">
        <section id="tutorial-1" class="tutorial-section">
            <p>Someday, you may have a robot in your home (if you don't already) to help you. Since every home is different and people have different preferences, you may need to teach your robot how you want it to do things.</p>
            <section>
<?php
echo $this->Html->image('robot-home.png', array(
    'class'=>'tutorial-image',
    'width'=>'400',
    'alt'=>'In-home robot'
));
?>
            </section>
        </section>

        <section id="tutorial-2" class="tutorial-section">
            <p>Your job now is to teach the robot how to pack a set of lunches by demonstrating the right sequence of actions such as what objects to pick up and where to place them.</p>
            <section>
<?php
echo $this->Html->image('robot-lunch.jpg', array(
    'class'=>'tutorial-image',
    'width'=>'400',
    'alt'=>'In-home robot'
));
?>
            </section>
        </section>

        <section id="tutorial-3" class="tutorial-section">
            <p>For each lunch you will be required to pack four items total, one of each in the following categories:
                <ul>
<?php
$items = array(
    'fruit' => array('apple', 'lemon', 'orange', 'peach', 'pear'),
    'drink' => array('coffee', 'juice', 'milk', 'milk2', 'water'),
    'main item' => array('noodles', 'salad', 'sandwich', 'soup', 'tuna'),
    'snack item' => array('cheezit', 'cookies', 'nutella', 'pretzels', 'raisins')
);
foreach($items as $type=>$item_list) {
?>
                    <li>One <?php echo $type;?></li>
                    <div class="row">

<?php
    foreach($item_list as $i) {
?>
                        <div class="col-xs-2">
<?php
echo $this->Html->image('lunch/'.$i.'.jpg', array(
    'class'=>'img-responsive',
    'width'=>'100',
    'alt'=>$i
));
?>
                        </div>
<?php
}
?>
                    </div>
                    <hr/>
<?php
}
?>
                </ul>
            </p>
        </section>

        <section id="tutorial-4" class="tutorial-section">
            <p>Each lunch will be 
            </p>
            <section>
<?php
echo $this->Html->image('robot-lunch.jpg', array(
    'class'=>'tutorial-image',
    'width'=>'400',
    'alt'=>'In-home robot'
));
?>
            </section>
        </section>

    </section>

    <section id="interface">
        <section>
            <p>Stuff here.....</p>
            <section>
                <form>
                    Form here...
                </form>
            </section>
        </section>
    </section>

</section>
