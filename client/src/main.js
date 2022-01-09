import { createApp } from 'vue'
import App from './App.vue'
import './tailwind.css'
import router from './routes'

import { ApolloClient, InMemoryCache } from '@apollo/client/core'
import { createApolloProvider } from '@vue/apollo-option'


const cache = new InMemoryCache()
const apolloClient = new ApolloClient({
  cache,
  headers: {
      authorization: 'Bearer ' + localStorage.getItem('token')
  },
  uri: 'https://printers.local/graphql',
})

const apolloProvider = createApolloProvider({
  defaultClient: apolloClient,
})

createApp(App).use(router).use(apolloProvider).mount('#app')
