<div class="modal fade" id="add_balance_{{$user['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> اضافة رصيد الي المستخدم   </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('admin/user/addbalance/'.$user['id'])}}" method="post">
                @csrf
                <div class="modal-body">
                    <label for="">  الرصيد  </label>
                    <input type="number" step="any" name="balance" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> رجوع</button>
                    <button type="submit" class="btn btn-primary"> اضافة  </button>
                </div>
            </form>
        </div>
    </div>
</div>
