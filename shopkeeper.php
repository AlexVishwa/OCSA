<?php
include_once('header.php');
?>
<style>
.listing-block {
    display: flex;
    background: #fff;
    margin: 10px 0px 10px 10px;
    padding: 10px;
    border-bottom: 0.1px solid #aa0000;
    box-shadow: 4px 4px 14px #cccccc6e;
}

.listing-block .img {
    width: 100px;
    margin-right: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.listing-block .img img {
    height: 100%;
}

.content {
    display: flex;
    flex-direction: column;
}

.content #title {
   font-size: 15px;
    font-weight: 700;
    color: #20ad20;
}

.content #cat {
    font-size: 12px;
    color: #6f0000;
}

.content #pay {
    font-size: 9px;
    font-weight: 600;
}
.category-button {
    display: flex;
    overflow-y: hidden;
    overflow-x: auto;
    padding: 10px;
}

.category-button button {
    margin: 2px 5px;
    padding: 0px 20px;
    border-radius: 26px;
    background: #aa0000;
    color: #f8f9fa;
    border: none;
    font-size: 15px;
    font-weight: 600;
}

.category-button button:focus,.category-button button:hover {
    background: #ffff00;
    color: #9C27B0;
    outline: none;
    border: none;
    font-weight: 600;
    font-size: 15px;
}
div#call {
    flex: 1;
    display: flex;
    justify-content: right;
    align-items: center;
    font-size: 20px;
}

div#call a {
   
    padding: 4px 9px;
    border-radius: 100%;
    color: green;
}
@media only screen and (max-width: 768px) {
  .category-button button {
    margin: 2px 5px;
    padding: 5px 20px !important;
    border-radius: 26px;
    background: #aa0000;
    color: #f8f9fa;
    border: none;
    font-size: 10px !important;
    font-weight: 100 !important;
}
}
</style>
<?php
 $data=file_get_contents('database/shops.json');
 $arr=json_decode($data,true);
		    
 $category_data=file_get_contents('database/category.json');
 $category_arr=json_decode($category_data,true);
?>
<section class="head">
    <div class="container">
        <h4 class="text-center text-red" style="font-size: 25px;padding-top: 20px;color: #aa0000 !important;border-bottom: 1px solid;padding-bottom: 10px;"><span>Stores/Shops Near You</span></h4>
    </div>
    <div class="container category-button">
        <?php
         for($k=0;$k<count($category_arr);$k++){
             echo '<button class="btn btn-primary btn-sm btn-round" id="showcat" data-id="'.$category_arr[$k]["id"].'">'.$category_arr[$k]["title"].'</button>';
         }
        ?>
    </div>
    
</section>
<div class="clearfix"></div>

<section class="search-box">
    <div class="container-fluid">
	<div class="row" style="background: #fff;">
	     <?php
		   
		    for($i=0;$i<count($arr);$i++){
		       		    ?>
    		<div class="col-md-5 listing-block all <?php echo $arr[$i]['category']; ?>">
    		   <div class="img"><img class="d-flex align-self-start" id="image" src="images/OcsaQR.png" alt="<?php echo $arr[$i]['title'];?>" style="width:100%"></div>
    		   <div class="content">
    		       <p id="title"><i class="fa fa-circle"></i>  
                    <?php echo $arr[$i]['title'];?></p>
    		       <p id="cat"><i class="fa fa-tag"></i>  <?php 
    		       
    		        for($j=0;$j<count($category_arr);$j++){
    		            if($category_arr[$j]['id']==$arr[$i]['category']){
    		             echo $category_arr[$j]['title'] ;     
    		            }
    		        }
    		       ?></p>
    		       <p id="pay"><i class="fa fa-qrcode"></i> Scan and Pay Via OCSA using OCSA QRCODE</p>
    		   </div>
    		   <div id="call">
    		       <a href="tel:<?php echo $arr[$i]['mobile']; ?>"><i class="fa fa-phone"></i></a>
    		       <a href="#"><i class="fa fa-qrcode"></i></a>
    		   </div>
               <button id="print" >Print QR</button>
    		</div>
		  <?php
		    }
            ?>
	
	</div>
</div>
</section>
<script>
const printBtn = document.getElementById('print');

printBtn.addEventListener('click', function() {
iframe.contentWindow.print();
});
const iframe = document.createElement('iframe');
// Make it hidden
iframe.style.height = 0;
iframe.style.visibility = 'hidden';
iframe.style.width = 0;

// Set the iframe's source
iframe.setAttribute('srcdoc', '<html><body></body></html>');

document.body.appendChild(iframe);
iframe.addEventListener('load', function () {
    // Clone the image
    const image = document.getElementById('image').cloneNode();
    image.style.maxWidth = '100%';

    // Append the image to the iframe's body
    const body = iframe.contentDocument.body;
    body.style.textAlign = 'center';
    body.appendChild(image);
        // Invoke the print when the image is ready
        
});


//   show category wise store and shops
 $(document).on('click','button#showcat',(function(e) {
    var id=$(this).data('id');
    $('.all').fadeOut('fast');
    $("."+id).slideToggle();
 }));
</script>
<?php
include_once('footer.php');


?>