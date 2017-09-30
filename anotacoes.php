<!DOCTYPE html>
<html lang="pt-br">
<?php session_start(); ?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplicação de Anotações">
    <meta name="author" content="DAVID SAMERSON">

	<title>Minhas Anotações</title>

	<link rel="stylesheet" type="text/css" href="css/paginacao.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

	<header>

		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- botão da responsividade -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">Anotações.com</a>
			</div>

			<!-- coleção doconteudo do menu -->
			<div class="collapse navbar-collapse color" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Anotações <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="divider"></li>
							<li><a href="#">Separated link</a></li>
							<li class="divider"></li>
							<li><a href="#">One more separated link</a></li>
						</ul>
					</li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Adicionar nota <img src="imagens/add.png" class="imagemAdicionar"></a></li>

					<li><a style="cursor: default;">Seja bem vindo <?php echo $_SESSION['nome'];?></a></li>

				</ul>

				<form class="navbar-form" role="search">
					<div class="input-group">
						<input type="text" class="form-control pull-right" style="width: 300px; margin-right: 35px, border: 1px solid black; background-color: #e5e5e5;" placeholder="Search">
						<span class="input-group-btn">
							<button type="reset" class="btn btn-default">
								<span class="glyphicon glyphicon-remove">
									<span class="sr-only">Fechar</span>
								</span>
							</button>
							<button type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-search">
									<span class="sr-only">Pesquisar</span>
								</span>
							</button>
						</span>
					</div>
				</form>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	</header>	
	
	<section> TESTE </section>

	<footer>
		
	</footer>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>