<div class="row mb-50">
    <div class="col-lg-6 col-md-12">
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="border p-md-4 p-30 border-radius cart-totals">
            <div class="heading_s1 mb-3">
                <h4>Cart Totals</h4>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="cart_total_label">Cart Subtotal</td>
                            <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">${{auth()->user()->order_price()}}</span></td>
                        </tr>
                        <tr>
                            <td class="cart_total_label">Shipping</td>
                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                        </tr>
                        <tr>
                            <td class="cart_total_label">Total</td>
                            <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">${{auth()->user()->order_price()}}</span></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="{{route('checkout')}}" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
        </div>
    </div>
</div>