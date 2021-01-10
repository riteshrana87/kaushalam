@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <div class="breadcrumb">
        <span class="breadcrumb-item active"><h2> SMTP Information</h2></span>
    </div>
        <div class="form-wizard">
         @if(\Session()->has('success'))
                        <ul class="alert alert-success pl-5">
	                           <li>{{\Session()->get('success')}}</li> 
	                    </ul>
                    @endif
   
                    @if(\Session()->has('error'))
                        <ul class="alert alert-danger pl-5">
	                           <li>{{ \Session()->get('error')}}</li> 
	                    </ul>
                    @endif
            <div class="myContainer">
                <div class="form-container animated header-edit">
                <form role="form" method="POST" action="{{ route('send.mail') }}" id="send_mail_form" class="send_mail_form" name="send_mail_data" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                    <div class="nested-table-wrapper row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>To Mail <span class="required">*</span></label>
                                    <input type="text" name="to_mail" class="form-control" data-parsley-required="true" data-parsley-required-message="Please enter To Mail" placeholder="To Mail" data-parsley-trigger="focusout">
                                </div>
                                <div class="form-group">
                                    <label>Subject<span class="required">*</span></label>
                                    <input type="text" name="subject" class="form-control" data-parsley-required="true" data-parsley-required-message="Please enter Subject" placeholder="Subject" data-parsley-trigger="focusout">
                                </div>
                                <div class="form-group">
                                    <label>Content<span class="required">*</span></label>
                                    <input type="text" name="content" class="form-control" data-parsley-required="true" data-parsley-required-message="Please enter Content" placeholder="Content" data-parsley-trigger="focusout">
                                </div>
                            </div>
                    </div>
                    
                    <div class="form-group bottom-buttons">
                        <button type="submit" name="submit" class="btn btn-primary btn-gradient">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- /.content -->
@endsection

@section('js_section')
    
@endsection
