<template>
<div>
  <section class="hami-price-plan-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h3>Payment Processed!</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="single-price-plan mb-50">
                      <div class="price-plan-title">
                          <h4>{{ product.title }}</h4>
                      </div>
                      <div class="price-plan-value">
                          <h2>&#8358; {{ (product.price).toLocaleString() }}</h2>
                      </div>
                      <div class="price-plan-desc">
                        <div class="text-center">
                            <p>
                                {{ product.description }}
                            </p>
                        </div>
                        <div class="row justify-content-center" style="margin-top: -60px;">
                          
                            <div class="col-12 col-lg-8">
                                <div class="hami-contact-form mt-80 mb-30 text-center">
                                    <h1 style="font-size: 10rem;color: green;" class="icon_box-checked"></h1>
                                    <p>Payment Completed Successfully!</p>
                                </div>
                            </div>
                        </div>
                      </div>
                      <!-- <div>
                        <a href="#" @click="processpayment" class="btn view-all-btn mb-2">Click here to see your Receipt.</a>
                      </div> -->
                    </div>
                </div>
            </div>
          <div class="row justify-content-center">
            <recurring-payment :product="product"></recurring-payment>
          </div>

        </div>

    </section>

    </div>
</template>

<script>
export default {
  props: {
    product: {
      type: Object,
      required: true
    },
    transaction: {
      type: Object,
      required: true
    }
  },

  methods: {
    // async processpayment() {

    //   try {
        
    //     const result = axios.post(`/processpayment/${transaction.id}`)

    //   } catch(error) {
    //     console.log("the error processing payment: ", error)
    //   }
    // }
  }
}
</script>