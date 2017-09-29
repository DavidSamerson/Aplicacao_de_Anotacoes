<!DOCTYPE html>
<html lang="pt-br">
<?php 
session_start(); ?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplicação de Anotações">
    <meta name="author" content="DAVID SAMERSON">

	<title>Minhas Anotações</title>

	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body class="body">

<div class="login-body">
    <article class="container-login center-block">
		<section>
			<ul id="top-bar" class="nav nav-tabs nav-justified">
				<li class="active"><a data-toggle="tab" href="#login-access">ENTRAR</a></li>
				<li><a href="#cadastro" data-toggle="tab">CADASTRAR</a></li>
			</ul>
			<div class="tab-content tabs-login col-lg-12 col-md-12 col-sm-12 cols-xs-12">
				<div id="login-access" class="tab-pane fade active in">
					<h2><i class="glyphicon glyphicon-log-in"></i> Minhas Notas</h2>
					<br>

					<form method="post" accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal">

						<div class="form-group">
							<label for="login" class="sr-only">Email</label>
								<input type="text" class="form-control" name="login" id="login" 
									placeholder="Email" tabindex="1" required/>
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
								<input type="password" class="form-control" name="password" id="password"
									placeholder="Password" tabindex="2" required/>
						</div>

						<?php if($erro['erroLogin']) : ?>
							<div class="alert alert-danger" role="alert" align="center"> Email ou senha incorretos </div>
						<?php endif; ?>

						<div class="checkbox">
								<label class="control-label" for="remember_me">
									<input type="checkbox" name="lembrar" id="remember_me" value="1" class="" tabindex="3" /> Relembrar
								</label>
						</div>
						<br/>
						<div class="form-group ">				
								<button type="submit" name="log-me-in" id="submit" tabindex="5" class="btn btn-lg btn-primary">Entra</button>
						</div>
					</form>			
				</div>

			</div>
		</section>
	</article>
</div>
	

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>