<?php echo $this->render('include/header'); ?>
<?php echo $this->render('include/navbar'); ?>

<?php  
    $session=session();
    
    echo $session->get('product_id');echo '<pre>';
    echo $session->get('product_seller_id');echo '<pre>';
    echo $session->get('buyer_datefrom');echo '<pre>';
    echo $session->get('buyer_dateto');echo '<pre>';
    echo $session->get('buyer_timeefrom');echo '<pre>';
    echo $session->get('buyer_timeto');echo '<pre>';
    echo $session->get('buy_stock');echo '<pre>';
    echo $session->get('total_price');
    
?>

<?php echo $this->render('include/footer'); ?>