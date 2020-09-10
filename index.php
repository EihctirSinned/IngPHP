<?php if(!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE html>
<html>
	<head>
		<title>IgnPHP</title>
		<!-- CSS only -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<?php if(isset($_SESSION['success'])) { ?>
				<div class="alert alert-success mt-3">
					<p><?= $_SESSION['success'] ?> 
				</div>
			<?php unset($_SESSION['success']); } ?></p>
		  	<h2>Datos de usuarios</h2>
		  	<p>Ficha básica:</p>            
		  	<table class="table table-bordered">
		    <thead>
		    	<tr>
		        	<th>Firstname</th>
		        	<th>Lastname</th>
		        	<th>Email</th>
		    	</tr>
		    </thead>
			    <tbody>
			    	<tr>
			    		<td>John</td>
			    		<td>Doe</td>
			    		<td>john@example.com</td>
			    	</tr>
			      	<tr>
			        	<td>Mary</td>
			        	<td>Moe</td>
			        	<td>mary@example.com</td>
			      	</tr>
			    	<tr>
			    		<td>July</td>
						<td>Dooley</td>
			    		<td>july@example.com</td>
			    	</tr>
			    </tbody>
		  	</table>
			<button type="submit" class="btn btn-success">Generar informe</button>
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script>
			$("button").click(function(){
				var fd = new FormData();
				var data = '<?= $_SERVER['PHP_SELF']; ?>';
				fd.append('data', data);
				$.ajax({
					url: 'load.php',
					data:fd,
					type:'post',
					processData: false,
					contentType: false,
					success: function (data) {
						var link=document.createElement('a');
						link.href=window.URL = "http://localhost/IgnPHP/";
						link.download="FicheroEjemplo.pdf";
						link.click();
						location.reload();
					},
					complete: function (data) {
	                    
	            	}
				});
			});
			</script>
	</body>
</html>