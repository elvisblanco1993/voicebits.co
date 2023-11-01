<div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <div x-data="{
            downloads: [],
            labels: [],
            init() {
                let dataFromDB = {{json_encode($dbdata, JSON_NUMERIC_CHECK)}}

                let dataLabels = [];
                let downloadsData = [];

                for (var i = 0; i < dataFromDB.length; i++) {
                    dataLabels.push(dataFromDB[i]['dateformatted'])
                    downloadsData.push(dataFromDB[i]['downloads'])
                }

                $data.labels = dataLabels;
                $data.downloads = downloadsData;

                let chart = new ApexCharts(this.$refs.chart, this.options)
                chart.render()

                this.$watch('downloads', () => {
                    chart.updateOptions(this.options)
                })
            },
            get options() {
                return {
                    chart: {
                        type: 'area',
                        toolbar: false,
                        height: 400,
                        colors: ['#e0e7ff'],
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    fill: {
                        colors: ['#6366f1'],
                    },
                    legend: {
                        show: false,
                    },
                    stroke: {
                        show: true,
                        curve: 'smooth',
                        lineCap: 'butt',
                        colors: ['#6366f1'],
                        width: 2,
                        dashArray: 0,
                    },
                    tooltip: {
                        marker: false,
                        colors: ['#e0e7ff', '#818cf8'],
                    },
                    markers: {
                        colors: ['#e0e7ff', '#818cf8'],
                    },
                    xaxis: {
                        categories: this.labels
                    },
                    yaxis: {
                        forceNiceScale: true,
                        decimalsInFloat: 0,
                    },
                    series: [{
                        name: 'Downloads',
                        data: this.downloads,
                    }],
                }
            }
        }"
        class="w-full bg-white rounded-lg shadow-sm py-6"
        >
            <div class="text-slate-600 flex items-center space-x-2 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-amber-200">
                    <path fill-rule="evenodd" d="M10.5 3.75a6 6 0 00-5.98 6.496A5.25 5.25 0 006.75 20.25H18a4.5 4.5 0 002.206-8.423 3.75 3.75 0 00-4.133-4.303A6.001 6.001 0 0010.5 3.75zm2.25 6a.75.75 0 00-1.5 0v4.94l-1.72-1.72a.75.75 0 00-1.06 1.06l3 3a.75.75 0 001.06 0l3-3a.75.75 0 10-1.06-1.06l-1.72 1.72V9.75z" clip-rule="evenodd" />
                </svg>
                <p class="text-sm text-slate-600">Podcast downloads</p>
            </div>
            <div x-ref="chart"></div>
    </div>
</div>
