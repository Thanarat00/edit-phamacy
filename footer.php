<!--start  footer -->

</br>
  
    <!--end  footer -->
  </body>
</html>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="template/js/jquery-3.3.1.slim.min.js"></script> -->
<script src="template/js/popper.min.js"></script>
<script src="template/js/bootstrap.min.js"></script>

<?php if(isset($_GET['mem_edit'])){ ?>
<script>
  Swal.fire({
  title: 'สำเร็จ',
  text: 'Edit Profile | <?php echo $row['mem_name'];?>',
  icon: 'success',
  confirmButtonText: 'ตกลง'
})
</script>
<?php } ?>