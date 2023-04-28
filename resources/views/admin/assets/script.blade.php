<!-- Start Core Plugins
        =====================================================================-->
<!-- jQuery -->
<script src="{{ url('/') }}/admin/assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
<!-- jquery-ui -->
<script src="{{ url('/') }}/admin/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript">
</script>
<!-- Bootstrap -->
<script src="{{ url('/') }}/admin/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- lobipanel -->
<script src="{{ url('/') }}/admin/assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
<!-- Pace js -->
<script src="{{ url('/') }}/admin/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="{{ url('/') }}/admin/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript">
</script>
<!-- FastClick -->
{{-- <script src="{{ url('/') }}/admin/assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script> --}}
<!-- AdminBD frame -->
<script src="{{ url('/') }}/admin/assets/dist/js/frame.js" type="text/javascript"></script>
<!-- End Core Plugins
        =====================================================================-->
<!-- Start Page Lavel Plugins
        =====================================================================-->
<!-- Form  wizard js -->
<script src="{{ url('/') }}/admin/assets/plugins/bootstrap-wizard/jquery.backstretch.min.js"
    type="text/javascript"></script>
<script src="{{ url('/') }}/admin/assets/plugins/bootstrap-wizard/form.scripts.js" type="text/javascript"></script>
<!-- Toastr js -->
<script src="{{ url('/') }}/admin/assets/plugins/toastr/toastr.min.js" type="text/javascript"></script>
<!-- Sparkline js -->
<script src="{{ url('/') }}/admin/assets/plugins/sparkline/sparkline.min.js" type="text/javascript"></script>
<!-- Data maps js -->
<script src="{{ url('/') }}/admin/assets/plugins/datamaps/d3.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/admin/assets/plugins/datamaps/topojson.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/admin/assets/plugins/datamaps/datamaps.all.min.js" type="text/javascript"></script>
<!-- Counter js -->
<script src="{{ url('/') }}/admin/assets/plugins/counterup/waypoints.js" type="text/javascript"></script>
<script src="{{ url('/') }}/admin/assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript">
</script>
<!-- Emojionearea -->
<script src="{{ url('/') }}/admin/assets/plugins/emojionearea/emojionearea.min.js" type="text/javascript">
</script>
<!-- Monthly js -->
<script src="{{ url('/') }}/admin/assets/plugins/monthly/monthly.js" type="text/javascript"></script>
<!-- End Page Lavel Plugins
        =====================================================================-->
<!-- Start Theme label Script
        =====================================================================-->
<!-- dataTables js -->
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<!-- Dashboard js -->
<script src="{{ url('/') }}/admin/assets/dist/js/dashboard.js" type="text/javascript"></script>
<!-- End Theme label Script
        =====================================================================-->
<script>
    $(document).ready(function() {

        "use strict"; // Start of use strict

        // $("#dataTableExample2").DataTable({
        //     dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
        //     "lengthMenu": [
        //         [10, 25, 50, -1],
        //         [10, 25, 50, "All"]
        //     ],
        //     buttons: [{
        //             extend: 'copy',
        //             className: 'btn-sm'
        //         },
        //         {
        //             extend: 'csv',
        //             title: 'ExampleFile',
        //             className: 'btn-sm'
        //         },
        //         {
        //             extend: 'excel',
        //             title: 'ExampleFile',
        //             className: 'btn-sm'
        //         },
        //         {
        //             extend: 'pdf',
        //             title: 'ExampleFile',
        //             className: 'btn-sm'
        //         },
        //         {
        //             extend: 'print',
        //             className: 'btn-sm'
        //         }
        //     ]
        // });

        // notification
        // setTimeout(function() {
        //     toastr.options = {
        //         closeButton: true,
        //         progressBar: true,
        //         showMethod: 'slideDown',
        //         timeOut: 4000
        //         //                        positionClass: "toast-top-left"
        //     };
        //     toastr.error('Responsive Admin Theme', 'Welcome to AdminBD');

        // }, 1300);

        //counter
        $('.count-number').counterUp({
            delay: 10,
            time: 5000
        });

        //data maps
        var basic_choropleth = new Datamap({
            element: document.getElementById("map1"),
            projection: 'mercator',
            fills: {
                defaultFill: "#37a000",
                authorHasTraveledTo: "#fa0fa0"
            },
            data: {
                USA: {
                    fillKey: "authorHasTraveledTo"
                },
                JPN: {
                    fillKey: "authorHasTraveledTo"
                },
                ITA: {
                    fillKey: "authorHasTraveledTo"
                },
                CRI: {
                    fillKey: "authorHasTraveledTo"
                },
                KOR: {
                    fillKey: "authorHasTraveledTo"
                },
                DEU: {
                    fillKey: "authorHasTraveledTo"
                }
            }
        });

        var colors = d3.scale.category10();

        window.setInterval(function() {
            basic_choropleth.updateChoropleth({
                USA: colors(Math.random() * 10),
                RUS: colors(Math.random() * 100),
                AUS: {
                    fillKey: 'authorHasTraveledTo'
                },
                BRA: colors(Math.random() * 50),
                CAN: colors(Math.random() * 50),
                ZAF: colors(Math.random() * 50),
                IND: colors(Math.random() * 50)
            });
        }, 2000);

        //Chat list
        $('.chat_list').slimScroll({
            size: '3px',
            height: '305px'
        });

        // Message
        $('.message_inner').slimScroll({
            size: '3px',
            height: '320px'
            //                    position: 'left'
        });

        //emojionearea
        $(".emojionearea").emojioneArea({
            pickerPosition: "top",
            tonesStyle: "radio"
        });

        //monthly calender
        $('#m_calendar').monthly({
            mode: 'event',
            //jsonUrl: 'events.json',
            //dataType: 'json'
            xmlUrl: 'events.xml'
        });

        //Sparklines Charts
        $('.sparkline1').sparkline([4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 7, 4, 3, 1, 5,
            7, 6, 6, 5, 5, 4, 4, 3, 3, 4, 4, 5
        ], {
            type: 'bar',
            barColor: '#37a000',
            height: '35',
            barWidth: '3',
            barSpacing: 2
        });

        $(".sparkline2").sparkline([-8, 2, 4, 3, 5, 4, 3, 5, 5, 6, 3, 9, 7, 3, 5, 6, 9, 5, 6, 7, 2, 3, 9, 6, 6,
            7, 8, 10, 15, 16, 17, 15
        ], {
            type: 'line',
            height: '35',
            width: '100%',
            lineColor: '#37a000',
            fillColor: '#fff'
        });

        $(".sparkline3").sparkline([2, 5, 3, 7, 5, 10, 3, 6, 5, 7], {
            type: 'line',
            height: '35',
            width: '100%',
            lineColor: '#37a000',
            fillColor: '#fff'
        });

        $(".sparkline4").sparkline([10, 34, 13, 33, 35, 24, 32, 24, 52, 35], {
            type: 'line',
            height: '35',
            width: '100%',
            lineColor: '#37a000',
            fillColor: 'rgba(55, 160, 0, 0.7)'
        });

        $(".sparkline5").sparkline([4, 2], {
            type: 'pie',
            sliceColors: ['#37a000', '#2c3136']
        });

        $(".sparkline6").sparkline([3, 2], {
            type: 'pie',
            sliceColors: ['#37a000', '#2c3136']
        });

        $(".sparkline7").sparkline([4, 1], {
            type: 'pie',
            sliceColors: ['#37a000', '#2c3136']
        });

        $(".sparkline8").sparkline([1, 3], {
            type: 'pie',
            sliceColors: ['#37a000', '#2c3136']
        });

        $(".sparkline9").sparkline([3, 5], {
            type: 'pie',
            sliceColors: ['#37a000', '#2c3136']
        });

    });
</script>
