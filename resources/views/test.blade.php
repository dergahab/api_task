<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('article')}}" method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                          <label for="">Description</label>
                          <input type="text" name="description" id="description" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                          <label for="">Type</label>
                          <select name="type" id="type" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                          <small id="helpId" class="text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Help text</small>
                          </div>
                          <button type="submit" id="save" class="btn btn-primary btn-lg btn-block">Save</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $('#save').click(function (e) { 
        e.preventDefault();
        // var fd = new FormData();
        // let fs = $('#image')[0].files
        // fd.append('file',files[0]);
        let data = {
            token: "{{csrf_token()}}",
            name: $("#name").val(),
            description: $("#description").val(),
            type: $("name").val(),
        }

        $.post("{{url('api.article')}}", data,
            function (response) {
                console.log(response);
            });
    });
</script>