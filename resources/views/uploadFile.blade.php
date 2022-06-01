<!DOCTYPE html>
<html>
<head>
    <title>File Uploading</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-2 mb-2">File Uploading </h1>
            <form action="{{ route('store') }}" method="post" enctype="multipart/form-data" id="my-awesome-dropzone"
                  class="dropzone">
                @csrf
                <div>
                    <h3>Upload</h3>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    var listAddedFiles =  {!! json_encode($files->toArray()) !!};
    console.log(listAddedFiles);
    Dropzone.options.myAwesomeDropzone = {
        maxFilesize: 10,
        acceptedFiles: ".mp4,.mp3",
        addRemoveLinks: true,
        removedfile: function (file) {
            var name = file.upload.filename;
            console.log(name);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: 'ajax/delete',
                data: {filename: name},
                success: function (data) {
                    console.log("File has been successfully removed!!");
                },
                error: function (e) {
                    console.log(e);
                }
            });
            var fileRef;
            return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },

        init: function () {
            let mydropzone = this;
            listAddedFiles.forEach(item => {
                console.log(item);
                let mockFile = { name: item.name, ext: item.type, size: item.size, path: item.path };
                console.log(mydropzone);
                mydropzone.emit("addedfile", mockFile);
                mydropzone.emit("thumbnail", mockFile, 'https://cdn.sstatic.net/Img/teams/teams-illo-free-sidebar-promo.svg?v=47faa659a05e');
                mydropzone.emit("complete", mockFile);
            })

        },

        success: function (file, response) {
            console.log(response);
        },
        error: function (file, response) {
            return false;
        }
    };


</script>

</body>
</html>
