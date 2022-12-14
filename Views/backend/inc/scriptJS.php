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
        today: "H??m nay",
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
    //n???u s??? d???ng $('.btn-del').click(function(e){/**code */}) th??
    // sau khi reload data ta s??? k click l???i button ???????c 
    $('body').on('click','.btn-del',function (e){
      e.preventDefault();
      var id = $(this).val();
      Swal.fire({
          title: 'B???n c?? ch???c ch???n mu???n x??a sinh vi??n n??y?',
          text: "H??nh ?????ng n??y c?? th??? x??a m???t sinh vi??n ra kh???i danh s??ch hi???n t???i!",
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
                  // reload data s??? d???ng ajax
                  $('#table_student').load(location.href+ ' #table_student');                  
                  Swal.fire(
                    '???? x??a th??nh c??ng!',
                    'Your file has been deleted.',
                    'success'
                  )
                  
                }else if(res == 500){
                  swal("oops","C?? l???i khi x??a!","error");
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
                    '???? kh??i ph???c th??nh c??ng!',
                    'A student in list deleted has been restored.',
                    'success'
            )
          }else if(res == 500){
                  swal("oops","C?? l???i khi x??a!","error");
          }
        }
      })
    });
  });
  
</script>
<script>
  // preview avatar in my profile
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>