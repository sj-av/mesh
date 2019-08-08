<template>
  <div v-if="product_loaded">
    <h3>Product view: {{product.name}}</h3>
    <div class="form-group">
      <img :src="product.image_url" :alt="product.name" class="product-image" />
    </div>
    <div class="form-group">
      <label for="product-category">Category</label>
      <select v-model="product.category_id" id="product-category" class="form-control">
        <option
          v-for="category in categories"
          :key="category.id"
          :value="category.id"
        >{{category.name}}</option>
      </select>
    </div>
    <div class="form-group">
      <label for="product-name">Product name</label>
      <input
        v-model="product.name"
        id="product-name"
        type="text"
        class="form-control"
        placeholder="Type product name"
      />
    </div>
    <div class="form-group">
      <label for="product-description">Product description</label>
      <textarea
        v-model="product.description"
        id="product-description"
        class="form-control"
        placeholder="Type product description"
        rows="10"
      ></textarea>
    </div>
    <div class="form-group">
      <button @click="saveProduct(product_id)" class="btn btn-success">Save</button>
    </div>
  </div>
</template>
<script>
export default {
  computed: {
    product_id() {
      return this.$route.params.id;
    }
  },
  data() {
    return {
      product: null,
      product_loaded: false,
      categories: []
    };
  },
  mounted() {},
  created() {
    this.getProduct(this.product_id);
    this.getCategories();
  },
  beforeRouteUpdate(to, from, next) {
    this.getProduct(to.params.id);
  },
  methods: {
    async getProduct(product_id) {
      this.product_loaded = false;
      const url = `/api/product/${product_id}`;
      const { data } = await this.$axios.get(url);
      this.product = data;
      this.product_loaded = true;
    },
    async saveProduct(product_id) {
      const url = `/api/product/${product_id}`;
      try {
        const { data } = await this.$axios.post(url, this.product);
        if (data.success) {
          return this.$buefy.toast.open({
            message: "Successfully updated",
            type: "is-success",
            position: "is-bottom"
          });
        }
        throw new Error("Update failed");
      } catch (e) {
        return this.$buefy.toast.open({
          message: "Update failed",
          type: "is-danger",
          position: "is-bottom"
        });
      }
    },
    async getCategories() {
      const url = `/api/categories/list`;
      const { data } = await this.$axios.get(url);
      this.categories = data;
    }
  }
};
</script>
<style>
.product-image {
  min-width: 320px;
  min-height: 240px;
}
</style>

