<?php

    //connection database
    $connect = mysqli_connect("localhost","root", "","dbwaterlevel");
    //read database
    $sql = mysqli_query($connect,"SELECT * FROM tb_tangki");
    $data = mysqli_fetch_array($sql);

    $tinggi_air = $data['tinggi'];

?>
<!-- Body Water Level -->
<div class="tangki">
		<!-- aiR -->
		<div class="air" style="width: 100%; height: <?php echo $tinggi_air; ?>%; color: white; ">

        <?php
            echo "Water Level : ".($tinggi_air)."m";

        ?>
    
    
    </div>
</div>
