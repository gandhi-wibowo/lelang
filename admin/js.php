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
    <script src="../bootstrap/js/bootstrap.min.js"></script>