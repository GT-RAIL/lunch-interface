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
//jquery
echo $this->Html->script('jquery-1.11.0.');
// bootstrap
echo $this->Html->script('bootstrap.min');
echo $this->Html->css('bootstrap.min');
echo $this->Html->css('LunchesInterface');

// Do analytics and logging 
echo $this->Html->script('analytics.js');

echo $this->Html->script('tutorial.js');

// jstree for collapsible tree view of HTN
//echo $this->Html->script('jstree.min');
//echo $this->Html->css('jstree-themes/default/style.min.css');

// CSS
// For spinner etc.
echo $this->Html->css('font-awesome.min.css');
echo $this->Html->css('LunchesInterface');

//Init study information
echo $this->Rms->initStudy();

$appointment = $environment['Condition'][0]['Slot'][0];
?>
<script>
$(function() {
    var user_id =  <?php echo $user_id;?>;
    var lunch = ["empty", "empty", "empty", "empty"];
    var empty_path = "/img/lunch/empty.png";
    $("#interface").hide();
    $().tutorial({
        onCompletion: function() {
            $("#tutorial").hide();
            $("#interface").show();

        }
    });

    $(".lunch-item").click(function() {
        var id = $(this).attr('id');
        var idx = $(this).data('idx');

        lunch[idx] = "empty";
        $("#lunch-item"+idx).attr('src', empty_path);
    });

    $(".item").click(function() {
        var id = $(this).attr('id');
        var src = $(this).attr('src');

        for(i=0; i<lunch.length; ++i) {
            if(lunch[i] == "empty") {
                lunch[i] = src;
                $("#lunch-item"+i).attr('src', src);
                return;
            }
        }

        alert("The lunchbox is full. Please remove an item first.");
    });
});
</script>

<header class="container">
    <h3 style="text-align: center">Teach a Robot a Task</h3>
</header>

<!-- intro section -->
<section class='wrapper style4'>
    <section id="tutorial" data-num-slides="3">
        <section id="tutorial-1" class="tutorial-section">
            <p>Someday, you may have a robot in your home to help you. Since every home is different, you may need to teach your robot how to do things.</p>
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
            <p>Your job is to teach a robot how to pack lunches by demonstrating what objects to include in the lunch.</p>
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
            <p>For each lunch you will be required to pack four items total:
                <ul>
<?php
$items = array(
    'fruit' => array('apple', 'lemon', 'orange', 'peach', 'pear'),
    'drink' => array('coffee', 'juice', 'milk', 'milk2', 'water'),
    'main item' => array('noodles', 'salad', 'sandwich', 'soup', 'tuna'),
    'snack item' => array('crackers', 'cookies', 'nutella', 'pretzels', 'raisins')
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
            <section>
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="lunchbox" class="container lunch-div">
                                
        <?php
        echo $this->Html->image('lunch/boxes/1.png', array(
            'id'=>'lunch',
            'class'=>'lunch',
            'width'=>'400',
        ));
        echo $this->Html->image('lunch/empty.png', array(
            'id'=>'lunch-item0',
            'data-idx'=>0,
            'class'=>'lunch-item lunch-item0',
            'width'=>'100',
        ));
        echo $this->Html->image('lunch/empty.png', array(
            'id'=>'lunch-item1',
            'data-idx'=>1,
            'class'=>'lunch-item lunch-item1',
            'width'=>'100',
        ));
        echo $this->Html->image('lunch/empty.png', array(
            'id'=>'lunch-item2',
            'data-idx'=>2,
            'class'=>'lunch-item lunch-item2',
            'width'=>'100',
        ));
        echo $this->Html->image('lunch/empty.png', array(
            'id'=>'lunch-item3',
            'data-idx'=>3,
            'class'=>'lunch-item lunch-item3',
            'width'=>'100',
        ));
        ?>
                            </div>
                        </div>

                        <div class="col-md-6 item-div">

                            <p>Select an item to pack:
                                <ul>
                <?php
                $items = array(
                    'fruit' => array('apple', 'lemon', 'orange', 'peach', 'pear'),
                    'drink' => array('coffee', 'juice', 'milk', 'milk2', 'water'),
                    'main item' => array('noodles', 'salad', 'sandwich', 'soup', 'tuna'),
                    'snack item' => array('crackers', 'cookies', 'nutella', 'pretzels', 'raisins')
                );
                $idx = 1;
                foreach($items as $type=>$item_list) {
                ?>
                                    <li><?php echo ucfirst($type);?></li>
                                    <div class="row">

                <?php
                    foreach($item_list as $i) {
                ?>
                                        <div class="col-xs-2">
                <?php
                echo $this->Html->image('lunch/'.$i.'.png', array(
                    'id'=>("item".$idx),
                    'class'=>'item',
                    'width'=>'80',
                    'alt'=>$i
                ));
                $idx++;
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
                        </div>
                    </div>
                </form>
            </section>
        </section>
    </section>

</section>
