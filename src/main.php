<div class="row">
	<div class="col-md-9">
		<!--Awal  -->
        <?php
        // Tangkap request dari url
        $hal=$_REQUEST['hal'];
        if(!empty($hal)){
            include_once $hal.'.php';
        }else{
            include_once 'home.php';
        }
        ?>

        <!-- Akhir -->
    </div>