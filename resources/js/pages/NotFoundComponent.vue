<template>
  <div class="container">
      <div class="row text-center">
          <div class="col-12">
                <h1>
                    404 | Not Found
                </h1> 
                <p>
                    <!-- <router-link :to="'/'">back to home</router-link> -->
                    <router-link :to="{ name: 'home' }">back to home</router-link>
                </p>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'NotFoundComponent'
}
</script>

<style>

</style>