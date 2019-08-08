<template>
  <b-menu-item
    icon="settings"
    :label="label"
    expanded
    tag="router-link"
    :to="`/products/${category_id}`"
  >
    <tree-menu
      v-for="child in children"
      :key="child.id"
      :children="child.children"
      :label="child.name"
      :category_id="child.id"
    ></tree-menu>
  </b-menu-item>
</template>
<script>
export default {
  props: ["category_id", "label", "children"],
  name: "tree-menu",
  methods: {
    
  }
};
</script>
