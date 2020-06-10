<template>

  <div>
    <div class="container">
      <div class="d-flex justify-content-between mb-3">
        <add-product></add-product>
        
      </div>
    </div>
   
    <statistics :stat="stat" />
    <products :products="products" />
  </div>
  
</template>


<script>

import Statistics from './Statistics'
import AddProduct from './Products/AddProduct'
import Products from './Products/Products'

export default {
  
  components: {
    Statistics, Products
  },

  props: {
    stat: {
      type: Object,
      required: true
    },
    products: {
      type: Array,
      required: true
    }
  }
}

</script>