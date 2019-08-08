<template>
  <div>
    <b-menu>
      <b-menu-list label="Categories">
        <div v-for="category in categories" :key="category.id">
          <tree-menu :children="category.children" :label="category.name" :category_id="category.id"></tree-menu>
        </div>
      </b-menu-list>
    </b-menu>
  </div>
</template>
<script>

import TreeMenu from "./TreeMenuComponent";

export default {
  components: {
    TreeMenu
  },
  data() {
    return {
      categories: []
    };
  },
  mounted() {
    this.getCategoriesTree();
  },
  methods: {
    async getCategoriesTree() {
      const url = "/api/categories/tree";
      const { data } = await this.$axios.get(url);
      this.categories = data;
    }
  }
};
</script>