<div class="modal fade" id="delete_permision_{{ $role['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> هل انت متاكد من حذف الصلاحية </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('admin/role/delete/'.$role['id']) }}" method="post">
                @csrf
                <div class="modal-body">
                    <label for=""> اسم الصلاحية </label>
                    <input type="text" name="name" class="form-control" disabled readonly
                        value="{{ $role['role'] }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> رجوع</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </div>
            </form>
        </div>
    </div>
</div>
