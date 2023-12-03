<template>
    <div class="product-grid3">
        <div class="product-image3" >
            <a :href="'/product/' + product.slug" >
                <img class="pic-1" :src="product?.main_image?.urls.original" />
                <img class="pic-2" :src="product?.attachments[0]?.urls.original">
            </a>
            <ul class="social">
                <li>
                    <a :href="'/product/' + product.slug">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                </li>
                <li>
                    <add-to-cart-btn :prop-product='product'></add-to-cart-btn>
                </li>
            </ul>
            <span class="product-new-label">Նորույթ</span>
        </div>
        <div class="product-content">
            <h3 class="title">{{ product.title }} </h3>
            <item-price :product="product"></item-price>
            <!-- <ul class="rating"> -->
            <!-- <li class="">Չափս</li> -->
            <!-- <li class="">38</li>
            <li class="">39</li>
            <li class="">41</li> -->
            <!-- </ul> -->
        </div>
    </div>

</template>
<script>

import VClamp from 'vue-clamp';

export default {
props: ['product'],
components: {
    'v-clamp': VClamp,
},
methods: {
    openFastView(product) {
        this.$store.commit('OPEN_PRODUCT_ZOOM', product);
    }
}
}
</script>

