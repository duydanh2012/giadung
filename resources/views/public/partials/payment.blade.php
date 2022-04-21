<div class="row">
  <div class="col-md-4 order-md-2 mb-4">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
      <span class="text-muted">Giỏ hàng của bạn</span>
      <span class="badge badge-secondary bg-warning badge-pill">{{ Cart::getTotalQuantity() }}</span>
    </h4>
    <ul class="list-group mb-3">
      <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
          <h6 class="my-0">Tổng tiền các sản phẩm (1)</h6>
          <small class="text-muted">Tổng số tiền chưa có khuyến mãi</small>
        </div>
        <span class="text-muted" id="totalCart" data-value="{{ Cart::getTotal() }}">{{ number_format(Cart::getTotal(),0,",",".") }}.000 ₫ </span>
      </li>

      <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
          <h6 class="my-0">Phí ship (2)</h6>
        </div>
        <span class="text-muted" id="ship" data-value="19">19.000 ₫ </span>
      </li>

      <li class="list-group-item d-flex justify-content-between bg-light">
        <div class="text-success">
          <h6 class="my-0">Giảm giá (3)</h6>
          <small>Số tiền bạn được giảm</small>
        </div>
        <span class="text-success" id="promotion" data-value="0">0 ₫</span>
      </li>
      <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
          <h4 class="my-0">Tổng tiền <small>(1 + 2 - 3)</small></h4>
          <small>Số tiền bạn phải thanh toán</small>
        </div>
        <span class="text-muted" id="total"></span>
      </li>
    </ul>

    <form class="card p-2">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Mã Khuyến Mãi">
        <div class="input-group-append float-right mt-3">
          <a href="javascript:void(0)" class="btn btn-warning applyPromotion ">Áp dụng</a>
        </div>
      </div>
    </form>
  </div>

  <div class="col-md-8 order-md-1">
    <h4 class="mb-3">Thông tin thanh toán</h4>
    <form class="needs-validation" action="{{ route('public.postPayment') }}" method="post">
      @csrf
      <input type="hidden" id="formTotal" name="total" value="">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="firstName">Họ tên</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" value="{{ $data->name ? $data->name : null }}" required>
          <div class="invalid-feedback">
            Giá trị họ tên không được để trống.
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="lastName">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="{{ $data->email ? $data->email : null }}" required>
          <div class="invalid-feedback">
            Email không được để trống.
          </div>
        </div>
      </div>


      <div class="mb-3">
        <label for="address">Địa chỉ nhận hàng</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Đường ABC" value="{{ $data->address ? $data->address : null }}" required >
        <div class="invalid-feedback">
          Vui lòng nhập địa chỉ nhận hàng.
        </div>
      </div>

      <div class="mb-3">
        <label for="address">Số điện thoại</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="0123456789" value="{{ $data->phone ? $data->phone : null }}" required >
        <div class="invalid-feedback">
          Vui lòng nhập số điện thoại.
        </div>
      </div>

      <hr class="mb-4">

      <h4 class="mb-3">Hình thức thanh toán</h4>

      <div class="d-block my-3">
        <div class="custom-control custom-radio">
          <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="postpaid" checked="" required="">
          <label class="custom-control-label" for="credit">Thanh toán trả sau</label>
        </div>
        <div class="custom-control custom-radio">
          <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="postpaid" disabled required="">
          <label class="custom-control-label" for="debit">Thanh toán ngay</label>
        </div>
      </div>

      <hr class="mb-4">
      <button class="btn btn-primary btn-lg btn-block" type="submit">Hoàn tất thanh toán</button>
    </form>
  </div>
</div>
