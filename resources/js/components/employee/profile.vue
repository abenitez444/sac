<template>
  <div id="ProfileCard">
    <div class="modal fade" id="modal-profile" tabindex="-1" role="dialog" aria-labelledby="modal-profile"
      aria-hidden="true">
      <div class="modal-dialog" role="employee">
        <div class="modal-content">
          <div class="modal-header bg-primary"><i class="fas fa-user-tag text-white fa-lg mr-2 mt-1"></i>
            <h5 class="modal-title text-white" id="ModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="text-white">&times;</span>
            </button>
          </div>
          <div v-if="profile" class="modal-body">
            <div class="row">     
              <div class="col-lg-12 col-md-12 mb-lg-0 mb-5">
                <div class="avatar mx-auto white">
                  <img src="../../img/confi.png" class="rounded-circle img-fluid" style=" border: 2px solid #aaa;">
                </div>
                <div class="card-body">
                  <div class="col-md-12" style="margin-top: 3rem">
                     <h4 class="font-weight-bold text-center mb-4"><span id="name">{{ profile.name }}</span></h4>
                     <div v-if="profile.document_type">
                      <i class="fas fa-id-card text-primary fa-lg" title="Documento de identidad."></i> <span class="font-weight-bold mt-3">{{ profile.document_type.option }}</span>-<span class="font-weight-bold mt-3">{{ profile.ci }}</span> 
                     </div>
                  </div>
                <hr>
                <div class="col-md-12" style="margin-top: 1.5rem">
                  <div v-if="profile.code_phone" class="">
                      <i class="fas fa-phone-square text-primary fa-lg" title="Número de teléfono"></i> <span class="font-weight-bold">{{ profile.code_phone.option }}</span>-<span class="font-weight-bold">{{ profile.phone }}</span>
                  </div>
                </div>
                <hr>
                  <div class="col-md-12" style="margin-top: 1.5rem">
                    <p class="dark-grey-text "><i class="fas fa-envelope text-primary fa-lg" title="Correo electrónico"></i> <span class="font-weight-bold">{{ profile.email }}</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
      </div>
    </div>
</div>
</template>
<script>
import axios from 'axios';
export default {
  props: ["profile"],
};
</script>
