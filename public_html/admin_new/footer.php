</div>
<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; 2019 - developed by
              <b><a href="http://technicalpointsolution.com" target="_blank">TPS</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 <!-- Modal Scrollable -->
          <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                      aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 
                </div>
              </div>
            </div>
          </div>





  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>  
  <script src="js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });

    //get info of career
    $(document).on('click','a#careerinfo',function(){
        var id= $(this).data('id');
        $('.modal-body').html('<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>    </div>');
        $(".modal-title").text('Career Data Info')
        $.post('career-info.php',{id},function(data){
            $('.modal-body').html(data);
        })
    });

     //get info of member
    $(document).on('click','a#memberinfo',function(){
        var id= $(this).data('id');
        $('.modal-body').html('<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>    </div>');
        $(".modal-title").text('Career Data Info')
        $.post('member-info.php',{id},function(data){
            $('.modal-body').html(data);
        })
    });
    //get info of booking
    $(document).on('click','a#bookinginfo',function(){
        var id= $(this).data('id');
        $('.modal-body').html('<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>    </div>');
        $(".modal-title").text('Career Data Info')
        $.post('booking-info.php',{id},function(data){
            $('.modal-body').html(data);
        })
    });

     //get info of booking
    $(document).on('click','a#confirmbooking',function(){
        var id= $(this).data('id');
      
        $.post('confirm-booking.php',{id},function(data){
            if (parseInt(data)==1) {
              alert('Booking Successfully Accepted');
              window.location.reload(true);
            }else{
              alert('Something Went Wrong Try again');
            }
        })
    });
    
    //activate member
    $(document).on('click','a.activate',function(){
        var id= $(this).data('id');
      
        $.post('confirm-member.php',{id},function(data){
            if (parseInt(data)==1) {
              alert('Activate Successfully Done');
              window.location.reload(true);
            }else{
              alert('Something Went Wrong Try again');
            }
        })
        //alert(id);
    });
    //activate member
    $(document).on('click','a.inactive',function(){
        var inactive_id= $(this).data('id');
      
        $.post('confirm-member.php',{inactive_id},function(data){
            if (parseInt(data)==1) {
              alert('InActivate Successfully Done');
              window.location.reload(true);
            }else{
              alert('Something Went Wrong Try again');
            }
        })
        //alert(inactive_id);
    });
  </script>
</body>

</html>