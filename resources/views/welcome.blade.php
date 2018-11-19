@extends('layouts.app')
@section('content')
<div class="m-grid m-grid--hor m-grid--root m-page">
    <!-- BEGIN: Header -->
    @include('layouts.header')
    <!-- END: Header -->        
    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <!-- BEGIN: Left Aside -->
        @include('layouts.sidebar')
        <!-- END: Left Aside -->                            
        <div class="m-content">
                    <div class="row">
    <div class="col-md-12">

    

        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--tab" style="width: 700px">
        
            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right" action="/parsing/public/result">
                <div class="m-portlet__body">
                    <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">Min</label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" name="min" >
                    </div>
                     <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">Max</label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" name="max" >
                    </div>
                     <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">Group</label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" name="group" >
                    </div>
                     <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">Count On Group</label>
                        <input type="text" class="form-control m-input m-input--air m-input--pill" name="count_on_group" >
                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleSelect1">Time</label>
                        <select class="form-control m-input m-input--square" name="time">
                            <option value="2">2</option>
                            <option value="6">6</option>
                            <option value="12">12</option>
                            <option value="24">24</option>
                        </select>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-brand">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->            
        </div>
        <!--end::Portlet-->
    </div>
</div>
</div>
      </div>
  </div>
<!-- end:: Page -->
<!-- end::Quick Sidebar -->         
<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

@endsection