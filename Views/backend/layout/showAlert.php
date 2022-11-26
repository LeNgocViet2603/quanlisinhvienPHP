<?php 
    include 'Views\backend\inc\header.php'; 
    include 'Views\backend\inc\scriptJS.php';
?>
<?php if(!empty($poup)){ ?>
    <?php echo $poup; ?>
<?php }else{
    echo 'error';
}?>    
