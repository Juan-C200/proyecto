
<div class="container" id="container">
    
    <div class="row mt-2 mb-2 p-4 justify-content-center">
        <h1 class="text mb-1 mt-2">Reportar</h1>
        <button class="categoria col-md-3 border rounded p-4 m-2 text-center btn btn-light" 
        data-url="<?php echo getUrl("Reportes", "SeñalMalEstado","getCreate"); ?>">Señal en mal estado</button>
        <button class="categoria col-md-3 border rounded p-4 m-2 text-center btn btn-light" 
        data-url="<?php echo getUrl("Reportes", "ReductorMalEstado","getCreate"); ?>">Reductor en mal estado</button>
        <button class="categoria col-md-3 border rounded p-4 m-2 text-center btn btn-light" 
        data-url="<?php echo getUrl("Reportes", "ViaMalEstado","getCreate"); ?>">Via en mal estado</button>
    </div>
    
    <div id="form">

    </div>
</div>           




<!-- Modal -->
<div class="modal" id="modal_error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close close"></button>
      </div>
      <div class="modal-body">
        mally
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary ">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal" id="modal_exitoso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close close"></button>
      </div>
      <div class="modal-body">
        Biennn
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary ">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>