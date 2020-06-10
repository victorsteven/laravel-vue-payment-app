<template>
<div>
    <div class="card" style="width: 18rem;">
      <img :src="`/images/${product.image_path}`" class="card-img-top" alt="..." style="height: 150px;">
      <div class="card-body">
        <a :href="`/payfor/${product.slug}`">
          <h5 class="card-title">{{ reduceTitle(product.title) }}</h5>
          <p class="card-text">{{ reduceString(product.description) }}</p>
          <h5 class="card-title">&#8358; {{ (product.price).toLocaleString() }}</h5>
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
}

</script>