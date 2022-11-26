<?php 
    include 'Views\backend\inc\header.php'; 
    include 'Views\backend\inc\navbar.php';
    include 'Views\backend\inc\sidebar.php';
    require_once "Views\backend\\${controller}\\${page}.php";
    include 'Views\backend\inc\footer.php'; 
    include 'Views\backend\inc\scriptJS.php';
?>
<?php if(isset($isSuccess) && $isSuccess == true){ ?>
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: 'Thêm thành công'
        })
    </script>        
<?php }?>

            <!-- else <script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href="">Why do I have this issue?</a>'
                })
            </script>    