<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>
          <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    @yield('third_party_stylesheets')
    @stack('page_css')
    <style>
    .required {
  color: #b94a48;
}
label.error {
         color: #dc3545;
         font-size: 14px;
    }
.parsley-errors-list li.parsley-required {
    color: #dc3545;
}
ul{
    list-style-type:none;
}
</style>
</head>


<body class="c-app">
@include('layouts.sidebar')

<div class="c-wrapper">
    <header class="c-header c-header-light c-header-fixed">
        @include('layouts.header')
    </header>

    <div class="c-body">
        <main class="c-main">
            @yield('content')
        </main>
    </div>

    <footer class="c-footer">
        <div><a href="#">Kaushalam</a> © 2021 creativeLabs.</div>
        <div class="mfs-auto">Powered by&nbsp;<a href="#">Kaushalam</a></div>
    </footer>
</div>
<!-- jQuery 3 -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    
    $(document).ready(function() {
        // Store SMTP information detail
        var smtpInfoData = "{{ route('smtpinfo') }}";
        $('.save-SMTP-info').click(function () {
            $('#save_SMTP_info_data').parsley().validate();
        if ($('#save_SMTP_info_data').parsley().isValid()) {
            $('.save-SMTP-info').attr('disabled', true);
            $.ajax({
                type: "POST",
                url: smtpInfoData,
                data: $('#save_SMTP_info_data').serialize(),
                success: function (response) {
                    if (response.status == 'success') {
                        $("#edit-smtp-info-data").html(response.html);
                        $('#smtpinfo_id').val(response.smtpinfo_id);
                        showMessageOnTop(response.message);
                        $('.save-SMTP-info').removeAttr('disabled');
                    } else {
                        showMessageOnTop(response.message, 'error');
                        $('.save-SMTP-info').removeAttr('disabled');
                    }
                },
                fail: function () {
                    $('.save-SMTP-info').removeAttr('disabled');
                }
            });
        }
        });

function showMessageOnTop(message, type=''){
    var alertType = 'success';
    if(type == 'error'){
        alertType = 'danger';
    }
    $('.custom-error').html('<div class="alert alert-' + alertType + ' alert-dismissible" role="alert">\n' +
            '  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>\n' +
            '  <strong>' + message + '</strong>\n' +
        '</div>');

    window.setTimeout(function() {
        $(".alert").slideUp(1000, function(){
            $(this).remove();
        });
    }, 5000);
}
     });
</script>
@yield('third_party_scripts')

@stack('page_scripts')
</body>
</html>
