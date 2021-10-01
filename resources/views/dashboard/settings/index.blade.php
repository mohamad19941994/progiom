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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">@lang('site.settings')</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{route('dashboard.settings.index')}}" class="text-muted">@lang('site.settings')</a>
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
                            @lang('site.settings')
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="{{route('dashboard.settings.update', $setting[0]->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('put')}}
                        <div class="card-body">
                            @include('dashboard.partials._sessions')
                            {{--optional_url_button_name--}}
                            <div class="form-group">
                                <label>@lang('site.website_title')<span class="text-danger">*</span></label>
                                <input name="website_title" type="text" class="form-control" value="{{ $setting[0]->website_title }}" placeholder="@lang('site.website_title')"/>
                            </div>
                            {{--location--}}
                            <div class="form-group">
                                <label>@lang('site.location')<span class="text-danger">*</span></label>
                                <input name="location" type="text" class="form-control" value="{{ $setting[0]->location }}" placeholder="@lang('site.location')"/>
                            </div>
                            {{--facebook_url--}}
                            <div class="form-group">
                                <label>@lang('site.facebook_url')<span class="text-danger">*</span></label>
                                <input name="facebook_url" type="text" class="form-control" value="{{ $setting[0]->facebook_url }}" placeholder="@lang('site.facebook_url')"/>
                            </div>
                            {{--twitter_url--}}
                            <div class="form-group">
                                <label>@lang('site.twitter_url')<span class="text-danger">*</span></label>
                                <input name="twitter_url" type="text" class="form-control" value="{{ $setting[0]->twitter_url }}" placeholder="@lang('site.twitter_url')"/>
                            </div>
                            {{--instagram_url--}}
                            <div class="form-group">
                                <label>@lang('site.instagram_url')<span class="text-danger">*</span></label>
                                <input name="instagram_url" type="text" class="form-control" value="{{ $setting[0]->instagram_url }}" placeholder="@lang('site.instagram_url')"/>
                            </div>
                            {{--pinterest_url--}}
                            <div class="form-group">
                                <label>@lang('site.pinterest_url')<span class="text-danger">*</span></label>
                                <input name="pinterest_url" type="text" class="form-control" value="{{ $setting[0]->pinterest_url }}" placeholder="@lang('site.pinterest_url')"/>
                            </div>
                            {{--linkedin_url--}}
                            <div class="form-group">
                                <label>@lang('site.linkedin_url')<span class="text-danger">*</span></label>
                                <input name="linkedin_url" type="text" class="form-control" value="{{ $setting[0]->linkedin_url }}" placeholder="@lang('site.linkedin_url')"/>
                            </div>
                            {{--telegram_url--}}
                            <div class="form-group">
                                <label>@lang('site.telegram_url')<span class="text-danger">*</span></label>
                                <input name="telegram_url" type="text" class="form-control" value="{{ $setting[0]->telegram_url }}" placeholder="@lang('site.telegram_url')"/>
                            </div>
                            {{--youtube_url--}}
                            <div class="form-group">
                                <label>@lang('site.youtube_url')<span class="text-danger">*</span></label>
                                <input name="youtube_url" type="text" class="form-control" value="{{ $setting[0]->youtube_url }}" placeholder="@lang('site.youtube_url')"/>
                            </div>
                            {{--contact_phone--}}
                            <div class="form-group">
                                <label>@lang('site.contact_phone')<span class="text-danger">*</span></label>
                                <input name="contact_phone" type="text" class="form-control" value="{{ $setting[0]->contact_phone }}" placeholder="@lang('site.contact_phone')"/>
                            </div>
                            {{--email--}}
                            <div class="form-group">
                                <label>@lang('site.email')<span class="text-danger">*</span></label>
                                <input name="email" type="text" class="form-control" value="{{ $setting[0]->email }}" placeholder="@lang('site.email')"/>
                            </div>
                            {{--logo--}}
                            <div class="form-group">
                                <label>@lang('site.logo')</label>
                                <input type="file" name="logo" class="form-control logo">
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('uploads/setting_images/'.$setting[0]->logo) }}"  style="width: 100px" class="img-thumbnail image-preview-logo" alt="">
                            </div>
                            {{--favicon--}}
                            <div class="form-group">
                                <label>@lang('site.favicon')</label>
                                <input type="file" name="favicon" class="form-control favicon">
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('uploads/setting_images/'.$setting[0]->favicon) }}"  style="width: 100px" class="img-thumbnail image-preview-favicon" alt="">
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
    <script src="{{asset('dashboard/assets/js/pages/crud/file-upload/image-input.js')}}"></script>
    <!--end::Page Scripts-->
    <script>
        // // image preview
        $(".logo").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-preview-logo').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
        $(".logo_footer").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-preview-logo_footer').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

        $(".favicon").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-preview-favicon').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endsection