
<div class="modal fade" id="modal-detailResidence" tabindex="-1" role="dialog" aria-labelledby="modal-detailResidence"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="residence">
    <div class="modal-content">
      <div class="modal-header default-color-dark"><i class="fas fa-building fa-lg mr-2 mt-1 text-white" title="Seleccione el ente."></i> <h5 class="text-white font-weight-bold">Detalle: Conjunto residencial</h5>
        <h5 class="modal-title text-white" id="ModalLabel"></h5>
        <button type="button" class="close" id="closeDetail" data-dismiss="modal" aria-label="Close">
          <span><i class="fas fa-window-close text-danger fa-md"></i></span>
        </button>
      </div>
      <div class="modal-body">
    	  <div class="row">
          <div class="row">
            <div class="sidebar-brand-text mx-3 push ml-3">
              <i class="fas fa-atlas dark-grey-text sidebar-brand-icon rotate-n-15"></i> <b class="dark-grey-text"> GC-GCA</b>
            </div>
          </div>
  	      <div class="col-lg-12 col-md-12 mb-lg-0">
  	        <div class="card-body">
              <div class="col-sm-8 col-md-12 col-lg-12 text-center">
                <h3> <i class="fas fa-building fa-md dark-grey-text" title="Nombre del Conjunto Residencial."></i>
                    <span id="name_residence" class="font-weight-bold mt-3 ml-1 dark-grey-text"></span> </h3>
    	        </div>
    	       <hr>
              <div class="col-sm-8 col-md-6 col-lg-6">
                <p class="dark-grey-text "><i class="fa fa-university fa-lg" aria-hidden="true" title="Tipo de Residencia."></i>
                  <span id="type_residence" class="font-weight-bold"></span></p>
              </div>
             <hr>
              <div class="col-sm-8 col-md-12 col-lg-12">
                 <div class="table-responsive">
                  <table class="table" id="dynamic_field">
                    <thead class="text-center">
                      <th><label><h6 class="dark-grey-text  font-weight-bold">Central</h6></label></th>
                      <th><label><h6 class="dark-grey-text  font-weight-bold">Esquina</h6></label></th>
                      <th><label><h6 class="dark-grey-text  font-weight-bold">Pen house</h6></label></th>
                      <th><label><h6 class="dark-grey-text  font-weight-bold">Otros</h6></label></th>
                    </thead>
                    <tbody id="reset" >
                    <tr class="text-center">
                      <td id="expenditure_id" hidden><label><b>id</b></label></td>
                      <td id="aliquot_center" class="font-weight-bold"></td>
                      <td id="aliquot_corner" class="font-weight-bold"></td>
                      <td id="aliquot_penhouse" class="font-weight-bold"></td>
                      <td class="font-weight-bold"><span id="structure"></span>,<span id="aliquot_structure"></span></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
             <hr>
              <div class="col-sm-8 col-md-6 col-lg-6">
                <p class="dark-grey-text "><i class="fas fa-file-invoice fa-lg" aria-hidden="true" title="Número de RIF."></i>
                  <b class="font-weight-bold">-</b> <span id="type_rif" class="font-weight-bold"></span><span id="number_rif" class="font-weight-bold"></span>
                </p>
              </div>
              <hr>
              <div class="col-sm-10 col-md-12 col-lg-12">
                <p class="dark-grey-text "><i class="fas fa-envelope fa-lg" title="Correo Electrónico de la Residencia."></i>
                 <b class="font-weight-bold">-</b> <span id="email_residence" class="font-weight-bold"></span>
                </p>
              </div>
              <hr>
              <div class="col-sm-10 col-md-12 col-lg-12 mr-3">
                <p class="dark-grey-text "><i class="fas fa-directions fa-lg" title="Dirección del Conjunto Residencial."></i>
                 <b class="font-weight-bold">-</b> <span id="addres" class="font-weight-bold"></span>
                </p>
              </div>
  	        </div>
  	      </div>
        </div>
      </div>
    </div>
  </div>
</div>

