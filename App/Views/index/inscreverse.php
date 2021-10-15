<div class="container">
  <div class="d-flex justify-content-center mt-5">
    <div class="card" style="width: 36rem;">
      <div class="card-body">

        <div class="d-flex justify-content-center">
          <img src="/img/twitter_logo.png" />
        </div>

        <div class="row">
          <div class="col">
            <h2>Crie sua conta</h2>
          </div>
        </div>

        <div class="row">
          <div class="col">
            
            <form action="/registrar" method="post">
              <div class="form-group">
                <input type="text" class="form-control" value="<?php if(isset($this->view->usuario['nome'])){ echo $this->view->usuario['nome']; } ?>" placeholder="Nome" name="nome">
              </div>
              
              <div class="form-group">
                <input type="text" class="form-control" value="<?php if(isset($this->view->usuario['email'])){ echo $this->view->usuario['email']; } ?>" placeholder="E-mail" name="email">
              </div>

              <div class="form-group">
                <input type="password" class="form-control"  value="<?php if(isset($this->view->usuario['senha'])){ echo $this->view->usuario['senha']; } ?>" placeholder="Senha" name="senha">
              </div>
              
              <div class="mt-4 mb-4">
                <small class="form-text">
                  Ao inscrever-se, você concorda com os Termos de Serviço e com as Políticas de Privacidade, incluindo o Uso de Cookies. Outras pessoas poderão encontrar você pelo e-mail ou número de telefone fornecido · Opções de Privacidade
                </small>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Inscrever-se</button>

              <?php if( $this->view->erroCadastro){ ?>

                <small class="form-text text-danger"> *Error ao tentar realizar o cadastro, verifique se os campos foram cadastrados corretamente</small>

              <?php } ?>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>



    
  