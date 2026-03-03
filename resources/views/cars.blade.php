<div class="modal fade" id="CarModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Adding car</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            const modalElement = document.getElementById('CarModal');
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
            });
        </script>
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error) 
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form action="/cars" method="post">
            @csrf
            <div class="row m-2">
                <label class="col-2 col-form-label" for="owner_id">Owner id</label>
                <div class="col-5">
                    <input class="form-control" list="owners_list" id="owner_id" name="owner_id" placeholder="Type to search...">
                    <datalist id="owners_list">
                        @foreach($possible_owners as $possible_owner)
                        <option value="{{ $possible_owner->id }}">{{ $possible_owner->name}}, {{ $possible_owner->surname }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>

            <div class="row m-2">
                <label class="col-2 col-form-label">Registration number</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="reg_number" placeholder="Reg. number" autocomplete="off" required>
                </div>
            </div>

            <div class="row m-2">
                <label class="col-2 col-form-label">Brand</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="brand" placeholder="Car brand" autocomplete="off" required>
                </div>
            </div>

            <div class="row m-2">
                <label class="col-2 col-form-label">Model</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="model"  placeholder="Car model" autocomplete="off" required>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

@include('layouts.app')

<h1 class="text-center">Cars</h1>
    <div class="mt-2 ms-4">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#CarModal" alt="">Add Car</button>
        <table class="table table-hover text-center border border-light border-4" style="width: 79%;">
            <thead class="table-info">
                <tr>
                    <th>ID</th>
                    <th>Owner</th>
                    <th>Registration number</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->owner_id }} - {{ $car->owner->name }} {{ $car->owner->surname }}</td>
                    <td>{{ $car->reg_number }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td class="d-flex" style="height: 50px;">
                        <a class="me-1 btn btn-warning" href="/cars/{{$car->id}}/edit"><i class="fa-solid fa-pen"></i>Edit</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="table-primary">
                <tr>
                    <td colspan="10"></td>
                </tr>
            </tfoot>
        </table>

    </div>

