
 <div id="wrapper">
   <div><a href="<?php echo SITE_PATH;?>">Back To Listing</a></div>
    <div id="product_detail_box">
         <?php
          if(isset($arrData) && !empty($arrData)){
            foreach($arrData as $productList) {
                ?>
                <div>
                    <div class="product_detail_title"><h2><?php echo $productList['title'];?></h2></div>
                    <div class="product_detail_tutorial_link"><h2>
                        <a href=<?php echo $productList['tutorial_link'];?>>Tutorial Link</a>
                    </h2></div>
                </div>
                <div>
                   <?php echo $productList['desc'];?></h2>
                </div>
                <?php
            }
          }else{
              echo 'Data Not Found';
          }
          ?>
    </div>
 </div>