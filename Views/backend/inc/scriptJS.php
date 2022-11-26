<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="public/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/assets/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="public/assets/plugins/jszip/jszip.min.js"></script>
<script src="public/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="public/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="public/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="public/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="public/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.9/dist/sweetalert2.all.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $.fn.datepicker.dates['en'] = {
        days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
        months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        monthsShort: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"],
        today: "Hôm nay",
        clear: "Clear",
        // format: "mm/dd/yyyy",
        titleFormat: "mm yyyy", /* Leverages same syntax as 'format' */
        weekStart: 0
    };   
    $('.datepicker').datepicker({
            language: "es",
            autoclose: true,
            format: "dd-mm-yyyy",
            orientation: 'bottom',
            monthsShort: ["Jan", "02", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    }); 
    /** show message when perform action delete a record */
    //nếu sử dụng $('.btn-del').click(function(e){/**code */}) thì
    // sau khi reload data ta sẽ k click lại button được 
    $('body').on('click','.btn-del',function (e){
      e.preventDefault();
      var id = $(this).val();
      Swal.fire({
          title: 'Bạn có chắc chắn muốn xóa sinh viên này?',
          text: "Hành động này có thể xóa một sinh viên ra khỏi danh sách hiện tại!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              method:"POST",
              url:"student/delStudent/"+id,
              success:function(res){
                if(res == 200){
                  // reload data sử dụng ajax
                  $('#table_student').load(location.href+ ' #table_student');                  
                  Swal.fire(
                    'Đã xóa thành công!',
                    'Your file has been deleted.',
                    'success'
                  )
                  
                }else if(res == 500){
                  swal("oops","Có lỗi khi xóa!","error");
                }
              }
            })
            
        }
      })
    });
    $('body').on('click','.btn-restore',function(e){

      e.preventDefault();
      var id = $(this).val();
      $.ajax({
        method:"POST",
        url:"student/restore/"+id,
        success:function(res){
          if(res==200){
            $('#table_student').load(location.href+ ' #table_student');  
            Swal.fire(
                    'Đã khôi phục thành công!',
                    'A student in list deleted has been restored.',
                    'success'
            )
          }else if(res == 500){
                  swal("oops","Có lỗi khi xóa!","error");
          }
        }
      })
    });
  });
  
</script>