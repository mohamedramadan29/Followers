    <!-- Modal -->
    <div class="modal fade" id="order_rating_{{ $order['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel" style="text-align: center;width:100%"> قيم تجربتك
                        لهذة الخدمة </h1>
                </div>
                <div class="modal-body">
                    <form action="{{ route('order.review', $order->id) }}" method="POST">
                        @csrf
                        <div class="mb-3 text-center">
                            <div class="star-rating" style="background-color:#fff !important">
                                <input type="radio" {{ old('rating') == 5 ? 'checked' : '' }} name="rating"
                                    id="rating-5" value="5"><label for="rating-5">★</label>
                                <input type="radio" {{ old('rating') == 4 ? 'checked' : '' }} name="rating"
                                    id="rating-4" value="4"><label for="rating-4">★</label>
                                <input type="radio" {{ old('rating') == 3 ? 'checked' : '' }} name="rating"
                                    id="rating-3" value="3"><label for="rating-3">★</label>
                                <input type="radio" {{ old('rating') == 2 ? 'checked' : '' }} name="rating"
                                    id="rating-2" value="2"><label for="rating-2">★</label>
                                <input type="radio" {{ old('rating') == 1 ? 'checked' : '' }} name="rating"
                                    id="rating-1" value="1"><label for="rating-1">★</label>
                            </div>
                            <style>
                                .star-rating {
                                    direction: rtl;
                                    display: inline-flex;
                                    gap: 5px;
                                }
                                .star-rating input {
                                    display: none;
                                }
                                .star-rating label {
                                    font-size: 24px;
                                    color: #ddd;
                                    cursor: pointer;
                                }
                                .star-rating input:checked~label,
                                .star-rating label:hover,
                                .star-rating label:hover~label {
                                    color: #ffbf00;
                                }
                            </style>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"> رسالتك </label>
                            <textarea style="height: 140px" name="content" id="" class="form-control" placeholder=" اكتب رسالتك هنا ... "></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> ارسال التقيم </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> رجوع </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
