
<x-layouts.main>
    <!-- Hero Start -->
    <section class="relative mt-20">
        <div class="container-fluid md:mx-4 mx-2">
            <div class="relative pt-40 pb-52 table w-full rounded-2xl shadow-md overflow-hidden" id="home">
                <div class="absolute inset-0 bg-black/60"></div>

                <div class="container relative">
                    <div class="grid grid-cols-1">
                        <div class="md:text-start text-center">
                            <h1 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">We will help you find <br> your <span class="text-green-600">Wonderful</span> home</h1>
                            <p class="text-white/70 text-xl max-w-xl">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                        </div>
                    </div><!--end grid-->
                </div><!--end container-->
            </div>
        </div><!--end Container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Start -->
    <section class="relative md:pb-24 pb-16">
        <div class="container relative">
            <div class="grid grid-cols-1 justify-center">
                <div class="relative -mt-32">
                    <div class="grid grid-cols-1">


                        </div>
                    </div><!--end grid-->
                </div>
            </div><!--end grid-->
        </div><!--end container-->
        <div class="container relative mt-12" >
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">



                @foreach ($branches as $branch)

                    <div class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                        <div class="relative">
                            <img src="assets/images/ads/public/assets/images/ads/66e04d227d90c___download (1).jpeg" alt="">

                            <div class="absolute top-4 end-4">
                                <a href="javascript:void(0)" class="btn btn-icon bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-full text-slate-100 dark:text-slate-700 focus:text-red-600 dark:focus:text-red-600 hover:text-red-600 dark:hover:text-red-600"><i class="mdi mdi-heart text-[20px]"></i></a>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="pb-6">
                                <a href="/ads/{{ $branch->id }}" class="text-lg hover:text-green-600 font-medium ease-in-out duration-500">{{ $branch->name }}</a>
                            </div>

                            <ul class="py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                                <li class="flex items-center me-4">
                                    <span>{{ $branch->address}} </span>
                                </li>



                            </ul>





                        </div>
                    </div><!--end property content-->

                @endforeach

            </div><!--end container-->
    </section><!--end section-->
</x-layouts.main>

