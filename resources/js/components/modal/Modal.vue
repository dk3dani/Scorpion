<template>

<div class="modal fade" v-bind:id="nome"  role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >{{titulo}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <slot></slot>
      </div>
      <div class="modal-footer">
            <slot name="addbutton"></slot>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>

      </div>
    </div>
  </div>
</div>

</template>




<script>
    export default {
      props:['nome','titulo']

    }
</script>
