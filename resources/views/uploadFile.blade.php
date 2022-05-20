<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script type="text/javascript" src="upload/js/script.js"></script>

<body>
<div class="upload">
    <form method="post" enctype="multipart/form-data" id="upload-file" action="{{route('upload.file')}}">
        @csrf
        <div class="form-group">
            <input type="file" name="file" placeholder="Choose File" id="file">
            <span class="text-danger"></span>
        </div>
        <button type="submit" class="">Submit</button>
    </form>
</div>
</body>
<script>
    $(document).ready(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#upload-file').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{ route('upload.file')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                    alert('File has been uploaded successfully');
                    console.log(data);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    });
</script>
</head>
</html>

