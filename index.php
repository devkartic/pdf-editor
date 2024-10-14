<html>
<head>
    <meta charset="utf-8" />
    <script src="https://unpkg.com/pdf-lib@1.11.0"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<p>Click the button to fill form fields in an existing PDF document with <code>pdf-lib</code></p>
<button onclick="fillForm()">Fill PDF</button>
<p class="small">(Your browser will download the resulting file)</p>
</body>

<script>
    const { PDFDocument } = PDFLib
    var { fs } = fs;
    async function fillForm() {
        // Fetch the PDF with form fields
        const formUrl = './example.pdf'
        const formPdfBytes = await fs.read(formUrl).then(res => res.arrayBuffer())

        // Load a PDF with form fields
        const pdfDoc = await PDFDocument.load(formPdfBytes)

        // Get the form containing all the fields
        const form = pdfDoc.getForm()


        // Serialize the PDFDocument to bytes (a Uint8Array)
        const pdfBytes = await pdfDoc.save()

        // Trigger the browser to download the PDF document
        download(pdfBytes, "example.pdf", "application/pdf");
    }
</script>
</html>