<template>
    <div>

     
      <div class="row row-style" v-if="products.length > 0">
        <span v-for="product in products" :key="product.id">
          <div class="col-12 col-md-4">
            <a :href="`/payfor/${product.slug}`">
              <div class="card card-style">
                <img :src="`/images/${product.image_path}`" class="card-img-top" alt="..." style="height: 200px;">
                <div class="card-body">
                  <h5 class="card-title">{{ reduceTitle(product.title) }}</h5>
                  <h5 class="card-title">&#8358; {{ (product.price).toLocaleString() }}</h5>
                </div>
              </div>
            </a>
          </div>
        </span>
      </div>
       <div class="preloader-background" v-else>
        <p class="blinking" style="font-size: 40px; color: #304ffe">Loading...</p>
      </div>
    </div>
</template>



<script>

export default {

    props: {
      products: {
        type: Array,
        required: true
      }
    },
}

</script>

<style scoped>

  .card-style {
    width: 22rem;
    margin-bottom: 25px;
  }

  @media (max-width: 768px) {
    .card-style {
      width: 100%;
    }

    .row-style {
      padding: 15px;
    }
  }
</style>