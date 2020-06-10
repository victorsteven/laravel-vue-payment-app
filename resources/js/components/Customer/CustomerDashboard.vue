<template>
   <div class="row">
      <div class="table-responsive">
          <table class="table">
              <thead>
              <tr>
                  <td>
                      S/N
                  </td>

                  <td>
                      Product Title
                  </td>

                  <td>
                      Amount
                  </td>

                  <td>
                      Reference
                  </td>
              </tr>
              </thead>
              <tbody>
                  <tr v-for="(transaction, index) in transactions" :key="index">
                      <td>{{ index+1 }}</td>
                      <td>{{ transaction.product.title }}</td>
                      <td>₦ {{ transaction.product.price }}</td>
                      <td>{{ transaction.refrence_code }}</td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</template>

<script>
export default {
  
  props: {
    transactions: {
      type: Array,
      required: true
    }
  }
}
</script>