<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit car</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <h1 class="ms-2">Edit car</h1>
<div class="d-flex justify-content-around">
    <div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error) 
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

    <form action="{{ route('cars.update', $car->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row m-2">
                <label class="col-2 col-form-label" for="owner_id">Owner id</label>
                <div class="col-5">
                    <input class="form-control" list="owners_list" id="owner_id" name="owner_id" value="{{ $owner->id }}" placeholder="Type to search...">
                    <datalist id="owners_list">
                        @echo '$possible_owners'
                        @foreach($possible_owners as $owner)
                        <option value="{{ $owner->id }}">{{ $owner->name}}, {{ $owner->surname }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>

            <div class="row m-2">
                <label class="col-2 col-form-label">Registration number</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="reg_number" placeholder="Reg. number" value="{{ $car->reg_number}}" autocomplete="off" required>
                </div>
            </div>

            <div class="row m-2">
                <label class="col-2 col-form-label">Brand</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="brand" placeholder="Car brand" value="{{ $car->brand}}" autocomplete="off" required>
                </div>
            </div>

            <div class="row m-2">
                <label class="col-2 col-form-label">Model</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="model"  placeholder="Car model" value="{{ $car->model}}" autocomplete="off" required>
                </div>
            </div>
        <div class="m-3 mt-4">
            <button type="button" class="btn btn-danger" onclick="window.location.href='/cars';">Close</button>
            <button type="submit" class="btn btn-success">Save changes</button>
        </div>
    </form>
    </div>
    <div>
        <h3>Current owner info</h3>
        <p>ID: {{ $car->owner->id }}</p>
        <p>Name: {{ $car->owner->name }}</p>
        <p>Surname: {{ $car->owner->surname }}</p>
    </div>    


</div>

</body>
</html>