<template>
  <section class="hami-features-area bg-gray section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Overall Stats</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-feature-area d-flex mb-50">
                    <div class="feature-icon">
                        <i class="icon_wallet"></i>
                    </div>
                    <div class="feature-text">
                        <h5>&#8358; {{ stat.revenue }}</h5>
                        <p>Revenue</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-feature-area d-flex mb-50">
                    <div class="feature-icon">
                        <i class="icon_briefcase_alt"></i>
                    </div>
                    <div class="feature-text">
                        <h5>{{ stat.transactions }}</h5>
                        <p>{{ stat.transactions > 1 ? 'Transactions' : 'Transaction' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-feature-area d-flex mb-50">
                    <div class="feature-icon">
                        <i class="icon_archive_alt"></i>
                    </div>
                    <div class="feature-text">
                        <h5>{{ stat.products }}</h5>
                        <p>{{ stat.products > 1 ? 'Products' : 'Product' }}</p>
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
    stat: {
      type: Object,
      required: true
    }
  }
}
</script>