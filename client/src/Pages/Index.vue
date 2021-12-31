<template>
    <div>
        <div>INDEX</div>
        <ul>
            <li v-for="category in categories">
                {{ category.name }}
                <ul>
                    <li v-for="product in category.products">
                        <button type="button" @click="addToCart(product.id)">{{ product.name }}</button>
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
                        product {
                            name
                        }
                        user {
                            name
                        }
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