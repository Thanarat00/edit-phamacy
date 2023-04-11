<?php if ($row >0) {?>
                            
                                <div class="row">  
                                <?php while($rs_prd = mysqli_fetch_array($nquery)){ ?> 
                                <div class="col-md-4">

                                    <div class="card" style="">
                                      <img width="100%" src="../p_img/<?php echo $rs_prd['p_img'] ;?>" class="card-img-top" alt="<?php echo $rs_prd['p_name'] ;?>" title="<?php echo $rs_prd['p_name'] ;?>">

                                      <div class="card-body">
                                        <h5 class="card-title"><?php echo $rs_prd['p_name']; ?></h5>
                                        <p class="card-text"><?php echo number_format($rs_prd['p_price'],2); ?> Baht</p>

                                        <?php if($rs_prd['p_qty'] > 0){ ?>

                                          <center>  
                                          <!-- QR Code -->
                                              <!-- <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $rs_prd['p_id'];?>&choe=UTF-8" title="Link to my Website" /> -->
                                          <!-- Bar Code -->      
                                          <?php echo barcode($rs_prd['p_id']); ?>
                                       
                                          <br>

                                          <a href="list_l.php?p_id=<?php echo $rs_prd['p_id'];?>&act=add" class="btn btn-success" target=""><i class="fa fa-shopping-cart"></i> หยิบลงตระกร้า</a>
                                          </center>

                                        <?php } else { ?>
                                          <button class="btn btn-danger" disabled> สินค้าหมด !</button>
                                      </div>

                                      <?php } ?>
                                    </div>
                                   
                                </div> 
                                
                                </div>  

                              <?php }?>
                            


                          <?php }else{?>

                            <div class="container">

                              <h4><center>สินค้าอยู่ระหว่างการนำเข้า...</center></h4>
                            </div>


                          <?php }?>