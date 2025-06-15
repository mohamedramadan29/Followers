<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">اضافة مصروف جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/expense/add') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label"> الاسم</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label"> المبلغ </label>
                        <input type="number" step="0.01" name="amount" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"> اضافــة </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> الغاء </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
