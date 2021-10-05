<template>
  <main>
      <nav class="navbar navbar-light bg-dark">
          <div class="container-fluid">
              <router-link class="navbar-brand text-white" :to="{name: 'home'}">
                  <img src="https://laravel.com/img/logomark.min.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                  ProductMarket
              </router-link>

              <router-link class="text-white nav-link" :to="{name: 'mostrarProductos'}">Productos</router-link>
          </div>
      </nav>
      <div class="container mt-4">
          <router-view></router-view>
      </div>
  </main>
</template>

<script>
export default {

}
</script>

<style>

</style>