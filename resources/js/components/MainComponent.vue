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
          <router-view></router-view>
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
