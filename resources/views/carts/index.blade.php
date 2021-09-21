@extends('layouts.admin.app')
@section('page_title')
    @lang('site.users')
@endsection
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>الكروت</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">الكروت</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        @if ($carts->count() > 0)
                            <table class="table table-condensed">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">id</th>
                                    <th>العدد</th>
                                    <th>السعر</th>
                                    <th>تاريخ الصلاحية</th>
                                </tr>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>{{$cart->id}}</td>
                                        <td>{{$cart->cart_number}}</td>
                                        <td>{{$cart->price}}</td>
                                        <td>{{$cart->date}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        @else
                            <h3 style="font-weight: 400;">لا يوجد أي سجل</h3>
                        @endif
                            <div class="row">
                                <div class="col-sm-12 col-md-5"></div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        {{$carts->links("pagination::bootstrap-4")}}

                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection


