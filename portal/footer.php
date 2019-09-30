<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">
    Copyright  &copy; <?php echo date('Y'); ?> <a class="text-bold-800 grey darken-2" 
    href="https://" 
    target="_blank">GLORIOUS EMPIRE TECHNOLOGIES </a>, All rights reserved. </span>
      </p>
</footer>

    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../app-assets/vendors/js/charts/raphael-min.js"></script>
    <script src="../app-assets/vendors/js/charts/morris.min.js"></script>
    <script src="../app-assets/vendors/js/extensions/unslider-min.js"></script>
    <script src="../app-assets/vendors/js/timeline/horizontal-timeline.js"></script>
    <script src="../app-assets/js/core/app-menu.min.js"></script>
    <script src="../app-assets/js/core/app.min.js"></script>
    <script src="../app-assets/js/scripts/customizer.min.js"></script>
    <script src="../app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    <script src="../app-assets/js/scripts/tables/datatables/datatable-basic.min.js"></script>
    <script src="../assets/Toast/js/Toast.min.js"></script>

    <script>
      function confirmToDelete(){
          return confirm("Click Okay to Delete Details and Cancel to Stop");
      }
    </script>

    <script>
      function confirmToEdit(){
          return confirm("Click Okay to Edit and Cancel to Stop");
      }
    </script>

    <script>
      function confirmToRestore(){
          return confirm("Click Okay to Restore The Deleted Data and Cancel to Stop");
      }
    </script>
    <script>
      function confirmToProp(){
          return confirm("Click Okay to View The Agent Property and Cancel to Stop");
      }
    </script>

    <script>
      function confirmToDetails(){
          return confirm("Click Okay to View More Details and Cancel to Stop");
      }
    </script>
    <?php 
    if(isset($_SESSION['success'])){
        $message = $_SESSION['success']; ?>
        <script type="text/javascript">
            new Toast({ message: '<p style="color:white"><b><?php echo $message; ?></p></b>', type: 'success' });
        </script><?php 
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['error'])){
        $message = $_SESSION['error'];?>
    
        <script type="text/javascript">
            new Toast({ message: '<p style="color:white"><b><?php echo $message; ?> </b></p>', type: 'danger' });
        </script><?php 
        unset($_SESSION['error']);
    }  ?>
  </body>
</html>