<template>
    <section class="hami-price-plan-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                      <h3>You are about to make a Payment</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
              <div class="card mb-3" style="width: 70%">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img :src="`/images/${product.image_path}`" class="card-img-top" alt="..." style="height: 250px;">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ product.title }}</h5>
                      <p class="card-text">{{ product.description }}</p>
                      <h2><span>&#8358;</span>{{ (product.price).toLocaleString() }}</h2>
                      <button @click="checkTransaction" type="submit" class="btn hami-btn btn-3 mt-15">Continue to Payment</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
</template>

<script>

export default {

  props: {
    product: {
      type: Object,
      required: true
    }
  },

  methods: {

    async checkTransaction() {
      try {
        const res = await axios.post(`/products/invoice/${this.product.id}`)
        if(res.data.redirectUrl) {
          window.location.href = res.data.redirectUrl
        }
      } catch(err) {
        console.log("this is the error getting the user: ", err)
      }
    },
  }
}

</script>

<style>

</style>