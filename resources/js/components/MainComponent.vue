<template>
  <div>
    <nav class="navbar navbar-dark bg-dark">
      <h3>
        <router-link class="text-white" to="/">Product viewer</router-link>
      </h3>
    </nav>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-3">
          <categories-component ref="categories"></categories-component>
        </div>
        <div class="col-md-9">
          <transition name="fade" mode="out-in">
            <router-view :key="$route.fullPath"></router-view>
          </transition>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {}
};
</script>

<style>
.fade-enter-active,
.fade-leave-active {
  transition-duration: 0.3s;
  transition-property: opacity;
  transition-timing-function: ease;
}

.fade-enter,
.fade-leave-active {
  opacity: 0;
}
</style>

