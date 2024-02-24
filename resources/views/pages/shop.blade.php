@extends('welcome')
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shop List</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by
                    price</span></h5>
            <div class="bg-light p-4 mb-30">
                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                    <input class="test" style="position: absolute; left:0;" data-value="duoi-1-trieu" data-id="0"
                        type="checkbox" id="price-4">
                    <label style=" margin-top: 8px" for="price-4">Under 1 million VNĐ</label>
                </div>
                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-1">
                    <input class="test" style="position: absolute; left:0;" data-value="tu-1-5-trieu" data-id="0"
                        type="checkbox" id="price-1">
                    <label style="margin-top: 8px" for="price-1">1 million VNĐ - 5 million VNĐ</label>
                </div>
                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                    <input class="test" style="position: absolute; left:0;" data-value="tu-5-10-trieu" data-id="0"
                        type="checkbox" id="price-2">
                    <label style="margin-top: 8px" for="price-2">5 million VNĐ - 10 million VNĐ</label>
                </div>
                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                    <input class="test" style="position: absolute; left:0;" data-value="tu-10-15-trieu" data-id="0"
                        type="checkbox" id="price-3">
                    <label style="margin-top: 8px" for="price-3">10 million VNĐ - 15 million VNĐ</label>
                </div>
                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                    <input class="test" style="position: absolute; left:0;" data-value="tren-15-trieu" data-id="0"
                        type="checkbox" id="price-5">
                    <label style="margin-top: 8px" for="price-5">Trên 15 million VNĐ</label>
                </div>
            </div>
            <!-- Price End -->

            <!-- Color Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by
                    category</span></h5>
            <div class="bg-light p-4 mb-30">
                <?php
                        use Illuminate\Support\Facades\DB;
                        use Illuminate\Support\Facades\Session;

                        $data = DB::table('tbl_category_product')->where('category_status', [1])->get();
                        $cart_id = Session::get('cat_id');

                    ?>
                @foreach($data as $key)
                <div id="parentCateId"
                    class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                    <input type="checkbox" style="position: absolute; left:0;" value="{{ $key->category_id }}"
                        id="{{ $key->category_id }}" class="cateId">
                    <label style="margin-top: 8px" for="{{ $key->category_id }}">{{ $key->category_name }}</label>
                </div>
                @endforeach
            </div>
            <!-- Color End -->
        </div>
        <!-- Shop Sidebar End -->

        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                        <div class="ml-2">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                    data-toggle="dropdown">Sorting</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                            <div class="btn-group ml-2">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle"
                                    data-toggle="dropdown">Showing</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">20</a>
                                    <a class="dropdown-item" href="#">30</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display: flex; flex-wrap: wrap;" class="test">
                    @foreach($products as $key)
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100"
                                    src="{{ asset('FE/images/' . $key->product_image) }}" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square"
                                        href="{{ URL::to('/cart/' . $key->product_id) }}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square"
                                        href="{{ URL::to('/detail/' . $key->product_id) }}"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">{{ $key->product_name }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{ number_format($key-> product_price, 3, ",") }} VNĐ</h5>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            {{ $products->links( "pagination::bootstrap-4") }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->

    </div>
</div>
<!-- Shop End -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$('.cateId').click(function() {
    var category = [];
    $('.cateId').each(function() {
        if ($(this).is(":checked")) {
            category.push($(this).val());
        }
    })
    FinalCategory = category.toString();

    $.ajax({
        type: 'GET',
        url: '{{ url("/shop_filter") }}',
        data: 'category=' + FinalCategory,
        success: function(response) {
            console.log(response);
            $(".test").html(response);
        }
    });
});

$('.test').click(function() {
    // Tạo một mảng để lưu trữ các giá trị được chọn
    var selectedValues = [];

    // Lặp qua tất cả các checkbox để lấy giá trị của các checkbox đã chọn
    $(".test").each(function() {
        if ($(this).is(":checked")) {
            selectedValues.push($(this).data("value"));
        }
    });

    FinalSelectedValues = selectedValues.toString();
    //alert(FinalSelectedValues);

    //Gửi truy vấn AJAX đến endpoint xử lý
    $.ajax({
        type: "GET", // Hoặc "GET" tùy theo cách bạn xử lý dữ liệu trên máy chủ
        url: "{{ url('/shop_filterP') }}", // Thay đổi thành URL của endpoint của bạn
        data: 'price=' + FinalSelectedValues, // Truyền dữ liệu cần lọc
        success: function(data) {
            // Hiển thị kết quả trả về trên trang
            console.log('success');
            $(".test").html(data);
        },
        error: function() {
            alert("Đã có lỗi xảy ra khi gửi yêu cầu.");
        }
    });
});
</script>
@endsection