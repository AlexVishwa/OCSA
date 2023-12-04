<?php
  include_once('header.php');
?>
<style>
.container-fluid {
    background: linear-gradient(45deg, #FF5722, #e91e63c4), url(https://images.livemint.com/rf/Image-621x414/LiveMint/Period2/2016/12/29/Photos/Processed/nareshguliani-kgI--621x414@LiveMint.jpg);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding-top: 20px;
    padding-bottom: 30px;
}

.container-fluid h4 {
    color: #fff;
    border-bottom: 2px solid #ffffff;
    padding: 15px;
    padding-bottom: 6px;
    box-shadow: 1px 15px 10px #00000045;
}
.container h5{
    color: #fff;
}
.inputs {
    padding: 0px 10px 10px 0px;
}

.inputs input,.inputs textarea,.inputs select {
    border-radius: 0px;
    border: 0.1px solid #000;
}
.container.section {
    background: #044085a1;
    padding: 10px 20px 10px 25px;
    border-left: 2px solid #ffffff;
    margin-bottom:6px;
}
#submit{
    border: none;
    padding: 5px 20px;
    background: #0dce0d;
    color: #fff;
}
</style>  
</head>
  <body>
      <div class="container-fluid">
            <!-- personal details -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Partners Registration form</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="./">Personal Details</a></li>
              <li class="breadcrumb-item">Shop/Store Details</li>
              <li class="breadcrumb-item" aria-current="page">Timing and Partner Type</li>
              <li class="breadcrumb-item" aria-current="page">Bank Details</li>
              <li class="breadcrumb-item" aria-current="page">Upload KYC Documents</li>
            </ol>
            </div>
        <form action="submitpartner.php" id="submitpartner" method="post" enctype="multipart/form-data">
            <!-- shop details -->
            <div class="container section storedetails">
                <h5>Shop/Store Details</h5>
                <div class="wraper row">
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="shopname" id="shopname" class="form-control" placeholder="Shop/Store Name">
                    </div>
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <select name="shopcategory" id="shopcategory" class="form-control">
                            <option value="" selected>---Shop Category---</option>
                            <?php
                              $category=file_get_contents('database/category.json');
                              $cate_data=json_decode($category,true);
                              for($i=0;$i<count($cate_data);$i++){
                                  echo '<option>'.$cate_data[$i]['title'].'</option>';
                              }
                            ?>
                        </select>
                    </div>
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="shopno" id="shopno" class="form-control" placeholder="Shop/Store number">
                    </div>
                    <div class="inputs col-md-12 col-sm-12 col-xs-12">
                        <textarea class="form-control" placeholder="Shop/Store Description" name="shopdesc" id="shopdesc"></textarea>
                    </div>               
                    <div class="inputs col-md-12 col-sm-12 col-xs-12">
                        <textarea class="form-control" placeholder="Shop/Store Full Address" name="shopaddress" id="shopaddress"></textarea>
                    </div>

                </div>
            </div>
              <!-- shop details -->
            <div class="container section timings">
                <h5>Timing and Partner Type</h5>
                <div class="wraper row">
                    
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <label>Select Partner</label>
                        <select name="partnertype" id="partnertype" class="form-control">
                            <option value="" selected>---Select Partner Type---</option>
                            <option value="free">Free Partner</option>
                            <option value="paid">Paid Partner</option>
                        </select>
                    </div>
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <label>Start Time</label>
                        <input type="time" name="timefrom" id="timefrom" class="form-control" placeholder="Time From" value="Start Time">
                    </div>
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <label>End Time</label>
                        <input type="time" name="timeto" id="timeto" class="form-control" placeholder="Time To" value="End Time">
                    </div>
                   

                </div>
            </div>
            <!-- bank details  -->
            <div class="container section">
                <h5>Bank Details</h5>
                <div class="wraper row">
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="bankaccount" id="bankaccount" class="form-control" placeholder="Bank  ACCOUNT NO." required="required">
                    </div>
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="bankifsc" id="bankifsc" class="form-control" placeholder="Bank  IFSC" required="required">
                        <label class="text-danger" id="error_ifsc"></label>
                    </div>
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="branch" id="branch" class="form-control" placeholder="Bank Branch" required="required" readonly="readonly">
                    </div>
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="bankname" id="bankname" class="form-control" placeholder="Bank Name" required="required" readonly="readonly">
                    </div>
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="bankaddress" id="bankaddress" class="form-control" placeholder="Bank Address" required="required" readonly="readonly">
                    </div>
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="account_holder_name" id="account_holder_name" class="form-control" placeholder="Account Holder Name" required="required">
                    </div>
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="bankcity" id="bankcity" class="form-control" placeholder="city" required="required" readonly="readonly">
                    </div>
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <input type="text" name="bankstate" id="bankstate" class="form-control" placeholder="State" required="required" readonly="readonly">
                    </div>
                    

                </div>
            </div>
            <!-- kyc documents -->
            <div class="container section">
                <h5>UPLOAD KYC DOCUMENTS</h5>
                <div class="wrapper row">
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <label>AADHAR CARD</label>
                        <input type="file" name="aadharcardfile" id="aadharcardfile" class="form-control" required="required">
                    </div>
                    <div class="inputs col-md-4 col-sm-6 col-xs-12">
                        <label>PAN CARD</label>
                        <input type="file" name="pancardfile" id="aadharcardfile" class="form-control" required="required">
                    </div>
                    <div class="inputs col-md-12 col-sm-12 col-xs-12">
                       <button id="submit" type="submit">SUBMIT</button>
                    </div>
                </div>
            </div>
            </form>
      </div>
      
   <?php
   include_once('footer.php');
   ?>