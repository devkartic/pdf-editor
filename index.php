<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF Editor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
    <div class="card text-center">
        <div class="card-header">
            <h3 class="text-center">PDF Editor</h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">PDF editor <code>iFrame</code></h5>
            <h3 class="text-center">Download Edited PDF <button class="btn btn-sm btn-outline-primary download-pdf">Flatten PDF Form</button></h3>
            <div class="">
                <iframe id="iframePDF" src="./advancedpsy-form-2.pdf" width="100%" height="600px"></iframe>
            </div>
            <div class="duplicate"></div>
        </div>
    </div>
</div>

<script>
    $('.download-pdf').on('click', function (e){
        e.preventDefault();
        const contentPDF = document.getElementById('iframePDF').contentWindow.document.documentElement.innerHTML;
        // console.log(contentPDF);
        // $('.duplicate').html(contentPDF);
        // return;
        // Send the iframe content to the server via AJAX
        $.ajax({
            url: 'apply.php',  // The PHP file that will handle the request
            method: 'POST',
            data: {
                iframe_content: contentPDF  // Send the content of the iframe
            },
            dataType: 'html',
            success: function(response) {
                console.log('Server Response: ', response);  // Log server response
            },
            error: function(xhr, status, error) {
                console.error('Error: ', error);
            }
        });
    })
</script>

</body>
</html>