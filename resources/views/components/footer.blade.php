
        <!-- Start Footer -->
        <footer class="relative bg-slate-900 dark:bg-slate-800 mt-24">
            <div class="container relative">


            </div><!--end container-->

        </footer>
        <!-- End Footer -->
        <!-- Switcher -->
        <div class="fixed top-1/4 -left-2 z-3">
            <span class="relative inline-block rotate-90">
                <input type="checkbox" class="checkbox opacity-0 absolute" id="chk" />
                <label class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-700 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">
                    <i class="uil uil-moon text-[20px] text-yellow-500 mt-1"></i>
                    <i class="uil uil-sun text-[20px] text-yellow-500 mt-1"></i>
                    <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] start-[2px] size-7"></span>
                </label>
            </span>
        </div>
        <!-- Switcher -->




            <!-- Footer Start -->
            <footer class="shadow dark:shadow-gray-700 bg-white dark:bg-slate-900 px-6 py-4">
                <div class="container-fluid">
                    <div class="grid grid-cols-1">
                        <div class="sm:text-start text-center mx-md-2">
                            <p class="mb-0 text-slate-400">©
                                <script>document.write(new Date().getFullYear())</script>
                                NTRA. Design with <i class="mdi mdi-heart text-red-600"></i> by PHP N1 group.
                            </p>
                        </div><!--end col-->
                    </div><!--end grid-->
                </div><!--end container-->
            </footer><!--end footer-->
            <!-- End -->
        </main>
        <!--End page-content" -->
    </div>

        <!-- LTR & RTL Mode Code -->

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 size-9 text-center bg-green-600 text-white justify-center items-center"><i class="uil uil-arrow-up"></i></a>
        <!-- Back to top -->

        <!-- JAVASCRIPTS -->
        <script src="assets/libs/tiny-slider/min/tiny-slider.js"></script>
        <script src="assets/libs/tobii/js/tobii.min.js"></script>
        <script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        @vite('resources/js/app.js')

        <script>
            easy_background("#home",
                {
                    slide: ["assets/images/bg/01.jpg", "assets/images/bg/02.jpg", "assets/images/bg/03.jpg"],
                    delay: [4000, 4000, 4000]
                }
            );
        </script>
    </body>
</html>
