<div class="container-fluid h-100">
	<div class="row h-100">
    
    <div class="col-md-6 banner">
    	<div class="row h-100 justify-content-center align-items-center">
			<div class="col-6 col-md-6">
    			<img src="./img/logo-index.png" class="img-fluid">
			</div>
		</div>
    </div>

    <div class="col-md-6 pt-4 pl-5 pr-5">
		<form action="/autenticar" method="post">
			<div class="row">
				<div class="col">
					<input type="text" class="form-control" name="email" placeholder="E-mail">
				</div>
				<div class="col">
					<input type="password" class="form-control" name="senha" placeholder="Senha">
				</div>
				
				<div class="col-auto">
					<button type="submit" class="btn btn-primary mb-2">Entrar</button>
				</div>
			</div>
			<?php if(isset($_GET['login']) && $_GET['login'] == 'erro'){ ?>
				
				<div class="row">
					<div class="col">	
						<small class="text-danger"> Erro na autenticação. Email e/ou senha incorreto(s)</small>
					</diV>
				</div>

				<?php } ?>	
		</form>

		<div class="row pt-5 pl-5 pr-5">
			<div class="col pl-5 pr-5">
				<img src="/img/twitter_logo.png" />
				<h1 class="fs-1">Acontecendo agora</h1>
				
				<h2 class="mt-5 fs-1">Inscreva-se no Twitter hoje mesmo.</h2>
	
				<a href="/inscreverse" class="btn btn-primary btn-block mb-2 col-md-6">Inscrever-se</a>

				<small> Ao se inscrever, você concorda com os <a href="#" class="text-info">Termos de Serviço</a> e a <a href="#" class="text-info">Política de Privacidade</a>, incluindo o <a href="#" class="text-info">Uso de Cookies</a>.</small>
			</div>	
		</div>
    </div>

  </div>
</div>