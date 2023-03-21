<div class="modal fade " id="chatmodal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
          <div class=" modal-dialog modal-dialog-centered ">
            <div class="modal-content  modal-fullscreen  ">
              <div class="modal-header text-center">
                <h5 class="modal-title fs-5 display-6 fw-bold" id="exampleModalToggleLabel">Chat:  <span id="userName" class="text-muted"><?php echo $_SESSION['usuario'];?></span> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" id="content">
                
                
                
              </div>
              <div class="modal-footer">
                    <form id="formChat" type="chat" class="w-100">
                        <div class="input-group mb-3">
                          <input id="message" type="text" class="form-control" placeholder="Mensaje" aria-label="Mensaje" aria-describedby="button-addon2">
                          <button class="btn btn-outline-success" type="submit" value="Ingresar" id="submit">Enviar</button>
                        </div>
                    </form>
                
              </div>
            </div>
          </div>
        </div>
        <script src="<?= _THEME_?>js/scripts/chats.js"></script>
        <script type="text/javascript">
	var url = "127.0.0.1:12345";
</script>

<script type="text/javascript" src="<?= _THEME_?>js/socket.js"></script>
<script type="text/javascript" src="<?= _THEME_?>js/contenido.js"></script>