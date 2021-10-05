<template>
  <div class="container-fluid">
      <h1 class="text-center mb-4 d-inline-block">Gestionar productos</h1>
      <div class="float-right">
          <router-link class="btn btn-info text-white" :to="{name: 'crearProducto'}">Agregar</router-link>
      </div>

      <div class="row mb-4 mr-auto">
          <div class="col-md-6">
              <form class="d-flex" @submit.prevent="buscar">
                  <input class="form-control me-2" type="search" placeholder="Busca el nombre" aria-label="Search" v-model="busqueda.nombre">
                  <button class="btn btn-outline-success" type="submit">Buscar</button>
              </form>
          </div>
          <div class="col-md-6">
              <div class="float-right d-flex">
                  <div class="form-check mx-5 mt-2">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="todos" v-model="radio" value="todos" @change="filtro($event)">
                      <label class="form-check-label" for="todos">
                          Todos
                      </label>
                  </div>
                  <div class="form-check mt-2">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="activo" v-model="radio" value="activo" @change="filtro($event)">
                      <label class="form-check-label" for="activo">
                          Activo
                      </label>
                  </div>
                  <div class="form-check ml-5 mt-2">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="inactivo" value="inactivo" v-model="radio" @change="filtro($event)">
                      <label class="form-check-label" for="inactivo">
                          Inactivo
                      </label>
                  </div>
              </div>
         </div>
      </div>

      <table class="table table-dark table-striped">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Bodega</th>
                  <th>Estado</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="producto in productos" :key="producto.id">
                  <td>{{ producto.id }}</td>
                  <td>{{ producto.nombre }}</td>
                  <td>{{ producto.descripcion }}</td>
                  <td>{{ producto.nombreBodega }}</td>
                  <td>
                      <span class="badge bg-success text-white">{{ producto.estado }}</span>
                  </td>
                  <td>
                      <router-link :to="{name: 'editarProducto', params:{id: producto.id}}" class="btn btn-warning">
                          <i class="fas fa-edit"></i>
                      </router-link>
                      <button class="btn btn-danger" @click="eliminarProducto(producto.id, producto.nombre)">
                          <i class="fas fa-trash"></i>
                      </button>
                  </td>
              </tr>
          </tbody>
      </table>
  </div>
</template>

<script>
export default {
    name: 'mostrarProductos',
    data() {
        return {
            productos: [],
            busqueda: {
                nombre: ''
            },
            radio: ''
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
        },
        async buscar() {
            if(this.busqueda.nombre == ''){
                alert('Llena la busqueda')
                this.mostrarProductos()
            }else {
                const params = {
                    dato: this.busqueda.nombre.toLowerCase()
                }

                await this.axios.post('/api/buscar', params).then(res => {
                    this.productos = res.data
                    console.log(res.data);
                })
            }
        },
        async filtro(e) {
            const params = {
                filtro: e.target.value.toLowerCase()
            }

            await this.axios.post('/api/filtro', params).then(res => {
                this.productos = res.data
                console.log(res.data);
            })
        },
        async eliminarProducto(id, nombre) {
            if (confirm(`¿Esta seguro que desea eliminar el producto: ${nombre}?`)) {
                await this.axios.delete(`/api/productos/${id}`).then(res => {
                    this.mostrarProductos()
                })
            }
        }
    }
}
</script>

<style>

</style>