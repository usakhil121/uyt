<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 11 CRUD Application - ItSolutionStuff.com</title>
    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    
<style type="text/css">
  
  body{
    /* background: #F8F9FA; */
  }
</style>
</head>
<body>
<div class="container">
    @yield('content')
</div>
<!-- Optional footer content -->
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const successAlert = document.getElementById('successAlert');

        // Automatically fade away after 5 seconds
        if (successAlert) {
            setTimeout(() => {
                successAlert.classList.remove('show');
                setTimeout(() => {
                    successAlert.remove();
                }, 150); // Match this with the CSS transition duration
            }, 5000); // 5 seconds timeout

            // Handle the manual dismissal
            const closeAlertButton = successAlert.querySelector('.btn-close');
            closeAlertButton.addEventListener('click', (event) => {
                successAlert.classList.remove('show');
                setTimeout(() => {
                    successAlert.remove();
                }, 150); // Match this with the CSS transition duration
            });
        }
    });
</script>
</body>
</html>

