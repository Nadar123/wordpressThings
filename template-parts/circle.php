<?php
$json_data = get_json_data();
?>

<?php foreach( $json_data as $year_index => $year_item ):?>
  <div class="dashboard-slide-item">
    <div id="slide-container" class="slide-container">
      <div class="circles-wrapper">
        <?php if( isset( $year_item->circle1 ) ):?>
          <div 
            class="circle-item" 
            data-current="<?php echo (int)$year_item->circle1->value;?>" 
            data-max="<?php echo (int)$year_item->circle1->maxValue;?>">

          <h3 class="circle-title">Some Text</h3>
            <div 
              class="count-circle" 
              id="cont<?php echo $year_index;?>-1" 
              data-pct="<?php echo (int)$year_item->circle1->value;?>">
              <svg 
                class="svg-circle" 
                id="svg<?php echo $year_index;?>1" 
                width="200" height="200" 
                viewPort="0 0 100 100" 
                version="1.1" 
                xmlns="http://www.w3.org/2000/svg">
                <circle 
                  r="90" 
                  cx="100" 
                  cy="100" 
                  fill="transparent" 
                  stroke-dasharray="565.48" 
                  stroke-dashoffset="0"></circle>
                <circle 
                  class="bar-circle" 
                  id="bar<?php echo $year_index;?>1" 
                  r="90" cx="100" 
                  cy="100" 
                  fill="transparent" 
                  stroke-dasharray="565.48" 
                  stroke-dashoffset="0"></circle>
              </svg>
            </div>
          </div>
        <?php endif;?>
        <?php if( isset( $year_item->circle2 ) ):?>
          <div 
            class="circle-item" 
            data-current="<?php echo (int)$year_item->circle2->value;?>" 
            data-max="<?php echo (int)$year_item->circle2->maxValue;?>">

          <h3 class="circle-title">Some Text</h3>
          <div 
            class="count-circle" 
            id="cont<?php echo $year_index;?>2" 
            data-pct="<?php echo (int)$year_item->circle2->value;?>">
              <svg 
                class="svg-circle" 
                id="svg<?php echo $year_index;?>2" 
                width="200" height="200" 
                viewPort="0 0 100 100" 
                version="1.1" 
                xmlns="http://www.w3.org/2000/svg">
                <circle 
                  r="90" 
                  cx="100" 
                  cy="100" 
                  fill="transparent" 
                  stroke-dasharray="565.48" 
                  stroke-dashoffset="0"></circle>
                <circle 
                  class="bar-circle" 
                  id="bar<?php echo $year_index;?>2" 
                  r="90" 
                  cx="100" 
                  cy="100" 
                  fill="transparent" 
                  stroke-dasharray="565.48" 
                  stroke-dashoffset="0"></circle>
              </svg>
            </div>
          </div>
        <?php endif;?>
      </div>
      <?php if( isset( $year_item->categories ) ):?>
        <div class="progressbars-wrapper">
          <?php foreach( $year_item->categories as $category_item ):?>
            <div class="progressbar-item">
            <p>
              <span class="value">
                <?php echo $category_item->value; ?>
              </span>
              <span class="item-title">
                <?php echo $category_item->Title; ?>
              </span>
  
              <progress 
                max="<?php echo $category_item->maxValue; ?>" 
                value="<?php echo $category_item->value; ?>" 
                class="html5">
                <div class="progress-bar">
                </div>
              </progress>                              
            </p>
            </div>
          <?php endforeach;?>
        </div>
      <?php endif;?>
    </div>
  </div>
<?php endforeach;?>