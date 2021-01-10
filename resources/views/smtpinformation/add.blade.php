@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <div class="breadcrumb">
        <span class="breadcrumb-item active"><h2> SMTP Information</h2></span>
    </div>
    @if (\Session::has('errors'))
                        <ul class="alert alert-danger pl-5">
	                           <li>{{ \Session::get('errors') }}</li> 
	                    </ul>
                    @endif
        <div class="form-wizard">
            <div class="custom-error"></div>
            <div class="myContainer">
                <div class="form-container animated header-edit" id="edit-smtp-info-data">
                    <form role="form" method="POST" action="" id="save_SMTP_info_data" class="" name="save_smtp_data" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <input type="hidden" name="smtpinfo_id" id="smtpinfo_id" value="{{ isset($smtpinfo) & !empty($smtpinfo['id']) ? $smtpinfo['id'] : '' }}">
                    <div class="nested-table-wrapper row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Site Name <span class="required">*</span></label>
                                <input type="text" name="site_name" value="{{ isset($smtpinfo) & !empty($smtpinfo['site_name']) ? $smtpinfo['site_name'] : '' }}" class="form-control" data-parsley-required="true" data-parsley-required-message="Please enter Site Name" placeholder="Site Name" data-parsley-trigger="focusout">
                            </div>
                            <div class="form-group">
                                <label>SMTP Driver<span class="required">*</span></label>
                                <input type="text" name="smtp_driver" value="{{ isset($smtpinfo) & !empty($smtpinfo['smtp_driver']) ? $smtpinfo['smtp_driver'] : '' }}" class="form-control" data-parsley-required="true" data-parsley-required-message="Please enter SMTP Driver" placeholder="SMTP Driver" data-parsley-trigger="focusout">
                            </div>
                            <div class="form-group">
                                <label>SMTP Host<span class="required">*</span></label>
                                <input type="text" name="smtp_host" value="{{ isset($smtpinfo) & !empty($smtpinfo['smtp_host']) ? $smtpinfo['smtp_host'] : '' }}" class="form-control" data-parsley-required="true" data-parsley-required-message="Please enter SMTP Host" placeholder="SMTP Host" data-parsley-trigger="focusout">
                            </div>
                            <div class="form-group">
                                <label>SMTP Port<span class="required">*</span></label>
                                <input type="text" name="smtp_port" value="{{ isset($smtpinfo) & !empty($smtpinfo['smtp_port']) ? $smtpinfo['smtp_port'] : '' }}" class="form-control" data-parsley-required="true" data-parsley-required-message="Please enter SMTP Port" placeholder="SMTP Port" data-parsley-trigger="focusout">
                            </div>
                            <div class="form-group">
                                <label>Username<span class="required">*</span></label>
                                <input type="text" name="username" value="{{ isset($smtpinfo) & !empty($smtpinfo['username']) ? $smtpinfo['username'] : '' }}" class="form-control" data-parsley-required="true" data-parsley-required-message="Please enter Username" placeholder="Username" data-parsley-trigger="focusout">
                            </div>
                            <div class="form-group">
                                <label>SMTP Password<span class="required">*</span></label>
                                <input type="text" name="smtp_password" value="{{ isset($smtpinfo) & !empty($smtpinfo['smtp_password']) ? $smtpinfo['smtp_password'] : '' }}" class="form-control" data-parsley-required="true" data-parsley-required-message="Please enter SMTP Password" placeholder="SMTP Password" data-parsley-trigger="focusout">
                            </div>
                            <div class="form-group">
                                <label>From Name<span class="required">*</span></label>
                                <input type="text" name="from_name" value="{{ isset($smtpinfo) & !empty($smtpinfo['smtp_driver']) ? $smtpinfo['smtp_driver'] : '' }}" class="form-control" data-parsley-required="true" data-parsley-required-message="Please enter From Name" placeholder="From Name" data-parsley-trigger="focusout">
                            </div>
                            <!-- <div class="form-group">
                                <label>SMTP Encryption<span class="required">*</span></label>
                                <input type="text" name="smtp_encryption" class="form-control" data-parsley-required="true" data-parsley-required-message="Please enter SMTP Encryption" placeholder="SMTP Encryption" data-parsley-trigger="focusout">
                            </div> -->

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="encryption"> SMTP Encryption <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="smtp_encryption" id="smtp_encryption">
                                            <option value="TLS">TLS</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>From Email<span class="required">*</span></label>
                                <input type="text" name="from_email" value="{{ isset($smtpinfo) & !empty($smtpinfo['from_email']) ? $smtpinfo['from_email'] : '' }}" class="form-control" data-parsley-required="true" data-parsley-required-message="Please enter From Email" placeholder="From Email" data-parsley-trigger="focusout">
                            </div>
                            </div>
                    </div>
                    
                    
                    <div class="form-group bottom-buttons">
                        <button type="button" class="btn btn-primary btn-gradient save-SMTP-info">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- /.content -->
@endsection


@section('js_section')
    
@endsection


 