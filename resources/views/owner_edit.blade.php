<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit owner</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <h1 class="ms-2">Edit owner</h1>

    @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error) 
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

    <form action="/owner/edit/{{$owner->id}}" method="post">
                @csrf
                <div class="row m-2">
                    <label class="col-2 col-form-label">Name</label>
                    <div class="col-2">
                        <input type="text" class="form-control" name="owner_name" placeholder="Your name" value="{{$owner->name}}" autocomplete="off" required>
                    </div>
                </div>

                <div class="row m-2">
                    <label class="col-2 col-form-label">Surname</label>
                    <div class="col-2">
                        <input type="text" class="form-control" name="owner_surname" placeholder="Your surname" value="{{$owner->surname}}" autocomplete="off" required>
                    </div>
                </div>  
        </div>
        <div class="m-3 mt-4">
            <button type="button" class="btn btn-danger" onclick="window.location.href='/';">Close</button>
            <button type="submit" class="btn btn-success">Save changes</button>
        </div>
    </form>
</body>
</html>