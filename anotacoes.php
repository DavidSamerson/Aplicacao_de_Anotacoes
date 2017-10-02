<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Aplicação de Anotações">
    <meta name="author" content="DAVID SAMERSON">

	<title>Minhas Anotações</title>

	<link rel="stylesheet" type="text/css" href="css/paginacao.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
</head>
<body class="body">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" >
		<div class="container">
			<!-- botão da responsividade -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand"><p class="textoAzul">Anotações.com</p></a>
			</div>

			<!-- coleção doconteudo do menu -->
			<div class="collapse navbar-collapse color" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Anotações 
							<span class="badge"><?php echo count($nota); ?></span> <b class="caret"></b></a>
						<ul class="dropdown-menu configuracoesMenu" aria-labelled-by="dropdown-menu">
							<li><a href="#">Acesso Rápido</a></li>
							<li class="divider"></li>
							<?php foreach ($nota as $n) : ?>
							<li><a href="#"><?php echo $n['mensagem'] ?></a></li>
							<?php endforeach; ?>
							<li class="divider"></li>
						</ul>
					</li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" data-toggle="modal" data-target="#myModal">Adicionar nota <img src="imagens/add.png" class="imagemAdicionar"></a></li>

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
	<header class="header">
	</header>	
	
	<section> 
		<div class="container-fluid">
			<div class="col-md-3">

				<div class="pull-left col-md-12 classeMenu2" align="center" onclick="Mudarestado('menu2')">
					<span class="glyphicon glyphicon glyphicon-menu-down btn-lg" style="color: white"></span>
				</div>

				<div class="pull-left col-md-12" align="center" id="menu2">
					<div class="usuarioMenu2">
						<span class="glyphicon glyphicon-user glyphicon-lg" style="color: white;" >
						</span> <br> <p><?php echo $_SESSION['nome']; ?></p>
					</div>
					<ul>
						<li><span class="glyphicon glyphicon-duplicate"></span> Notas Expiradas</li>
						<li><span class="glyphicon glyphicon-copy"></span> Novas Notas</li>
						<li><span class="glyphicon glyphicon-trash"></span> Lixeira</li>
						<li><span class="glyphicon glyphicon-cog"></span> Configurações</li>
						<li><span class="glyphicon glyphicon-user"></span> Perfil</li>
						<li><a href="index.php" class="botaoSair"><span class="glyphicon glyphicon-remove-circle"></span> Sair</li></a>
					</ul>

				</div>
			</div>

<!---------------------------------------------------------------------------------------------------------------------- -->

				<div class="col-md-9 pull-right" style="margin-top: 20px;" align="center">
					<?php foreach ($nota as $n) : ?>
					  <?php if (isset($_SESSION['nota'][$n['id']])):?>

					<div class="col-md-2 configNotasEspaco" align="center">

						<div class="pull-right">
							<a href="nota.php?id=<?php echo $n['id']; ?>&comando=true" style="padding: 10px; margin-left: 50%;"
								class="sombreamento">X</a>
						</div>
						<h4 class="tituloNota"><?php echo $n['nome'];?></h4>
						
						<div class="configNotas col-md-12" align="center"><?php echo $n['mensagem']; ?></div>
						<p>
							<a href="" style="padding: 0px; margin: 0px;">
								<span class="glyphicon glyphicon-calendar" style="background-color: grey; padding: 10px 20px;">
									<?php echo $n['data']; ?></span></a>
						</p>
							<a onclick="setaDadosModal('<?php echo $n['id']; ?>','<?php echo $n['nome']; ?>','<?php echo $n['data']; ?>', '<?php echo $n['mensagem'];?>');" 
							 data-toggle="modal" data-target="#myModal" >
							<span class="glyphicon glyphicon-edit" style="padding:10px;"></span></a>
					</div>

						<?php endif ?>
					<?php endforeach; ?>

					<?php if (count($nota) == 0) : ?>
						<div class="col-md-12 alerta" align="center">
							<div class="alert alert-danger" role="alert"><strong>OPS!</strong> Você não possui nenhuma nota no momento, clique em adicionar nota para criar..</div>
						</div>
					<?php endif; ?>
				</div>

<!-- --------------------------------------------------------------------------------------------------------------------- -->

			</div>
		</div>

</section>
<section class="MODAL">
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cadastrar Nota</h4>
      </div>
      <div class="modal-body">
        <div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" role="form">
        <fieldset>
          <!-- Título -->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Titulo: </label>
            <div class="col-sm-10">
              <input type="text"  placeholder="Nome da nota" name="nome" id="nomemodal" class="form-control">
            </div>
          </div>

          <!-- Data -->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Data: </label>
            <div class="col-sm-10">
              <input type="text" placeholder="00/00/0000" name='data' class="form-control" id="datamodal">
            </div>
          </div>

          <!-- Mensagem -->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Mensagem: </label>
            <div class="col-sm-10">
              <textarea placeholder="Digite Sua Mensagem" name="mensagem" class="form-control" id="mensagemmodal"> </textarea>
            </div>
          </div>

          <input type="hidden" name="id" id="idmodal" value="0">

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
                <button type="reset" class="btn btn-default">Apagar Tudo</button>
                <button type="submit" class="btn btn-primary">Salvar Nota</button>
              </div>
            </div>
          </div>

        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
</section>

<footer>
<div class="container-fluid">
<div class="col-md-7 pull-left">
<div class="col-md-6">
	<div class="pull-left col-sm-12" align="center">
		<h3>Redes Sociais</h3>
		<hr>
	</div>
	<div class="pull-left col-sm-12" align="center">
		<img src="imagens/facebook.png" class="socialImage">
	</div>
	<div class="pull-left col-sm-12" align="center">
		<img src="imagens/google-plus.png" class="socialImage">
	</div>
	<div class="pull-left col-sm-12" align="center">
		<img src="imagens/twitter.png" class="socialImage">
	</div>
</div>

<div class="col-md-6">
	<div class="col-md-12"  align="center">
			<h3>Telefones para contato</h3> <hr>
		</div>
		<div class="col-md-12"  align="center">
			<h4>(85) 3223 - 3333</h4>
			<h4>(11) 3643 - 3333</h4>
		</div>
		<div class="col-md-12"  align="center">
			<h4>(85) 3223 - 3333</h4>
			<h4>(11) 3643 - 3333</h4>
		</div>
		<div class="col-md-12"  align="center">
			<h4>(85) 3223 - 3333</h4>
			<h4>(11) 3643 - 3333</h4>
		</div>
</div>
</div>
<div class="col-md-5 pull-right">
	<form>
	<fieldset>
		<legend><h3 style="color: #333333;">Fale Conosco<h3>
			<hr></legend>
			
			<label>
				<h4>Nome:<h4> 
				<input type="text" name="nomepessoa" class="campoFaleConosco input-group">
			</label>

			<label>
				<h4>Mensagem:<h4>
				<textarea  class="campoFaleConosco "></textarea>
			</label>
			<br>
			<button type="submit" name="enviar" class="pull-right btn btn-primary" id="botaoEnviar">Enviar</button>
	</fieldset>
	</form>
</div>
</footer>

<script type="text/javascript">
	function setaDadosModal(id, nome, data, mensagem) {

    	document.getElementById('idmodal').value = id;
    	document.getElementById('nomemodal').value = nome;
    	document.getElementById('datamodal').value = data;
    	document.getElementById('mensagemmodal').value = mensagem;
	}
</script>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script>
  $(function () {
    $('.dropdown-toggle').dropdown();
  }); 
</script>

<script type="text/javascript">

	function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none")
            document.getElementById(el).style.display = 'block';
        else
            document.getElementById(el).style.display = 'none';
    }
</script>


</body>
</html>