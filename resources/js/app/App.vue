<template>
  <div>
    <HeaderComponent/>
    <router-view/>
    <!-- oppure 
    <router-view></router-view> -->
  </div>
</template>

<script>
import HeaderComponent from '../components/HeaderComponent.vue'

export default {
    name: 'AppComponent',
    components: { HeaderComponent },
}
</script>

<style>

</style>