<div class="modal fade" id="OwnerModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Adding owner</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            const modalElement = document.getElementById('OwnerModal');
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
        
        <form action="/owners/add" method="post">
            @csrf
            <div class="row m-2">
                <label class="col-2 col-form-label">Name</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="owner_name"  placeholder="Your name" autocomplete="off" required>
                </div>
            </div>

            <div class="row m-2">
                <label class="col-2 col-form-label">Surname</label>
                <div class="col-5">
                    <input type="text" class="form-control" name="owner_surname"  placeholder="Your surname" autocomplete="off" required>
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

<div class="mt-2">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#OwnerModal" alt="">Add Owner</button>
</div>


<table class="table table-hover text-center ms-3 border border-light border-4" style="width: 79%;">
        <thead class="table-info">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($owners as $owner)
            <tr>
                <td>{{ $owner->id }}</td>
                <td>{{ $owner->name }}</td>
                <td>{{ $owner->surname }}</td>
                <td class="text-end">
                    <a class="me-1 text-warning" href="/owner/edit/{{$owner->id}}"><i class="fa-solid fa-pen"></i>Edit</a>
                    <a class="text-danger"href="/owner/delete/{{$owner->id}}" onclick="return confirm('Confirm deletion?')"><i class="fa-solid fa-trash"></i>Delete</a>
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
