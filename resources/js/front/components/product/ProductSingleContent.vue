<template>
    <div>
        <div>
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="row gx-4 gx-lg-5 ">
                        <div class="col-md-6">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img :src="'/storage/media/' + product.main_image.path + '.' + product.main_image.format"
                                            class="d-block w-100" alt="image">
                                    </div>
                                    <div v-for="img in product.attachments" class="carousel-item">
                                        <img :src="'/storage/media/' + img.path + '.' + img.format" class="d-block w-100"
                                            alt="image">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" style="margin-left: -25px" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"
                                        style="background-color: #c7009d; border-radius:8px"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" style="margin-right: -25px" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"
                                        style="background-color: #c7009d; border-radius:8px"></span>
                                    <span class="visually-hidden ">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>{{ product.title }} </h4>
                            <!-- <strong>Կոդ։ </strong> -->
                            <!-- <span>{{ product.sku }}</span> -->
                            <div class="fs-5 mb-5">
                                <!-- <span class="text-decoration-line-through">{{ product.price }} դր․</span> -->
                                <span>{{ product.sale_price }} դր․</span>
                            </div>
                            <div>
                                <p>Չափս</p>
                                <!-- <div v-if="product.sizes.length > 0" class="btn-group sizes ">
                                    <div class="ad" v-for="size in product.sizes">
                                        <input @click="addSize(size.size)" type="radio" :value="size.size" class="btn-check ad" :id="size.size" name="size">
                                        <label class="btn btn-default ad" :for="size.size">{{ size.size }}</label>
                                    </div>
                                </div> -->
                            <add-to-cart-btn-large :prop-product='product'></add-to-cart-btn-large>

                            </div>
                            <div class="d-flex">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Կոդ։</li>
                                    <li class="list-group-item">Զեղչի տոկոս</li>
                                    <li class="list-group-item">Հասցե</li>
                                    <li class="list-group-item">Առաքում</li>
                                    <li class="list-group-item">And a fifth one</li>
                                </ul>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ product.sku }}</li>
                                    <li class="list-group-item">A second item</li>
                                    <li class="list-group-item"> Ք․Երևան Արտաշեսյան 39</li>
                                    <li class="list-group-item">Անվճար</li>
                                    <li class="list-group-item">And a fifth one</li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <related-products :product="product"></related-products>
        </div>
    </div>
</template>


<script>
import { mapActions } from "vuex";
import UpsellProducts from "./UpsellProducts";
import { ref } from 'vue';

import mapCartItem from "../../../services/map-cart-item";

export default {
    components: { UpsellProducts },
    props: ['product', 'img', 'attachments'],
    data() {
        return {
            checkedSize: '',
        }
    },

    methods: {
        ...mapActions(["addToCart"]),
        addSize(size) {
            this.checkedSize = size;
            console.log(this.checkedSize)
            // return  {size: this.size}
        }
    }


    // methods: {
    //     ...mapActions(['storeLastSeenItem']),
    //     onBackClick() {
    //         location.href = document.referrer || '/'
    //     }
    // },
    // computed: {
    //     product() {
    //         return this.propProduct
    //     },
    //     categoryTrees() {
    //         const categoryTrees = [];

    //         for (let i = 0; i < this.product.categories.length; i++) {
    //             const category = this.product.categories[i];
    //             const categoryTree = [
    //                 category,
    //                 category?.parent,
    //                 category?.parent?.parent,
    //                 category?.parent?.parent?.parent,
    //             ]
    //             categoryTrees.push(categoryTree.reverse().filter(i => i));
    //         }
    //         return categoryTrees
    //     },
    //     attributes() {
    //         const attributes = []

    //         for (let i = 0; i < this.product.attributes.length; i++) {
    //             attributes.push({
    //                 ...this.product.attributes[i],
    //                 ...{ selected: this.product.attribute_options.find(item => item.attribute_id === this.product.attributes[i].id) }
    //             })
    //         }

    //         return attributes.filter(i => i.selected)
    //     }
    // }
}
</script>

<style scoped>
.add-btn {
    padding: 0;
}

/* .sizes input[type="radio"] {
    display: none;

}

.sizes label {
    display: inline-block;
    background-color: #e472cb;
    color: white;
    padding: 4px 11px;
    font-size: 16px;
    cursor: pointer;
} */

/* .sizes input:hover {
    background-color: #da00aa;

}

.sizes label:hover {
    background-color: #da00aa;

}

.sizes input[type="radio"]:checked+label {
    background-color: #c7009d;
    color: white;
}

.ad:focus {
    background-color: #c7009d;
}

.sizes {
    background-color: #fbf4fa;
    width: auto;
    max-width: 100%;
    gap: 2px;
    flex-wrap: wrap !important;
    ;
} */

/* .size label{
    border:solid 0.5px fbf4fa;
    color:#000000;
} */</style>

