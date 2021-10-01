@extends('layouts.dashboard.app')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">@lang('site.users')</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{route('dashboard.users.index')}}" class="text-muted">@lang('site.users')</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">@lang('site.edit')</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
            @include('dashboard.partials._errors')
            <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            @lang('site.users')
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{route('dashboard.users.update', $user->id)}}" method="post">
                        {{csrf_field()}}
                        {{ method_field('put')}}
                        <div class="card-body">
                            {{--name--}}
                            <div class="form-group">
                                <label>@lang('site.name')<span class="text-danger">*</span></label>
                                <input name="name" type="text" class="form-control" value="{{ $user->name }}" placeholder="@lang('site.name')"/>
                            </div>
                            {{--email--}}
                            <div class="form-group">
                                <label>@lang('site.email') <span class="text-danger">*</span></label>
                                <input name="email" type="email" class="form-control" value="{{ $user->email }}" placeholder="@lang('site.email')"/>
                            </div>
                            {{--permissions--}}
                            <label for="password_confirmation">@lang('site.permissions') <span class="text-danger">*</span></label>
                            @php
                                $models = ['users', 'categories', 'matches', 'settings', 'pages'];
                                $maps = ['create', 'read', 'update', 'delete'];
                            @endphp
                            <div class="example-preview">
                                <ul class="nav nav-pills" id="myTab1" role="tablist">
                                    @foreach ($models as $index=>$model)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}" data-toggle="tab" href="#{{ $model }}">
                                                <span class="nav-icon">
                                                    <i class="flaticon2-chat-1"></i>
                                                </span>
                                                <span class="nav-text">@lang('site.' . $model)</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>


                                <div class="tab-content mt-5" id="myTabContent1">
                                    @foreach ($models as $index=>$model)
                                        <div class="tab-pane fade {{($model == 'users' ? 'active show' : '')}}" id="{{ $model }}" role="tabpanel" aria-labelledby="{{ $model }}">
                                            <div class="form-group">
                                                <div class="checkbox-inline">
                                                    @foreach ($maps as $map)
                                                        <label class="checkbox">
                                                            <input value="{{ $map . '_' . $model }}" type="checkbox" name="permissions[]" {{($user->hasPermission($map . '_' . $model)) ? ('checked') : ('')}}>
                                                            <span></span>@lang('site.' . $map)</label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-2">@lang('site.submit')</button>
                            <button type="reset" class="btn btn-secondary">@lang('site.reset')</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection

@section('scripts')
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('dashboard/assets/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>
    <!--end::Page Scripts-->
@endsection