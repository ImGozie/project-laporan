<?= $this->include('layouts/header'); ?>
<section class="py-2">
    <div class="flex gap-3">
        <div class="max-w-[70%] w-full border-[1px] bg-white rounded-lg shadow p-4 md:p-6">
            <div class="sticky left-0 flex justify-between pb-4 mb-4 border-b border-gozi-100">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-lg bg-gozi-100 flex items-center justify-center me-3">
                        <i class="text-xl text-black/50 fa fa-users"></i>
                    </div>
                    <div>
                        <h5 class="leading-none text-2xl font-bold text-gozi-950 pt-1">4,1K</h5>
                        <p class="text-sm font-normal text-gray-500">Total data alumni</p>
                    </div>
                </div>
                <div>
                    <span class="bg-gozi-100 text-gozi-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md">
                        <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                        </svg>
                        42.5%
                    </span>
                </div>
            </div>
            <div class="overflow-x-auto">
                <div class="sticky my-4 left-0 flex gap-2">
                    <dl class="flex items-center bg-gozi-100 py-2 px-4 rounded-md">
                        <p class="text-gray-500 text-sm font-medium me-1">Kerja</p>
                        <p class="text-sm text-gray-800 font-semibold">40</p>
                    </dl>
                    <dl class="flex items-center bg-gozi-100 py-2 px-4 rounded-md">
                        <p class="text-gray-500 text-sm font-medium me-1">Kuliah</p>
                        <p class="text-sm text-gray-800 font-semibold">60</p>
                    </dl>
                    <dl class="flex items-center bg-gozi-100 py-2 px-4 rounded-md">
                        <p class="text-gray-500 text-sm font-medium me-1">BLK / LPK</p>
                        <p class="text-sm text-gray-800 font-semibold">44</p>
                    </dl>
                    <dl class="flex items-center bg-gozi-100 py-2 px-4 rounded-md">
                        <p class="text-gray-500 text-sm font-medium me-1">Wirausaha</p>
                        <p class="text-sm text-gray-800 font-semibold">88</p>
                    </dl>
                    <dl class="flex items-center bg-gozi-100 py-2 px-4 rounded-md">
                        <p class="text-gray-500 text-sm font-medium me-1">Istri Rumah Tangga</p>
                        <p class="text-sm text-gray-800 font-semibold">21</p>
                    </dl>
                    <dl class="flex items-center bg-gozi-100 py-2 px-4 rounded-md">
                        <p class="text-gray-500 text-sm font-medium me-1">Gap Year</p>
                        <p class="text-sm text-gray-800 font-semibold">90</p>
                    </dl>
                </div>
                <div id="column-chart" class="">
                    <!-- chart -->
                </div>
            </div>
            <div class="flex justify-between items-center pt-5 border-t-2 mt-4">
                <!-- Button -->
                <button
                    id="dropdownDefaultButton"
                    class="text-sm font-medium text-gray-500 text-center inline-flex items-center"
                    type="button">
                    Last 7 days
                    <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <a
                    href="#"
                    class="uppercase text-sm font-medium inline-flex items-center py-2 px-4 rounded-md text-gozi-50 bg-gozi-400 hover:bg-gozi-100 hover:text-gozi-900 duration-300">
                    Leads Report
                    <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="max-w-[30%] w-full border-[1px] flex flex-col items-center bg-white rounded-lg shadow p-4 md:p-6">
            <div class="flex justify-between items-start w-full">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-xl font-semibold leading-none text-gray-400 me-1">Persentase status alumni</h5>
                        <svg data-popover-target="chart-info" data-popover-placement="bottom" class="w-3.5 h-3.5 text-gray-500 hover:text-gray-900 cursor-pointer ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                        </svg>
                    </div>
                </div>
            </div>
            <!-- Line Chart -->
            <div class="py-6" id="pie-chart"></div>
        </div>
    </div>
</section>
<?= $this->include('layouts/footer'); ?>
<script>
    const bar_column = {
        series: [{
            name: "Total",
            color: "#92c4fe",
            data: ["1420", "1620", "1820", "1420", "1650", "2120"],
        }],
        chart: {
            sparkline: {
                enabled: false,
            },
            type: "bar",
            width: "100%",
            height: 300,
            toolbar: {
                show: false,
            },
        },
        fill: {
            opacity: 1,
        },
        plotOptions: {
            bar: {
                horizontal: true,
                columnWidth: "100%",
                borderRadiusApplication: "end",
                borderRadius: 6,
                dataLabels: {
                    position: "top",
                },
            },
        },
        legend: {
            show: true,
            position: "top",
        },
        dataLabels: {
            enabled: false,
        },
        tooltip: {
            shared: true,
            intersect: false,
            formatter: function(value) {
                return "$" + value
            }
        },
        xaxis: {
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                },
                formatter: function(value) {
                    return "$" + value
                },
            },
            categories: ["Kerja", "Kuliah", "BLK/LPK", "Wirusah", "IRT", "Gap Year"],
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
        },
        yaxis: {
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                }
            }
        },
        grid: {
            show: true,
            strokeDashArray: 4,
            padding: {
                left: 2,
                right: 2,
                top: -20
            },
        },
        fill: {
            opacity: 1,
        }
    }

    if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("column-chart"), bar_column);
        chart.render();
    }

    const getChartOptions = () => {
        return {
            series: [52.8, 26.8, 20.4],
            colors: ["#1C64F2", "#16BDCA", "#9061F9"],
            chart: {
                height: 420,
                width: "100%",
                type: "pie",
            },
            stroke: {
                colors: ["white"],
                lineCap: "",
            },
            plotOptions: {
                pie: {
                    labels: {
                        show: true,
                    },
                    size: "100%",
                    dataLabels: {
                        offset: -25
                    }
                },
            },
            labels: ["Direct", "Organic search", "Referrals"],
            dataLabels: {
                enabled: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            legend: {
                show: false,
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return value + "%"
                    },
                },
            },
            xaxis: {
                labels: {
                    formatter: function(value) {
                        return value + "%"
                    },
                },
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
        }
    }
    if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
        chart.render();
    }
</script>