<template>
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold mb-4 text-center">Property Listings</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <div v-for="property in properties" :key="property.id" class="bg-white rounded-lg shadow-md p-4">
                <img :src="property.image" alt="Property Image" class="w-full h-48 object-cover mb-4 rounded-lg">
                <h3 class="text-xl font-bold mb-2">{{ property.title }}</h3>
                <p class="text-gray-600">{{ property.description }}</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-gray-500">{{ property.location }}</span>
                    <span class="text-green-500 font-bold">{{ property.price }}</span>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <p class="text-gray-600 mb-4">Browse through our collection of properties available for sale or rent.</p>
            <img src="https://images.pexels.com/photos/3075453/pexels-photo-3075453.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Banner Image" class="w-full h-80 object-cover mb-4 rounded-lg">
        </div>
        <section class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:px-8">
            <div class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.indigo.100),white)] opacity-20" />
            <div class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center" />
            <div class="mx-auto max-w-2xl lg:max-w-4xl">
              <img class="mx-auto h-12" src="https://tailwindui.com/img/logos/workcation-logo-indigo-600.svg" alt="" />
              <figure class="mt-10">
                <blockquote class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
                  <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.”</p>
                </blockquote>
                <figcaption class="mt-10">
                  <img class="mx-auto h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                  <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                    <div class="font-semibold text-gray-900">Judith Black</div>
                    <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                      <circle cx="1" cy="1" r="1" />
                    </svg>
                    <div class="text-gray-600">CEO of Workcation</div>
                  </div>
                </figcaption>
              </figure>
            </div>
          </section>
          <section class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:px-8">
            <!-- <h2 class="text-3xl font-bold mb-4 text-center">Sales</h2> -->
            <div class="bg-white py-24 sm:py-32">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                  <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                    <div v-for="stat in stats" :key="stat.id" class="mx-auto flex max-w-xs flex-col gap-y-4">
                      <dt class="text-base leading-7 text-gray-600">{{ stat.name }}</dt>
                      <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ stat.value }}</dd>
                    </div>
                  </dl>
                </div>
            </div>

          </section>
          

        <footer class="bg-gray-200 py-4 ">
            <div class="container mx-auto flex justify-center items-center">
                <a href="#" class="text-gray-600 hover:text-gray-800 mr-4">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="#" class="text-gray-600 hover:text-gray-800 mr-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-600 hover:text-gray-800 mr-4">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-gray-600 hover:text-gray-800">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
            <p class="text-center text-gray-600 mt-2">Follow us on social media</p>
        </footer>
    </div>
</template>

<script>
export default {
    data() {
        return {
            properties: [
                {
                    id: 1,
                    title: "Beautiful House",
                    description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                    location: "City, Country",
                    price: "$1,000,000",
                    image: "https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
                },
                {
                    id: 2,
                    title: "Luxury Apartment",
                    description: "Sed ut perspiciatis unde omnis iste natus error sit voluptatem.",
                    location: "City, Country",
                    price: "$500,000",
                    image: "https://images.pexels.com/photos/323780/pexels-photo-323780.jpeg?auto=compress&cs=tinysrgb&w=600",
                },
                {
                    id: 3,
                    title: "Cozy Condo",
                    description: "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium.",
                    location: "City, Country",
                    price: "$300,000",
                    image: "https://images.pexels.com/photos/259962/pexels-photo-259962.jpeg?auto=compress&cs=tinysrgb&w=600",
                }
                // Add more properties here...
            ],

            stats: [
                { id: 1, name: 'Transactions every 24 hours', value: '44 million' },
                { id: 2, name: 'Assets under holding', value: '$119 trillion' },
                { id: 3, name: 'New users annually', value: '46,000' },
            ]
        };
    },
};
</script>

<style>
/* Add your custom styles here */
@media (min-width: 640px) {
    .grid-cols-1 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}
@media (min-width: 768px) {
    .grid-cols-1 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

h1 {
    color: #333;
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

h2 {
    color: #555;
    font-size: 2rem;
    margin-bottom: 1rem;
}
</style>
