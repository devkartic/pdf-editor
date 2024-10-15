<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF Editor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://unpkg.com/pdf-lib@1.14.0"></script>
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
            <p class="small mb-3">(Your browser will download the resulting file)</p>
            <h3 class="text-center">Download Edited PDF <button class="btn btn-sm btn-outline-primary" onclick="downloadEditedPDF()">Flatten PDF Form</button></h3>
            <div class="">
                <iframe src="./advancedpsy-form-2.pdf" width="100%" height="600px"></iframe>
            </div>
        </div>
    </div>
</div>


<script>
    const { PDFDocument } = PDFLib;

    async function flattenForm() {
        const formUrl = './example.pdf';

        const formPdfBytes = await fetch(formUrl).then(res => res.arrayBuffer());

        const pdfDoc = await PDFDocument.load(formPdfBytes);

        const form = pdfDoc.getForm();

        const fields = form.getFields();

        const fieldsArray = {} ;
        fields.forEach(field => {
            // const type = field.constructor.name;
            const name = field.getName();
            const value = field.getName(name);
            console.log(`${name}: ${value}`);
            // fieldsArray[name] = type;
        })

        console.log(fieldsArray);

        console.log(form);

        form.flatten();

        const pdfBytes = await pdfDoc.save();
    }
</script>

<script>
    function downloadEditedPDF() {
        const iframe = this;
        const data = iframe.contentWindow;
        console.log(data);
    }
</script>

</body>
</html>