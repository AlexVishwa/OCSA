
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
            