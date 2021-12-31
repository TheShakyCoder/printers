import { createRouter, createWebHashHistory } from "vue-router";
import Index from "./Pages/Index.vue";
// import ProductsShow from "./Pages/Products/Show.vue";
// import CategoriesProducts from "./Pages/Categories/Products.vue";
import Cart from "./Pages/Cart/Cart.vue";

const routes = [
  {
    path: "/",
    name: "Index",
    component: Index,
  },
//   {
//     path: "/categories/:id/products",
//     name: "CategoriesProducts",
//     component: CategoriesProducts,
//   },
//   {
//     path: "/products/:id",
//     name: "ProductsShow",
//     component: ProductsShow,
//   },
  {
    path: "/cart",
    name: "Cart",
    component: Cart,
  }
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;