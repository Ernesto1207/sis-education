<x-app-layout>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="h-full bg-gray-200 p-8">
                    <x-welcome />
                </div>
            </div>
        </div>
    </div> --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-col justify-center items-center text-center pt-4">
        <div
            class="min-w-[375px] md:min-w-[700px] xl:min-w-[800px] mt-3 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-3 3xl:grid-cols-6">

            <div
                class="relative flex flex-grow  flex-col items-center rounded-[10px] border-[1px] border-gray-200  bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-[#ffffff33] dark:!bg-navy-800 dark:text-white dark:shadow-none">
                <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
                    <div class="rounded-full bg-lightPrimary p-3 dark:bg-navy-700">
                        <span class="flex items-center text-brand-500 dark:text-white">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                class="h-6 w-6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                    <p class="font-dm text-sm font-medium text-gray-600">Alumnos</p>
                    <h4 class="text-xl font-bold text-navy-700 dark:text-white"> 200 </h4>
                </div>
            </div>


            <div
                class="relative flex flex-grow  flex-col items-center rounded-[10px] border-[1px] border-gray-200  bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-[#ffffff33] dark:!bg-navy-800 dark:text-white dark:shadow-none">
                <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
                    <div class="rounded-full bg-lightPrimary p-3 dark:bg-navy-700">
                        <span class="flex items-center text-brand-500 dark:text-white">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                class="h-7 w-7" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M4 9h4v11H4zM16 13h4v7h-4zM10 4h4v16h-4z"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                    <p class="font-dm text-sm font-medium text-gray-600">Profesores</p>
                    <h4 class="text-xl font-bold text-navy-700 dark:text-white">145</h4>
                </div>
            </div>


            <div
                class="relative flex flex-grow  flex-col items-center rounded-[10px] border-[1px] border-gray-200  bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-[#ffffff33] dark:!bg-navy-800 dark:text-white dark:shadow-none">
                <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
                    <div class="rounded-full bg-lightPrimary p-3 dark:bg-navy-700">
                        <span class="flex items-center text-brand-500 dark:text-white">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                class="h-6 w-6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M208 448V320h96v128h97.6V256H464L256 64 48 256h62.4v192z"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                    <p class="font-dm text-sm font-medium text-gray-600">Cursos</p>
                    <h4 class="text-xl font-bold text-navy-700 dark:text-white">$2433</h4>
                </div>
            </div>


            {{-- <div
                class="relative flex flex-grow  flex-col items-center rounded-[10px] border-[1px] border-gray-200  bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-[#ffffff33] dark:!bg-navy-800 dark:text-white dark:shadow-none">
                <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
                    <div class="rounded-full bg-lightPrimary p-3 dark:bg-navy-700">
                        <span class="flex items-center text-brand-500 dark:text-white">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                class="h-7 w-7" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M4 9h4v11H4zM16 13h4v7h-4zM10 4h4v16h-4z"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                    <p class="font-dm text-sm font-medium text-gray-600">Earnings</p>
                    <h4 class="text-xl font-bold text-navy-700 dark:text-white">$340.5</h4>
                </div>
            </div>
            <div
                class="relative flex flex-grow  flex-col items-center rounded-[10px]  border-[1px] border-gray-200  bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-[#ffffff33] dark:!bg-navy-800 dark:text-white dark:shadow-none">
                <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
                    <div class="rounded-full bg-lightPrimary p-3 dark:bg-navy-700">
                        <span class="flex items-center text-brand-500 dark:text-white">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                class="h-6 w-6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M298.39 248a4 4 0 002.86-6.8l-78.4-79.72a4 4 0 00-6.85 2.81V236a12 12 0 0012 12z">
                                </path>
                                <path
                                    d="M197 267a43.67 43.67 0 01-13-31v-92h-72a64.19 64.19 0 00-64 64v224a64 64 0 0064 64h144a64 64 0 0064-64V280h-92a43.61 43.61 0 01-31-13zm175-147h70.39a4 4 0 002.86-6.8l-78.4-79.72a4 4 0 00-6.85 2.81V108a12 12 0 0012 12z">
                                </path>
                                <path
                                    d="M372 152a44.34 44.34 0 01-44-44V16H220a60.07 60.07 0 00-60 60v36h42.12A40.81 40.81 0 01231 124.14l109.16 111a41.11 41.11 0 0111.83 29V400h53.05c32.51 0 58.95-26.92 58.95-60V152z">
                                </path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                    <p class="font-dm text-sm font-medium text-gray-600">Spend this month</p>
                    <h4 class="text-xl font-bold text-navy-700 dark:text-white">$642.39</h4>
                </div>
            </div>
            <div
                class="relative flex flex-grow  flex-col items-center  rounded-[10px] border-[1px] border-gray-200  bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-[#ffffff33] dark:!bg-navy-800 dark:text-white dark:shadow-none">
                <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
                    <div class="rounded-full bg-lightPrimary p-3 dark:bg-navy-700">
                        <span class="flex items-center text-brand-500 dark:text-white">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                class="h-7 w-7" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path d="M4 9h4v11H4zM16 13h4v7h-4zM10 4h4v16h-4z"></path>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                    <p class="font-dm text-sm font-medium text-gray-600">Sales</p>
                    <h4 class="text-xl font-bold text-navy-700 dark:text-white">$574.34</h4>
                </div>
            </div> --}}
        </div>
    </div>

    <div class="grid grid-cols-2 gap-20 pt-20">
        <div class="shadow-lg rounded-lg overflow-hidden">
            <div class="py-3 px-5 bg-gray-900 text-white">Grafico de Usuarios</div>
            <canvas class="" id="chartBar"></canvas>
        </div>

        <div class="shadow-lg rounded-lg overflow-hidden">
            <div class="py-3 px-5 bg-gray-900 text-white">Grafico de Asistencias</div>
            <canvas class="ml-20 mr-40" id="chartPie"></canvas>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const labelsBarChart = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
        ];
        const dataBarChart = {
            labels: labelsBarChart,
            datasets: [{
                label: "Alumnos",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: [12, 10, 5, 2, 20, 30, 45],
            }, ],
        };

        const configBarChart = {
            type: "bar",
            data: dataBarChart,
            options: {},
        };

        var chartBar = new Chart(
            document.getElementById("chartBar"),
            configBarChart
        );



        const dataPie = {
            labels: ["Asistencias", "Tardanzas", "Faltas"],
            datasets: [{
                label: "Asistencias",
                data: [300, 50, 100],
                backgroundColor: [
                    "rgb(133, 105, 241)",
                    "rgb(164, 101, 241)",
                    "rgb(101, 143, 241)",
                ],
                hoverOffset: 4,
            }, ],
        };

        const configPie = {
            type: "pie",
            data: dataPie,
            options: {},
        };

        var chartBar = new Chart(document.getElementById("chartPie"), configPie);
    </script>
</x-app-layout>
