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
            