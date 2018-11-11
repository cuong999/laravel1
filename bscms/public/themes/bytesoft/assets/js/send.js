<script type="text/javascript">
    $(function() {
        $('#send').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                    'url' : 'send',
                    'data': {
                        'email' : $('#email').val(),
                        'name' : $('#name').val(),
                        'theme' : $('#theme').val(),
                        'message' : $('#message').val(),
                    },
                    'type' : 'POST',
                    success: function (data) {
                        console.log(data);
                        if (data.error == true) {
                            $('.error').hide();
                            if (data.message.email != undefined) {
                                $('.errorEmail').show().text(data.message.email[0]);
                            }
                            if (data.message.name != undefined) {
                                $('.errorName').show().text(data.message.name[0]);
                            }
                            if (data.message.theme != undefined) {
                                $('.errortheme').show().text(data.message.theme[0]);
                            }
                            if (data.message.message != undefined) {
                                $('.errortheme').show().text(data.message.message[0]);
                            }
                        } 
                        else {
                           alert('ok');
                        }
                    }
                });
        })
    });