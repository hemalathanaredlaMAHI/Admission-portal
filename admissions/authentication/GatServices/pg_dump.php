<?php echo $_POST["msg"];?>
<script type="text/javascript">
        function getMsg(){
                var msg = "<?php echo $_POST["msg"]?>";
                AndroidFunction.gotMsg(msg);
        }
        getMsg();
</script>