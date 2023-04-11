<?php 
 
$query_my_order = "SELECT o.* ,m.mem_name, c.*
FROM tbl_order as o
INNER JOIN tbl_member as m ON o.mem_id=m.mem_id
LEFT JOIN tbl_customer AS c ON c.c_id=o.c_id
WHERE o.order_status=4
ORDER BY o.order_id DESC
"  
or die
("Error : ".mysqlierror($query_my_order));
$rs_my_order = mysqli_query($condb, $query_my_order);
//echo ($query_my_order);//test query




?>



<table id="example1" class="table table-bordered  table-hover table-striped">
  <thead>
    <tr class="danger">
      <th width="7%"><center>ลำดับ</center></th>
      <th width="30%">รายละเอียด</th>
      <th width="10%">สถานะ</th>
      
      <th width="10%">วันที่</th>
      <th width="10%">จัดการ</th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rs_my_order as $rs_order) { ?>
     
    
    <tr>

     <td><?php echo $rs_order['order_id']; ?></td>
     <td>
      ชื่อ ผู้ทำรายการขาย : <?php echo $rs_order['mem_name']; ?> <br>
      ชื่อผู้ซื้อสินค้า : <?php echo $rs_order['c_name']; ?> <hr>
      <?php
        $order_id = $rs_order['order_id'];
        $query_pp = "SELECT * FROM tbl_order_detail AS d
                    LEFT JOIN tbl_product AS p ON p.p_id=d.p_id
                    WHERE d.order_id = $order_id 
                    
                    "
        or die
        ("Error : ".mysqlierror($query_pp));
        $rs_pp = mysqli_query($condb, $query_pp);
      ?>
      รายละเอียด <br>
      <?php foreach ($rs_pp as $rs_pro) {?>
       <?php echo $num+=1;?> ) ชื่อสินค้า : <?php echo $rs_pro['p_name'];?> (ข.ย. <?php echo $rs_pro['p_license'];?>) | จำนวน : <?php echo $rs_pro['p_c_qty'];?> | ราคาต่อชิ้น : <?php echo $rs_pro['p_price'];?> | ราคารวม : <?php echo $rs_pro['total'];?>  บาท <br>
      <?php }?>
      <hr>
        <p align="right">ยอดที่ต้องชำระรวม = <?php echo $rs_order['pay_amount'];?> บาท <br>
        ยอดที่ชำระ = <?php echo $rs_order['pay_amount2'];?> บาท <br>
        <?php $pay_amount3 = $rs_order['pay_amount2']-$rs_order['pay_amount']; ?>
        เงินทอน = <?php echo $pay_amount3; ?> บาท
        </p>
     </td>

     <td>

      <?php $st= $rs_order['order_status']; 
            include('mystatus.php');
      ?>
       

     </td>
     
     <td><?php echo substr($rs_order['order_date'],8,2)." ". $thaimonth[substr($rs_order['order_date'],5,2)-1]." ".substr(substr($rs_order['order_date'],0,4)+543,0,4)." ".date('H:i:s',strtotime($rs_order['order_date'])); ?></td>
     <td>

      <a href="index.php?order_id=<?php echo $rs_order['order_id'];?>&act=view" target="_blank" class="btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> เปิดดูรายการ</a>



       


     </td>
     
    </tr>

  <?php }?>
  </tbody>
</table>