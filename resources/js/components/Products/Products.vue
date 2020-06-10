<template>
    <div>
      <div class="row row-style">
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

    data: () => ({
        loading: false
    }),
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
  .preloader-background {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #fff;
    position: fixed;
    z-index: 999;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
  }
  .preloader-background.p {
    padding-top:120px;
    margin-left: -60px;
    opacity: 0.8;
  } 
  .blinking {
      animation: blinker 1.5s linear infinite;
  }
  @keyframes blinker {  
    50% { opacity: 0; }
  }
</style>