
 <div id="wrapper">
    <div id="product_listing">
        <?php
        if(isset($arrData) && !empty($arrData)){ 
          foreach($arrData as $productList) {
          ?>
        <div class="product_box">
          <div class="product_image"><img src='<?php echo IMAGE_PATH.$productList["image"];?>' width="190" height="75" /></div>
          <div class="product_detail">
             <div class="product_title"><strong><?php echo $productList['title'];?></strong></div>
          </div>
          <div class="clear"></div>
          <div class="product_desc"><?php echo substr ($productList['desc'],0,120);?></div>
          <div class="extra">
            <div class="tutorial_link">
               <strong><a href='<?php echo $productList["tutorial_link"];?>' target="blank">Tutorial Link</a></strong>
            </div>
            <div class="more">
               <a href='<?php echo SITE_PATH?>index.php?controller=product&function=detail&id=<?php echo $productList["id"];?>'>more</a>
            </div>
          </div>
        </div>
        <?php } } else {
           echo 'Data Not Found';
         } ?>
    </div>
 </div>