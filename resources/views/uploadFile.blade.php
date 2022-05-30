<!DOCTYPE html>
<html>
<head>
    <title>File Uploading</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-2 mb-2">File Uploading </h1>
            <form action="{{ route('store') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
                @csrf
                <div>
                    <h3>Upload</h3>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
        Dropzone.options.imageUpload = {
            maxFilesize: 2,
            acceptedFiles: ".mp4,.mp3,.doc,.docx,.png"
        };

</script>

</body>
</html>
