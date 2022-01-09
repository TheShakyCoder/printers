<template>
    <div class="px-4">
        <ul>
            <li v-for="category in categories">
                <h3 class="font-bold text-xl">{{ category.name }}</h3>
                <ul class="flex flex-wrap">
                    <li v-for="product in category.products" class="w-full sm:w-1/2 md:w-1/3">
                        <div class="flex flex-col shadow border m-4 p-4">
                            <div>
                                <div>
                                    <h4 class="text-lg">{{ product.name }}</h4>
                                </div>
                                <div>
                                    <button type="button" @click="addToCart(product.id)" class="border rounded shadow p-1 px-2 text-sm">add to cart</button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
import gql from 'graphql-tag'

export default {
    apollo: {
        categories: {
            query: gql`query categories {
                categories {
                    name
                    products {
                        id
                        name
                    }
                }   
            }`
        }
    },
    methods: {
        addToCart(productId) {

            this.$apollo.mutate({
                mutation: gql`mutation ($id: Int!) {
                    addProductToCart(product_id: $id) {
                        id
                    }
                }`,

                variables: {
                    id: parseInt(productId)
                }
            }).then((data) => {
                // Result
                console.log(data)
                this.$router.push({ name: 'Cart' })
            }).catch((error) => {
                // Error
                console.error(error)
            })
            
        
        }
    }
}
</script>