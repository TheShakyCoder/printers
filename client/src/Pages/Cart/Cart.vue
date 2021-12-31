<template>
    <div v-if="cart">
        <h1>Cart</h1>
        <ul>
            <li v-for="line in cart">
                <h3>{{ line.product.name }}</h3>
                <ul>
                    <li v-for="option in line.options">
                        <h5>{{ option.name }}</h5>
                        <!-- <p v-if="option.input == 'boolean'">
                            <select name="option.v" :id="'option-' + option.id">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </p>
                        <p v-else>
                            <select name="option.v" :id="'option-' + option.id">
                                <option v-for="i in incrementArray(option.id)" :value="i.value">{{ i.label }}</option>
                            </select>
                        </p> -->
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
                        increment_value
                    }
                }
            }`,
            result ({ data, loading, networkStatus }) {
                // console.log(data)
                for(let o = 0; o < data.cart[0].options.length; o++) {
                    this.options[data.cart[0].options[o].id] = data.cart[0].options[o]
                }
                console.log(this.options)
                return data
            },
        },
    },

    data () {
        return {
            options: {}
        }
    },

    

    methods: {
        incrementArray(optionId) {
            const id = parseInt(optionId)
            // console.log(this.options, id)
            let result = []
            for(let i = this.options[id].min_value; i <= this.options[id].max_value; i = i + this.options[id].increment_value) {
                console.log(i)
                result.push({
                    value: i,
                    label: this.options[id].input === 'minutes' ? this.timeFormat(i) : i
                })
            }
            return result
        },
        timeFormat(minutes) {
            return Math.floor(minutes / 60) + ":" + (minutes % 60).toString().padStart(2, "0")
        }
    }
}
</script>