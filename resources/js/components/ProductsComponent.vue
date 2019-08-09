<template>
  <div>
    <div v-if="category_id">
      <h3>
        Products for category
        <span v-if="category">{{category.name}}</span>
      </h3>
      <div class="row">
        <div class="card mb-3 ml-3" v-for="product in products" :key="product.id">
          <div class="card-body d-flex justify-content-center">
            <div v-lazy-container="{ selector: 'img' }">
              <img :data-src="product.image_url" data-loading="/images/loader.gif" />
            </div>
          </div>
          <div class="card-footer d-flex justify-content-between">
            {{product.name}}
            <router-link :to="`/product/${product.id}`" title="View product">
              <font-awesome-icon icon="edit" />
            </router-link>
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <h3>Please select category</h3>
    </div>
  </div>
</template>
<script>
export default {
  computed: {
    category_id() {
      return this.$route.params.id;
    }
  },
  data() {
    return {
      products: [],
      category: null
    };
  },
  mounted() {
    console.log("mounted");
  },
  created() {
    this.init(this.category_id);
  },
  watch: {
    "$route.params.id"() {
      this.init(this.category_id);
    }
  },
  methods: {
    async getProductsForCategory(category_id) {
      const url = `/api/products/${category_id}`;
      const { data } = await this.$axios.get(url);
      this.products = data;
    },
    async getCategoryInfo(category_id) {
      const url = `/api/category/${category_id}`;
      const { data } = await this.$axios.get(url);
      this.category = data;
    },
    init(category_id) {
      if (!category_id) return;
      this.getProductsForCategory(category_id);
      this.getCategoryInfo(category_id);
    }
  }
};
</script>
<style scoped>
.fa-edit {
  cursor: pointer;
}
.card {
  width: 30%;
}
</style>

