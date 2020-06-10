<template>
  
  <div>
    <button @click="openEditModal(product.id)" class="btn hami-btn btn-3 mt-15">Edit</button>
      <div class="modal fade" :id="'editProduct' + product.id" role="dialog" style="display: none;">
          <form @submit.prevent="updateProduct" class="ajax gf" enctype="multipart/form-data">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header text-center">
                        <h3 class="modal-title">
                          <i class="ico-calendar"></i>
                          Edit Product
                        </h3>
                        <button @click="closeModal(product.id)" class="close" data-dismiss="modal" type="button">&times;</button>
                      </div>
                      <div class="modal-body">
                          <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label">Product Title</label>
                                  <input :class="{ 'errorClass' : titleError }" class="form-control" placeholder="Enter Product Title"
                                          type="text" v-model="title">
                                  <small class="text-danger">{{ titleError }}</small>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Price</label>
                                  <input :class="{ 'errorClass' : priceError }" class="form-control" placeholder="Enter Product Price"
                                          type="number" v-model="price">
                                  <small class="text-danger">{{ priceError }}</small>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Description</label>
                                  <textarea class="form-control mb-20" :class="{ 'errorClass' : descriptionError }" rows="5" placeholder="Item Description" v-model="description" required></textarea>
                                  <small class="text-danger">{{ descriptionError }}</small>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Product Image</label>
                                    <div class="custom-file">
                                      <input accept="image/*" type="file" class="custom-file-input" id="customFile" name="product_image" ref="file" :class="{ 'errorClass' : imageError }" @change="onChangeFileUpload">
                                      <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <div>
                                      <div :class="{ 'hideIt' : hideImage }">
                                        <img  :src="showImage" alt="product image" style="width: 100%; height: 220px;">
                                      </div>
                                    </div>
                                    <div v-if="product_image_display && visibleFile">
                                      <img :src="getProfilePhoto()" class="img-thumbnail" alt="event image" style="width: 100%; height: 220px;">
                                    </div>
                                    <small class="text-danger">{{ imageError }}</small>
                                </div>
                              </div>
                          </div>
                      </div>
                      <div v-if="success" class="alert success">
                        Successfully updated
                      </div>
                      <div class="modal-footer">
                          <span class="uploadProgress"></span>
                          <button :disabled="disabled" type="submit" class="btn hami-btn btn-3 mt-15" v-if="!loading">Update Product</button>
                          <button :disabled="disabled" type="button" class="btn hami-btn btn-3 mt-15" v-if="loading">Updating..</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  </div>

</template>

<script>
export default {

  props: {
    product: {
      type: Object,
      required: true
    }
  },

  data() {
    return {
      product_image_display: '',
      product_image: '',
      loading: false,
      errorMessages: '',
      description: '',
      title: '',
      price: '',
      success: false,
      hideImage: false,
      selectedId: ''
    }
  },

  computed: {
    titleError() {
        return this.errorMessages['title'] ? this.errorMessages['title'][0] : ''
    },
      priceError() {
        return this.errorMessages['price'] ? this.errorMessages['price'][0] : ''
    },
    descriptionError() {
        return this.errorMessages['description'] ? this.errorMessages['description'][0] : ''
    },
    imageError() {
        return this.errorMessages['event_image'] ? this.errorMessages['event_image'][0] : ''
    },
    visibleFile() {
        return this.$refs.file.files[0] !== ''
    },
    showImage() {
      return `/images/${this.product.image_path}`
    },
     disabled() {
      return this.loading || this.title === '' || this.price === '' || this.description === ''
    }
  },

  mounted() {
    console.log("the prod: ", this.product)
    this.description = this.product.description
    this.title = this.product.title
    this.price = this.product.price
  },
  
  methods: {

    onChangeFileUpload(e) {

        this.hideImage = true

        this.product_image = this.$refs.file.files[0];
        let file = this.$refs.file.files[0];
        let reader = new FileReader();
        reader.onloadend = (file) => {
            this.product_image_display = reader.result;
        };
        reader.readAsDataURL(file);
    },

    openEditModal(id) {
      $("#editProduct" + id).modal('show');
    },

    closeModal(id) {
      $("#editProduct" + id).hide();
    },

    getProfilePhoto() {

      // if (this.product_image_display.length > 200) {
          return this.product_image_display;
      // }
    },

    updateProduct() {

      console.log("the data to send: ", this.title)

      this.loading = true;

      let formData = new FormData();
      formData.append('image_path', this.product_image);
      formData.append('title', this.title);
      formData.append('description', this.description);
      formData.append('price', this.price);
      formData.append('mark', "hjsbdjfhsdjhf");


      axios.post(`/products/update/${this.product.id}`, formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then(res => {
          if (res.status === 200) {
            this.success = true  
            setTimeout(() => {
                  window.location.href = window.origin + `/dashboard`
              }, 1000)
          } 
      }).catch(error => {
          this.loading = false;
          this.errorMessages = error.response.data.errors;
      });
    },
  }
}
</script>

<style scoped>

.hideIt {
  display: none;
}

.errorClass {
  border: 1px solid red;
}

.success {
  border: 1px solid green;
}

.style-modal {
  background: #fff;
  padding: 10px;
  border-radius: 10px solid;
}
.style-content {
  padding: 20px;
}

@media (min-width: 768px) {
  .style-modal {
    width: 50%;
  }
}

.alert {
  width: 90%;
  margin: 2rem auto;
  border-radius: 2px;
  color: #000;
  background-color: #fff;
  padding: 0.5rem;
  text-align: center;
  animation-duration: 2s;
  animation-name: moveInBottom;
}

@keyframes moveInBottom {
  0% {
    opacity: 0;
    transform: translateY(3rem);
  }
  100% {
    opacity: 1;
    transform: translate(0);
  }
}

</style>