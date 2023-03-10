<script setup>
import {InertiaLink, useForm} from "@inertiajs/inertia-vue3";
import CustomerLayout from "@/Layouts/CustomerLayout.vue"
import Review from "@/Pages/Customer/partial/Review.vue";
import RatingStars from "@/Pages/Customer/partial/RatingStars.vue";

defineProps({
    product: Object
})

const form = useForm({
    quantity: 1,
    options: null
})

</script>

<template>
    <CustomerLayout>
        <!-- breadcrumb -->
        <div class="container py-4 flex items-center gap-3">
            <InertiaLink :href="route('home')" class="text-primary text-base">
                <i class="fa-solid fa-house"></i>
            </InertiaLink>
            <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
            <p class="text-gray-600 font-medium">{{product.category.name}}</p>
        </div>
        <!-- ./breadcrumb -->

        <!-- product-detail -->
        <div class="container grid grid-cols-2 gap-6">
            <div>
                <img :src="product.media[0]?.original_url" alt="product" class="w-full">
                <div class="grid grid-cols-5 gap-4 mt-4">
                    <template v-for="media in product.media">
                        <img :src="media.original_url" alt="product2"
                             class="w-full cursor-pointer border border-primary">
                    </template>
                </div>
            </div>

            <div>
                <h2 class="text-3xl font-medium uppercase mb-2">{{ product.name }}</h2>
                <div class="flex items-center mb-4">
                    <div class="flex gap-1 text-sm">
                        <RatingStars :rating="product.avg_rating"/>
                    </div>
                    <div class="text-xs text-gray-500 ml-3">(150 Reviews)</div>
                </div>
                <div class="space-y-2">
                    <p class="text-gray-800 font-semibold space-x-2">
                        <span>Availability: </span>
                        <span class="text-green-600">In Stock</span>
                    </p>
                    <p class="space-x-2">
                        <span class="text-gray-800 font-semibold">Brand: </span>
                        <span class="text-gray-600">{{ product.brand.name }}</span>
                    </p>
                    <p class="space-x-2">
                        <span class="text-gray-800 font-semibold">Category: </span>
                        <span class="text-gray-600">{{ product.category.name }}</span>
                    </p>
                    <p class="space-x-2">
                        <span class="text-gray-800 font-semibold">SKU: </span>
                        <span class="text-gray-600 uppercase">{{ product.sku }}</span>
                    </p>
                </div>
                <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                    <p class="text-xl text-primary font-semibold">${{ product.price }}</p>
                    <p class="text-base text-gray-400 line-through">${{ product.old_price }}</p>
                </div>

                <p class="mt-4 text-gray-600">{{ product.description }}</p>

                <div class="pt-4">
                    <h3 class="text-sm text-gray-800 uppercase mb-1">Size</h3>
                    <div class="flex items-center gap-2">
                        <div class="size-selector">
                            <input type="radio" name="size" id="size-xs" class="hidden">
                            <label for="size-xs"
                                   class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">XS</label>
                        </div>
                        <div class="size-selector">
                            <input type="radio" name="size" id="size-sm" class="hidden">
                            <label for="size-sm"
                                   class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">S</label>
                        </div>
                        <div class="size-selector">
                            <input type="radio" name="size" id="size-m" class="hidden">
                            <label for="size-m"
                                   class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">M</label>
                        </div>
                        <div class="size-selector">
                            <input type="radio" name="size" id="size-l" class="hidden">
                            <label for="size-l"
                                   class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">L</label>
                        </div>
                        <div class="size-selector">
                            <input type="radio" name="size" id="size-xl" class="hidden">
                            <label for="size-xl"
                                   class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">XL</label>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Color</h3>
                    <div class="flex items-center gap-2">
                        <div class="color-selector">
                            <input type="radio" name="color" id="red" class="hidden">
                            <label for="red"
                                   class="border border-gray-200 rounded-sm h-6 w-6  cursor-pointer shadow-sm block"
                                   style="background-color: #fc3d57;"></label>
                        </div>
                        <div class="color-selector">
                            <input type="radio" name="color" id="black" class="hidden">
                            <label for="black"
                                   class="border border-gray-200 rounded-sm h-6 w-6  cursor-pointer shadow-sm block"
                                   style="background-color: #000;"></label>
                        </div>
                        <div class="color-selector">
                            <input type="radio" name="color" id="white" class="hidden">
                            <label for="white"
                                   class="border border-gray-200 rounded-sm h-6 w-6  cursor-pointer shadow-sm block"
                                   style="background-color: #fff;"></label>
                        </div>

                    </div>
                </div>

                <div class="mt-4">
                    <h3 class="text-sm text-gray-800 uppercase mb-1">Quantity</h3>
                    <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                        <button type="button" class="h-8 w-8 text-xl flex items-center justify-center"
                                @click="form.quantity--">-
                        </button>
                        <input type="text" class="h-8 w-9 px-2 text-right" v-model="form.quantity">
                        <button type="button" class="h-8 w-8 text-xl flex items-center justify-center"
                                @click="form.quantity++">+
                        </button>
                    </div>
                </div>

                <div class="mt-6 flex gap-3 border-b border-gray-200 pb-5 pt-5">
                    <button type="button" @click="form.post(route('cart.store', product),{preserveScroll:true})"
                                 class="bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition">
                        <i class="fa-solid fa-bag-shopping"></i> Add to cart
                    </button>
                    <InertiaLink :href="route('wishlist.store', product)" as="button" method="post" preserve-scroll
                                 class="border border-gray-300 text-gray-600 px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:text-primary transition">
                        <i class="fa-solid fa-heart"></i> Wishlist
                    </InertiaLink>
                </div>

                <div class="flex gap-3 mt-4">
                    <a href="#"
                       class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#"
                       class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#"
                       class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- ./product-detail -->

        <!-- description -->
        <div class="container pb-16">
            <h3 class="border-b border-gray-200 font-roboto text-gray-800 pb-3 font-medium">Product details</h3>
            <div class="w-3/5 pt-6">
                <div class="text-gray-600">
                    <p>{{ product.description }}</p>
                </div>

                <table class="table-auto border-collapse w-full text-left text-gray-600 text-sm mt-6">
                    <tr>
                        <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Color</th>
                        <th class="py-2 px-4 border border-gray-300 ">Blank, Brown, Red</th>
                    </tr>
                    <tr>
                        <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Material</th>
                        <th class="py-2 px-4 border border-gray-300 ">Latex</th>
                    </tr>
                    <tr>
                        <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Weight</th>
                        <th class="py-2 px-4 border border-gray-300 ">55kg</th>
                    </tr>
                </table>
            </div>
        </div>
        <!-- ./description -->

        <Review :reviews="product.latest_reviews" :product="product"></Review>
        <!-- related product -->
        <!--    <div class="container pb-16">
                <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Related products</h2>
                <div class="grid grid-cols-4 gap-6">
                    <div class="bg-white shadow rounded overflow-hidden group">
                        <div class="relative">
                            <img src="../assets/images/products/product1.jpg" alt="product 1" class="w-full">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                            justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                                <a href="#"
                                   class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                   title="view product">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <a href="#"
                                   class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                   title="add to wishlist">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="pt-4 pb-3 px-4">
                            <a href="#">
                                <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Guyer
                                    Chair</h4>
                            </a>
                            <div class="flex items-baseline mb-1 space-x-2">
                                <p class="text-xl text-primary font-semibold">$45.00</p>
                                <p class="text-sm text-gray-400 line-through">$55.90</p>
                            </div>
                            <div class="flex items-center">
                                <div class="flex gap-1 text-sm text-yellow-400">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                                <div class="text-xs text-gray-500 ml-3">(150)</div>
                            </div>
                        </div>
                        <a href="#"
                           class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                            to cart</a>
                    </div>
                    <div class="bg-white shadow rounded overflow-hidden group">
                        <div class="relative">
                            <img src="../assets/images/products/product4.jpg" alt="product 1" class="w-full">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                            justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                                <a href="#"
                                   class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                   title="view product">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <a href="#"
                                   class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                   title="add to wishlist">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="pt-4 pb-3 px-4">
                            <a href="#">
                                <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">Bed
                                    King Size</h4>
                            </a>
                            <div class="flex items-baseline mb-1 space-x-2">
                                <p class="text-xl text-primary font-semibold">$45.00</p>
                                <p class="text-sm text-gray-400 line-through">$55.90</p>
                            </div>
                            <div class="flex items-center">
                                <div class="flex gap-1 text-sm text-yellow-400">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                                <div class="text-xs text-gray-500 ml-3">(150)</div>
                            </div>
                        </div>
                        <a href="#"
                           class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                            to cart</a>
                    </div>
                    <div class="bg-white shadow rounded overflow-hidden group">
                        <div class="relative">
                            <img src="../assets/images/products/product2.jpg" alt="product 1" class="w-full">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                            justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                                <a href="#"
                                   class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                   title="view product">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <a href="#"
                                   class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                   title="add to wishlist">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="pt-4 pb-3 px-4">
                            <a href="#">
                                <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                    Couple Sofa</h4>
                            </a>
                            <div class="flex items-baseline mb-1 space-x-2">
                                <p class="text-xl text-primary font-semibold">$45.00</p>
                                <p class="text-sm text-gray-400 line-through">$55.90</p>
                            </div>
                            <div class="flex items-center">
                                <div class="flex gap-1 text-sm text-yellow-400">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                                <div class="text-xs text-gray-500 ml-3">(150)</div>
                            </div>
                        </div>
                        <a href="#"
                           class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                            to cart</a>
                    </div>
                    <div class="bg-white shadow rounded overflow-hidden group">
                        <div class="relative">
                            <img src="../assets/images/products/product3.jpg" alt="product 1" class="w-full">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
                            justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                                <a href="#"
                                   class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                   title="view product">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                <a href="#"
                                   class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                   title="add to wishlist">
                                    <i class="fa-solid fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="pt-4 pb-3 px-4">
                            <a href="#">
                                <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                    Mattrass X</h4>
                            </a>
                            <div class="flex items-baseline mb-1 space-x-2">
                                <p class="text-xl text-primary font-semibold">$45.00</p>
                                <p class="text-sm text-gray-400 line-through">$55.90</p>
                            </div>
                            <div class="flex items-center">
                                <div class="flex gap-1 text-sm text-yellow-400">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                </div>
                                <div class="text-xs text-gray-500 ml-3">(150)</div>
                            </div>
                        </div>
                        <a href="#"
                           class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                            to cart</a>
                    </div>
                </div>
            </div>-->
        <!-- ./related product -->
    </CustomerLayout>
</template>
