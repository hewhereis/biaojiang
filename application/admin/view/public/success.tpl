<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>
	<script src="http://localhost/newbj/static/admin/js/jquery.min.js"></script>
	<script src="http://localhost/newbj/static/admin/js/layer/layer.js"></script>   
</head>
<body>
   
    <script> layer.msg('<?php echo $msg?>',{icon:1,shade:0.1});</script>
	
    <script type="text/javascript">    
        	setTimeout(function(){
				location.href = '<?php echo($url);?>';
			},2000);    
    </script>
</body>
</html>
