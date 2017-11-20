<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-off-canvas-nav.js"></script>
<script type="text/javascript">
    // Bootstrap popover
    $(function () {
    $('[data-toggle="popover"]').popover()
    })
    // Ajax form submission
    $("#submitform").click(function(){
        $.ajax({
            method:"POST",
            url:"/ajax/ajaxParams",
            data:{
                "username":$("#usernameinput").val(),
                "password":$("#passwordinput").val()
            },
            success:function(msg){
                if (msg=="welcome") {
                    window.location.replace("ajax/userHome");
                } else {
                    window.location.replace("/ajax?ajaxmsg=Incorrect Login");
                }
            }

        })
    })
</script>
</body>
</html>