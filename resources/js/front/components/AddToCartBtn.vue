<template>
    <div class="d-flex justify-content-center mt-2 add-to-cart-box" :class="{outOfStock: propProduct.stock_status === 'out_of_stock'}">
        <a href="javascript:" @click="handleAddToCart" :class="{'added': isAddedToCart(propProduct.id), 'disabled': propProduct.stock_status === 'out_of_stock'}">
            <span v-if="propProduct.stock_status !== 'out_of_stock' && isAddedToCart(propProduct.id)" class="fa fa-shopping-bag"></span>
            <span v-if="propProduct.stock_status !== 'out_of_stock' && !isAddedToCart(propProduct.id)" class="fa fa-shopping-bag"></span>
            <span v-if="propProduct.stock_status === 'out_of_stock'" class="fa fa-shopping-bag"></span>
        </a>
    </div>
</template>

<script>
import {mapActions} from 'vuex'

export default {
    props: ['propProduct'],
    data() {
        return {
            quantity: 1
        }
    },
    methods: {
        ...mapActions(["addToCart"]),
        handleAddToCart() {
            if(this.propProduct.stock_status === 'out_of_stock') {
                location.href = this.propProduct.publish_url
            } else {
                // this.addToCart({...this.product, ...{quantity: this.quantity || 1}})
                this.addToCart({...this.product,  ...{quantity: this.quantity || 1, size: this.size}})

            }
        },
        isAddedToCart(id) {
            return Boolean(this.$store.getters.cartItems.find(i => Number(i.id) === Number(id)))
        },
    },
    computed: {
        product() {
            return this.mapCartItem(this.propProduct);
        },
    }
}
</script>
<style scoped>

.added {
    background: #c7009d;
}

.added .fa-shopping-bag {
    color: #555353;
}




.disabled{
    background-color:#555353  !important;
    cursor: not-allowed! important;
}
.disabled .fa-shopping-bag {
    color: #fff;
}
</style>
