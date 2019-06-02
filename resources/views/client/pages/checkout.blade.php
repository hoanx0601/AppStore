@extends('client.layouts.master')

@section('title')
	Đặt Hàng
@endsection

@section('content')
    <div class="page-head_agile_info_w3l">
    </div>
    <!-- //banner-2 -->
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="/">Trang Chủ</a>
                        <i>|</i>
                    </li>
                    <li>Đặt Hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <br/>
    <form action="{{ route('cart.store') }}" method="post">
        @csrf
    	<div class="row">
            <div class="col-sm-8">
                <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);">
                    <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                        <div class="vertical_post check_box_agile">
                            <h5 style="float: left;"><i class="fas fa-map-marker-alt"></i> Địa chỉ nhận hàng</h5>
                            <a href="#address" style="float: right;" data-toggle="modal">Thay đổi >></a>
                            <div class="checkbox" style=" clear: both;">
                                <div class="check_box_one cashon_delivery">
                                    <label class="anim">
                                        @if( count($user->customer) > 0 )
                                            <ul style="list-style: none;">
                                                @foreach($user->customer as $customer)
                                                   <li>
                                                        <input type="radio" name="address" class="checkbox" @if($customer->active == 1) checked @endif style="float: left;">
                                                         <span style="float: left;">
                                                            {{ $user->name }} | {{ $customer->phone }}
                                                            <p>{{ $customer->address }}</p>
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>    
                                        @endif    
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);margin-top: 10px;">
                    <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                        <div class="vertical_post check_box_agile">
                            <h5><i class="far fa-truck"></i> Phương thức vận chuyển</h5>
                            <div class="checkbox">
                                <div class="check_box_one cashon_delivery">
                                    <label class="anim">
                                        <input type="checkbox" class="checkbox" checked style="float: left;">
                                        <span style="float: left;">
                                            Chuyển phát tiêu chuẩn
                                            <p>Dự kiến giao hàng sau 3-4 ngày</p>
                                        </span>
                                        <span style="float: right; margin-left: 240px;">{{ number_format('20000') }} VNĐ</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);">
                    <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                        <div class="vertical_post check_box_agile">
                            <h5 style="text-align: center;"><i class="fas fa-shopping-cart"></i> Thông tin đơn hàng</h5>
                            <div class="checkbox">
                                <div class="check_box_one cashon_delivery">
                                    <label class="anim">
                                        <p style="float: left;">Tổng Tiền</p>
                                        <p style="margin-left: 10px;float: left;">{{ number_format($cart) }} VNĐ</p>
                                    </label>
                                    <label class="anim">
                                        <p style="float: left;">Phí vận chuyển</p>
                                        <p style="margin-left: 10px;float: left;">{{ number_format('20000') }} VNĐ</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193); margin-top: 10px;">
                    <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                        <div class="vertical_post check_box_agile">
                            <div class="checkbox">
                                <div class="check_box_one cashon_delivery">
                                    <label class="anim">
                                        <h5 class="modal-title text-center"><i class="fas fa-comments"></i> Ghi Chú</h5>
                                        <div class="form-group">
                                            <textarea style="width: 247px;" placeholder="Bạn có nhắn gì tới shop không?" rows="4" maxlength="1000"></textarea>
                                        </div>
                                        
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193); margin-top: 10px;">
                    <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                        <div class="vertical_post check_box_agile">
                            <div class="checkbox">
                                <div class="check_box_one cashon_delivery">
                                    <label class="anim">
                                        <p style="float: left;">Tổng thanh toán</p>
                                        <p style="margin-left: 10px;float: left;">{{ number_format($cart+20000) }} VNĐ</p>
                                    </label>
                                    <label class="anim">
                                        <button type="submit" class="btn submit check_out">Tiến hành thanh toán</button>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </form>    
    <div class="modal fade" id="address" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Thay đổi địa chỉ giao hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('customer.store') }}">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Địa Chỉ Email</label>
                            <input type="text" class="form-control email" value="{{ $user->email ?? '' }}" placeholder="Nhập địa chỉ email" name="email" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Số điện thoại</label>
                            <input type="text" class="form-control phone" placeholder="Nhập số điện thoại" name="phone" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Địa Chỉ</label>
                            <input type="text" class="form-control address" placeholder="Nhập địa chỉ nhận hàng" name="address" required="">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="actives" name="active" id="customControlAutosizing">
                            <label class="" for="customControlAutosizing" >Dùng địa chỉ này cho các đơn hàng sau</label>
                        </div>
                        <div class="right-w3l">
                            <button type="submit" class="btn btn-primary form-control">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection