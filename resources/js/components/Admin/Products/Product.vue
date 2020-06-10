<template>
<div>
    <div class="card" style="width: 18rem;">
      <img :src="`/images/${product.image_path}`" class="card-img-top" alt="..." style="height: 150px;">
      <div class="card-body">
        <a :href="`/payfor/${product.slug}`">
          <h5 class="card-title">{{ product.title }}</h5>
          <p class="card-text">{{ reduceString(product.description) }}</p>
          <h5 class="card-title">{{ (product.price).toLocaleString() }}</h5>
        </a>
        <edit-product :product="product"></edit-product>
      </div>
    </div>
</div>
  
</template>


<script>

import EditProduct from './EditProduct'

export default {
  
  props: {
    product: Object,
    required: true
  },

  components: {
    EditProduct,
  },


  methods: {
    view() {
      console.log("the view")
    },

    edit() {
      console.log("the edit")
    },

    reduceString(str) {
      if(str) {
        let count = 20
        if ((str === null) || (str === ''))
            return false;
        else
        str = str.toString();
        return str.slice(0, count) + (str.length > count ? "..." : "");
      }
    }
  }
}
</script>