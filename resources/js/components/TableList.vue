<template>
  <div>
    <div class="row form-inline">
      <div class="col-3">
        <a v-if="criar && !modal" v-bind:href="criar">Criar</a>
        <modallink v-if="criar && modal" tipo="button" nome="meumodal" titulo="Criar" css></modallink>
      </div>
      <div class="col-3 ml-auto">
        <input type="search" class="form-control" placeholder="Buscar" v-model="buscar" />
      </div>
    </div>
    <table class="table table-dark table-striped table-hover">
      <thead>
        <tr>
          <th
            style="cursor:pointer"
            v-on:click="ordenaColuna(index)"
            v-for="(titulo, index) in titulos"
          >{{titulo}}</th>

          <th v-if="detalhe || editar || deletar">Ação</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item,index) in lista">
          <td v-for="i in item">{{i}}</td> 

          <td v-if="detalhe || editar || deletar">
            <form
              v-bind:id="index"
              v-if="deletar && token"
              v-bind:action="deletar+ item.id"
              method="post"
            >
              <input type="hidden" name="_method" value="DELETE" />
              <input type="hidden" name="_token" v-bind:value="token" />

              <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
              <modallink
                v-if="detalhe && modal"
                v-bind:item="item"
                v-bind:url="detalhe"
                tipo="button"
                nome="detalhe"
                titulo=" Detalhe "
                css=" btn btn-success"
              ></modallink>

              <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
              <modallink
                v-if="editar && modal"
                v-bind:item="item"
                v-bind:url="editar"
                tipo="button"
                nome="editar"
                titulo="Editar "
                css
              ></modallink>

              <a href="#" class="btn btn-danger" v-on:click="executaForm(index)">Deletar</a>
            </form>
            <span v-if="!token">
              <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
              <modallink
                v-if="detalhe && modal"
                v-bind:item="item"
                v-bind:url="detalhe"
                tipo="button"
                nome="detalhe"
                titulo=" Detalhe "
                css
              ></modallink>

              <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
              <modallink
                v-if="editar && modal"
                v-bind:item="item"
                v-bind:url="editar"
                tipo="button"
                nome="editar"
                titulo="Editar "
                css
              ></modallink>
              <a v-if="deletar" v-bind:href="deletar">Deletar</a>
            </span>
            <span v-if="token && !deletar">
              <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhe |</a>
              <modallink
                v-if="detalhe && modal"
                v-bind:item="item"
                v-bind:url="detalhe"
                tipo="button"
                nome="detalhe"
                titulo=" Detalhe"
                css
              ></modallink>

              <a v-if="editar && !modal" v-bind:href="editar">Editar</a>
              <modallink
                v-if="editar && modal"
                v-bind:item="item"
                v-bind:url="editar"
                tipo="button"
                nome="editar"
                titulo="Editar"
                css
              ></modallink>
              <a v-if="test" href="#">Test</a>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: [
    "titulos",
    "itens",
    "ordem",
    "ordemcol",
    "criar",
    "detalhe",
    "editar",
    "deletar",
    "token",
    "modal"
  ],
  data: function() {
    return {
      buscar: "",
      ordemAux: this.ordem || "asc",
      ordemAuxCol: this.ordemcol || 0
    };
  },
  methods: {
    executaForm: function(index) {
      Swal.fire({
        title: "Voce deseja Excluir?",
        text: "Você não poderá reverter isso!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#008000",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Sim, Eu quero deletar"
      }).then(result => {
        if (result.value) {
          document.getElementById(index).submit();
          Swal.fire("Deletado!", "Seu registro foi deletado.", "success");
        }
      });
    },
    ordenaColuna: function(coluna) {
      this.ordemAuxCol = coluna;
      if (this.ordemAux.toLowerCase() == "asc") {
        this.ordemAux = "desc";
      } else {
        this.ordemAux = "asc";
      }
    }
  },
  filters: {
    formataData: function(valor) {
      if (!valor) return "";
      valor = valor.toString();
      if (valor.split("-").length == 3) {
        valor = valor.split("-");
        return valor[2] + "/" + valor[1] + "/" + valor[0];
      }

      return valor;
    }
  },
  computed: {
    lista: function() {
      let lista = this.itens.data;
      let ordem = this.ordemAux;
      let ordemCol = this.ordemAuxCol;
      ordem = ordem.toLowerCase();
      ordemCol = parseInt(ordemCol);

      if (ordem == "asc") {
        lista.sort(function(a, b) {
          if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {
            return 1;
          }
          if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) {
            return -1;
          }
          return 0;
        });
      } else {
        lista.sort(function(a, b) {
          if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) {
            return 1;
          }
          if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) {
            return -1;
          }
          return 0;
        });
      }

      if (this.buscar) {
        return lista.filter(res => {
          res = Object.values(res);
          for (let k = 0; k < res.length; k++) {
            if (
              (res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >=
              0
            ) {
              return true;
            }
          }
          return false;
        });
      }

      return lista;
    }
  }
};
</script>



