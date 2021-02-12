<?php
  $json_data = get_json_data();
?>
  <?php foreach( $json_data as $year_item ):?>
    <div class="dashboard-year-item">
      <div class="year-wrapper">
        <span><?php echo $year_item->year;?></span>
      </div>
    </div>
  <?php endforeach;?>