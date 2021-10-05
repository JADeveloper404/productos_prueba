<template>
  <div class="container-fluid">
      <h1 class="text-center">Editar Producto</h1>

      <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" id="nombre" v-model="producto.nombre" class="form-control">
              </div>
              <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="2" v-model="producto.descripcion"></textarea>
              </div>
              <div class="form-group">
                  <label for="bodega">Bodega</label>
                  <select class="form-select form-control" aria-label="Default select example" v-model="producto.id_bodega">
                      <!-- <option selected disabled>Seleccione una bodega</option> -->
                      <option :value="bodega.id" v-for="bodega in bodegas" :key="bodega.id">{{ bodega.nombre }}</option>
                  </select>
              </div>

              <div class="form-group">
                  <button class="btn btn-primary" @click="guardar">Guardar</button>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'crearProducto',
    data() {
        return {
            producto: {
                nombre: '',
                descripcion: '',
                id_bodega: 0,
                estado: 'activo',
            },
            bodegas: []
        }
    },
    mounted() {
        this.cargar()
    },
    methods: {
        async cargar() {
            await this.axios.get(`/api/productos/${this.$route.params.id}/edit`).then(res => {
                this.bodegas = res.data.bodegas
                this.producto.nombre = res.data.producto.nombre
                this.producto.descripcion = res.data.producto.descripcion
                this.producto.id_bodega = res.data.producto.id_bodega

                console.log(res.data);
            })
        },
        async guardar() {
            await this.axios.put(`/api/productos/${this.$route.params.id}`, this.producto).then(res => {
                this.$router.push({name: 'mostrarProductos'})
                console.log(res.data);
            })
        }
    }
}
</script>

<style>

</style>