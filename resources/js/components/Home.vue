<template>
  <div class="row">
      <div class="col-md-4" v-for="producto in productos" :key="producto.id">
          <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title mb-0">{{ producto.nombre }}</h3>
                      </div>

                      <div class="col-md-4">
                          <span v-if="producto.estado == 'activo'" class="badge bg-success">{{ producto.estado }}</span>
                          <span v-if="producto.estado == 'inactivo'" class="badge bg-danger">{{ producto.estado }}</span>
                      </div>
                  </div>
                  <p class="card-text">{{ producto.descripcion }}</p>
                  <p>Bodega: <span class="text-primary font-weight-bold">{{ producto.nombreBodega }}</span></p>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'home',
    data() {
        return {
            productos: [],
            color: '',
        }
    },
    created() {
        this.mostrarProductos()
    },
    methods: {
        async mostrarProductos() {
            await this.axios.get('/api/productos').then(res => {
                this.productos = res.data;
                console.log(res.data);
            })
        }
    },
}
</script>

<style>

</style>