<div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <style>
        .daterangepicker td.active, .daterangepicker td.active:hover {
            background-color: #6366f1 !important;
        }
        .daterangepicker .ranges li.active {
            background-color: #6366f1 !important;
        }
        .daterangepicker td.in-range {
            background-color: #eef2ff !important;
        }
    </style>

    <div
        x-data="{
            value: ['{{session('range_start')}}', '{{session('range_end')}}'],
            init() {
                $(this.$refs.picker).daterangepicker({
                    startDate: this.value[0],
                    endDate: this.value[1],
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                        'Year to Date': [moment().startOf('year'), moment()],
                        'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
                    },
                }, (start, end) => {
                    this.value[0] = start.format('MM/DD/YYYY')
                    this.value[1] = end.format('MM/DD/YYYY')

                    $wire.emit('updateDates', this.value[0], this.value[1]);
                })

                this.$watch('value', () => {
                    $(this.$refs.picker).data('daterangepicker').setStartDate(this.value[0])
                    $(this.$refs.picker).data('daterangepicker').setEndDate(this.value[1])
                })
            },
        }"
    >
        <input type="text" x-ref="picker" class="px-0 rounded-lg border bg-white border-slate-200 text-sm text-center">
    </div>
</div>
