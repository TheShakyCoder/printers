<template>
  <div class="min-h-full">
    <header class="bg-gray-800">
      <div class="mx-auto max-w-7xl">
        <div class="relative flex flex-wrap items-center justify-between">
          <!-- Logo -->
          <div class="py-2 px-2">
            <router-link :to="{ name: 'Index' }">
              <span class="sr-only">Workflow</span>
              <!-- https://tailwindui.com/img/logos/workflow-mark-cyan-200.svg -->
              <img src="https://printers.local/images/logo.png" alt="" class="h-12">
            </router-link>
          </div>

          <!-- Menu button -->
          <div class="flex-shrink-0">
            <!-- Mobile menu button -->
            <button
              @click="show = true"
              type="button"
              class="bg-transparent p-2 rounded-md inline-flex items-center justify-center text-cyan-200 hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white"
              aria-expanded="false"
            >
              <span class="sr-only">Open main menu</span>
              <!--
             Heroicon name: outline/menu

             Menu open: "hidden", Menu closed: "block"
              -->
              <svg
                class="h-6 w-6"
                :class="{ block: !show, hidden: show }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
              </svg>
              <!--
             Heroicon name: outline/x

             Menu open: "block", Menu closed: "hidden"
              -->
              <svg
                class="h-6 w-6"
                :class="{ hidden: !show, block: show }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on mobile menu state. -->
      <transition duration="150">
        <div v-show="show" class>
          <transition
            enter-class="duration-150 ease-out"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
          >
            <div
              @click="show = false"
              v-show="show"
              class="z-20 fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"
            ></div>
          </transition>

          <transition
            enter-class="duration-150 ease-out"
            enter-from-class="opacity-0 scale-95"
            enter-to-class="opacity-100 scale-100"
            leave-class="duration-150 ease-in"
            leave-from-class="opacity-100 scale-100"
            leave-to-class="opacity-0 scale-95"
          >
            <div
              v-show="show"
              class="z-30 absolute top-0 inset-x-0 max-w-3xl mx-auto w-full p-2 transition transform origin-top"
            >
              <div
                class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-200"
              >
                <div class="pt-3 pb-2">
                  <div class="flex items-center justify-between px-4">
                    <div>
                      <img
                        class="h-8 w-auto"
                        src="https://tailwindui.com/img/logos/workflow-mark-cyan-600.svg"
                        alt="Workflow"
                      />
                    </div>
                    <div class="-mr-2">
                      <button
                        @click="show = false"
                        type="button"
                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500"
                      >
                        <span class="sr-only">Close menu</span>
                        <!-- Heroicon name: outline/x -->
                        <svg
                          class="h-6 w-6"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                          aria-hidden="true"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                          />
                        </svg>
                      </button>
                    </div>
                  </div>
                  <div class="mt-3 px-2 space-y-1">
                    <!-- 

                    -->
                  </div>
                </div>
              </div>
            </div>
          </transition>
        </div>
      </transition>
    </header>
  </div>

  <router-view></router-view>
  <footer></footer>
</template>

<script>
export default {
  data() {
    return {
      show: false
    }
  }
}
</script>

<style>
</style>
