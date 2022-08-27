<div class="modal fade modal-fullscreen" data-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- <div class="modal-header text-center bg-dark text-light">
                <h5 class="modal-title text-light" id="exampleModalLabel">Insert Product</h5>
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"> X </button>
            </div> -->
            <div class="modal-body" id="productInsert">
                <!-- Shopping Cart -->
                <div class="d-flex align-items-center justify-content-end">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"> X </button>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 viewModalcartTableDiv">
                            <!-- Shopping Summery -->
                            <table class="table shopping-summery">
                                <thead>
                                    <tr class="main-hading">
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                                    </tr>
                                </thead>
                                <tbody id="cartShowTable">
                                </tbody>
                            </table>
                            <!--/ End Shopping Summery -->
                        </div>

                        <div class="col-lg-3 col-md-7 col-12">
                            <div class="checkout">
                                <div class="top">
                                    <div class="coupon">
                                        <form id="cuponApplyForm">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control cartCuponInsertField" placeholder="Cupon insert">
                                                <div class="input-group-append">
                                                    <button class="btn cartCuponcontinueBtn two" type="button">Apply</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <ul>
                                        <li class="mb-2">
                                            <div class="d-flex align-items-center justify-content-lg-between">
                                                <a class="locationToggleBrn" href="#" data-test='0'>Access point</a>
                                                <p class="locationToggleBrn" href="#" data-test='0' style="cursor:pointer ;">
                                                    <i class="fas fa-solid fa-angle-down"></i>
                                                </p>
                                            </div>
                                            <div class="collapse locationToggle" id="collapseExample">
                                                <div class="gif" style="display: none;">
                                                    <img src="./Asset/image/3.gif">
                                                </div>
                                                <div class="contentLoactionShow text-black"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center justify-content-lg-between">
                                                <p>Total Products </p>
                                                <p class="totalProductInCheckout">0</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center justify-content-lg-between">
                                                <p>Subtotal </p>
                                                <p>$&nbsp;<span class="totalSubPriceInCheckout">0.00</span></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center justify-content-lg-between">
                                                <p>Shipping Charge </p>
                                                <p>$&nbsp;<span class="totalSchargeInCheckout">0.00</span></p>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="d-flex align-items-center justify-content-lg-between">
                                                <p>Cupon Discount </p>
                                                <p>$&nbsp;<span class="totalDiscountInCheckout">0.00</span></p>
                                            </div>
                                        </li>

                                        <li class="mt-4">
                                            <div class="d-flex align-items-center justify-content-lg-between">
                                                <p><strong>Total</strong></p>
                                                <p>$&nbsp;<strong><span class="totalPriceInCheckout">0.00</span></strong></p>
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="btn-group w-100">
                                        <button type="button" class="btn cartCheckoutcontinueBtn one">Checkout</button>
                                        <button type="button" class="btn cartCheckoutcontinueBtn two">Shoping Continue</button>
                                    </div>
                                </div>
                                <div class="checkoutBottom">
                                    <div class="loader">
                                        <div class="logo">
                                            <div class="white"></div>
                                            <div class="orange"></div>
                                            <div class="red"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--/ End Shopping Cart -->
            </div>
        </div>
    </div>
</div>