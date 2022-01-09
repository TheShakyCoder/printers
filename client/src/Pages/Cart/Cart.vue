<template>
    <div>
        <h1 class="text-xl font-bold">Your Cart</h1>
        <ul>
            <li v-for="line in cart" class="p-4 shadow border m-4 flex flex-col">
                <h3>{{ line.product.name }}</h3>
                <ul class="flex flex-wrap">
                    <li v-for="option in line.options" class="w-40 flex flex-col justify-between">
                        <h5>{{ option.name }}</h5>
                        <!-- <h6>{{ option.range }}</h6> -->
                        <div>
                            <!-- <p v-if="option.input == 'boolean'">
                                <select name="option.v" :id="'option-' + option.id">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </p> -->
                            <!-- <p v-else>
                                <select name="option.v" :id="'option-' + option.id">
                                    <option v-for="i in incrementArray(option.id)" :value="i.value">{{ i.label }}</option>
                                </select>
                            </p> -->
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
        cart: {
            query: gql`query cart {
                cart {
                    product {
                        name
                    }
                    options {
                        id,
                        name,
                        input,
                        min_value,
                        max_value,
                        increment_value,
                        # range
                    }
                }
            }`
        },
    },

    data () {
        return {
            options: {}
        }
    },

    

    methods: {
        // timeFormat(minutes) {
        //     return Math.floor(minutes / 60) + ":" + (minutes % 60).toString().padStart(2, "0")
        // }
    }
}
</script>