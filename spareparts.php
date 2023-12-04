<?php
include_once('header.php');
?>
<style>
    
    .column img{
        width: 100%;
    height: 200px;
    margin: 1.25%;
    border-radius: 5px;
   
    object-fit: cover;
    object-position: center;
    }
    .item_title{
        color: yellow;
    background: red;
    padding: 5px 10px;
    }
    .item_price{
        color: green;
    }
    .wrape{
      background: #fff;
    margin: 0px;
    0px: ;
    padding: 4px;
    border-radius: 8px;
    margin-bottom: 10px;
    box-shadow: 1px 1px 10px #00000045;
    }
    h3{
        width: 100%;
    text-align: center;
    /* background: #fff; */
    padding: 14px;
    color: #aa0000;
    /* border: none; */
    border-radius: 0px;
    font-weight: 500;
    font-size: 25px;
    border-bottom: 1px solid;
    }
</style>
<div class="container">
    <h3>Spare Parts Price</h3>
    <div class=" row ">
        <?php
          $parts=file_get_contents('./parts/parts.json');
          $part_arr=json_decode($parts,true);
          
          for($i=0;$i<count($part_arr);$i++){
              
        ?>
       <div class="col-md-6 column">
          <div class="row wrape">
              <div class="col-md-6">
                <img src="parts/<?php echo $part_arr[$i]['img']; ?>">
              </div>
                <div id="content " class="col-md-6">
                    <h4 class="item_title"><?php echo $part_arr[$i]['title']; ?></h4>
                    <h4 class="item_price">Price: &#8377 <?php echo $part_arr[$i]['price']; ?>  <strike>&#8377 <?php echo $part_arr[$i]['offer_price']; ?></strike></h4>
                    <p><?php echo $part_arr[$i]['description']; ?></p>
                </div>
          </div>
       </div>
       <?php
          }
       ?>
       
       
    </ul>
</div>
</div>
<?php
include_once('footer.php');
?>