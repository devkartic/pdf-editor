<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF Editor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="card text-center">
        <div class="card-header">
            <h3 class="text-center">PDF Editor</h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">Click the button to flatten form fields of an existing PDF document with <code>pdf-lib</code></h5>
            <div class="my-3">
                <button class="btn btn-sm btn-outline-primary" onclick="flattenForm()">Flatten PDF Form</button>
            </div>
            <p class="small">(Your browser will download the resulting file)</p>
        </div>
    </div>
</div>


<script>
    const { PDFDocument } = 'pdf-lib';

    async function flattenForm() {
        const formUrl = './example2.pdf';

        const formPdfBytes = await fetch(formUrl).then(res => res.arrayBuffer());

        const pdfDoc = await PDFDocument.load(formPdfBytes);

        const form = pdfDoc.getForm();

        console.log(form);

        form.flatten();

        const pdfBytes = await pdfDoc.save();
    }
</script>
</body>
</html>