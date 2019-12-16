<template>
  <div class="card" v-bind:class="defineCor">
    <div class="card-header">{{titulo}}</div>

            <div class="card-body">
          <slot></slot>
      </div>
  </div>
</template>

<script>
    export default {
        props:['titulo','cor'],
        computed:{
            defineCor: function(){
                return "panel "+ (this.cor || "bg-light");
            }
        }
    }
</script>
<style media="screen">
.blue {
    border-color: rgb(226, 204, 7);
}
.blue > .panel-heading {
    color: #fff;
    background-color: rgba(233, 193, 17, 0.966);
    border-color: rgba(219, 206, 18, 0.952);
}


</style>

