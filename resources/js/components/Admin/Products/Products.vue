<template>
  <div>
    <section class="hami-price-plan-area section-padding-100-0">
      <div class="container">
          <div class="row">
              <div class="col-12">
                <div class="section-heading text-center">
                  <h2>Products</h2>
                </div>
              </div>
          </div>
          <div class="row justify-content-center">
            <span v-for="product in products" :key="product.id">
              <div class="col-12 col-md-6">
                <product :product="product" />
                <br>
              </div>
            </span>
          </div>
      </div>
    </section>
  </div>
</template>

<script>

import Product from './Product'

export default {

  components: {
    Product
  },

  props: {
    products: {
      type: Array,
      required: true
    }
  },

  methods: {
    addProduct() {
      console.log("the add product")
    }
  }
}
</script>