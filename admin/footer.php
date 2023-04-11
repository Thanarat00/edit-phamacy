</div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->



<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Select2 -->
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../assets/plugins/bootstrap-tagsinput/tagsinput.js?v=1"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script src="../assets/dist/js/adminlte.min.js"></script>

<!-- AdminLTE App -->
<script src="../assets/dist/js/demo.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script> -->
<!-- http://fordev22.com/ -->


<?php if(isset($_GET['save_ok'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'บันทึกคำสั่งซื้อสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>



<?php if(isset($_GET['mem_add'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'เพิ่มสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>

<?php if(isset($_GET['mem_edit'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'แก้ไขสำเร็จ | <?php echo $row['mem_name'];?>',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>


<?php if(isset($_GET['mem_del'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'ลบข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>


<?php if(isset($_GET['type_add'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'เพิ่มมูลประเภทสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>


<?php if(isset($_GET['type_edit'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'แก้ไขมูลประเภทสำเร็จ | <?php echo $row['t_name'];?>',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>


<?php if(isset($_GET['type_del'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'ลบข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>



<?php if(isset($_GET['brand_add'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'เพิ่มมูลหมวดหมู่สำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>


<?php if(isset($_GET['brand_edit'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'แก้ไขหมวดหมู่สำเร็จ | <?php echo $row['b_name'];?>',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>


<?php if(isset($_GET['brand_del'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'ลบข้อมูลสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>



<?php if(isset($_GET['product_add'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'เพิ่มมูลสินค้าสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>


<?php if(isset($_GET['product_edit'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'แก้ไขสิน้าสำเร็จ | <?php echo $row['p_name'];?>',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>


<?php if(isset($_GET['product_del'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'ลบข้อมูลสิน้าสำเร็จ',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>




<?php if(isset($_GET['mem_editp'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'Edit Profile | <?php echo $row['mem_name'];?>',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>


<script>
  $(document).ready(function () {
    //$('.sidebar-menu').tree();
    //$('.select2').select2();
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })
  })
</script>

<script>
$(function() {

    // cb(start, end);
    // $('#createContactModal').modal('show')
    $('#example1').DataTable({
        "order": [
            [0, "desc"]
        ],
        "lengthMenu": [
            [10 ,25, 50, -1],
            [10 ,25, 50, "All"]
        ],

    });

    

});
</script>


