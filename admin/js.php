    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script> 
    <script type="text/javascript">            
        $(document).ready(function(){
            $("#pass").keyup(function(){
                var pas=$("input#pas").val();
                var pass=$("input#pass").val();
                $.ajax({
                    type:"POST",
                    url:"ajax.php",
                    data:"pas="+pas+"&pass="+pass,
                    success:function(html){
                        $("#confirm").html(html);  
                    }
                });
            });
        });

        function block(id){
            var name=$("#button").attr("name");
                $.ajax({
                    type:"POST",
                    url:"ajax.php",
                    data:"name="+name+"&id="+id,
                    success:function(){
                        location.reload(); 
                    }
                });
        }            
    </script>
    <script type="text/javascript">
        function test(id){
            var name=$("#button").attr("name");
                $.ajax({
                    type:"POST",
                    url:"ajax.php",
                    data:"name="+name+"&id="+id,
                    success:function(){
                        location.reload(); 
                    }
                });
        }
    </script>
    <script src="../bootstrap/js/jquery-ui.min.js"></script>
    <script> $.widget.bridge('uibutton', $.ui.button);</script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../plugins/knob/jquery.knob.js"></script>
    <script src="../bootstrap/js/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/pages/dashboard.js"></script>
    <script src="../dist/js/demo.js"></script>