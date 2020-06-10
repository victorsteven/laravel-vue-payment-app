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
                      Customer Name
                  </td>

                  <td>
                      Item Name
                  </td>

                  <td>
                      Reference
                  </td>

                  <td>
                      Status
                  </td>
                   <td>
                      Frequency
                  </td>
              </tr>
              </thead>
              <tbody>
                  <tr v-for="(transaction, index) in transactions" :key="index">
                      <td>{{ index+1 }}</td>
                      <td>{{ transaction.user.name }}</td>
                      <td>{{ transaction.item.title }}</td>
                      <td>{{ transaction.refrence_code }}</td>
                      <!-- <td><span style="color:{{ $transaction->status == 'success' ? 'green' : 'red' }};"><b>{{ ucfirst($transaction->status) }}</b></span></td> -->
                      <!-- <td>{{ transaction.frequency }}</td> -->
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</template>