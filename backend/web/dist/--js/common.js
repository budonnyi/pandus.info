!function ($) {
    "use strict";

    /*==============================================================
     Sparkline Line Chart Js
     ============================================================= */
    if ($("#sparkline-chart").length > 0) {
        $("#sparkline-chart").sparkline([0, 5, 3, 7, 5, 10, 3, 6, 5, 10], {
            width: "100",
            height: "35",
            lineColor: "#2952fc",
            fillColor: !1,
            spotColor: !1,
            minSpotColor: !1,
            maxSpotColor: !1,
            lineWidth: 1.50
        })
    }
    if ($("#sparkline-barchart").length > 0) {
        $('#sparkline-barchart').sparkline([10, 15, 7, 20, 18, 20, 15, 12, 7, 12, 20, 15], {
            type: 'bar',
            height: '30',
            barWidth: '4',
            resize: true,
            barSpacing: '5',
            barColor: '#f32c00'
        });
    }
    if ($("#discrete").length > 0) {
        $('#discrete').sparkline([5, 5, 6, 6, 7, 7, 6, 6, 7, 7, 8, 8, 7, 7, 8, 8, 9, 9, 8, 8, 9, 9, 10, 10], {
            type: 'discrete',
            width: "80",
            height: "40",
            lineColor: "#00a800"
        });
    }
    /*==============================================================
     Chart Js
     ============================================================= */
    if ($("#polar-chart").length > 0) {
        var randomScalingFactor = function () {
            return Math.round(Math.random() * 100);
        };

        var chartColors = window.chartColors;
        var color = Chart.helpers.color;
        var config1 = {
            data: {
                datasets: [{
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                        ],
                        backgroundColor: [
                            color(chartColors.red).alpha(0.9).rgbString(),
                            color(chartColors.orange).alpha(0.9).rgbString(),
                            color(chartColors.yellow).alpha(0.9).rgbString(),
                            color(chartColors.green).alpha(0.9).rgbString(),
                        ],
                    }],
            },
            options: {
                responsive: true,
            }
        };

        var ctx1 = document.getElementById('polar-chart');
        window.myPolarArea = Chart.PolarArea(ctx1, config1);
    }
    if ($("#pie-area").length > 0) {
        var randomScalingFactor = function () {
            return Math.round(Math.random() * 100);
        };
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                        ],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green,
                        ],
                    }],
            },
            options: {
                responsive: true
            }
        };

        var ctx = document.getElementById('pie-area').getContext('2d');
        window.myPie = new Chart(ctx, config);
    }
    if ($("#doughnut-chart").length > 0) {
        var randomScalingFactor = function () {
            return Math.round(Math.random() * 100);
        };

        var config3 = {
            type: 'doughnut',
            data: {
                datasets: [{
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                        ],
                        backgroundColor: [
                            window.chartColors.red,
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green,
                        ],
                    }],
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };


        var ctx = document.getElementById('doughnut-chart').getContext('2d');
        window.myDoughnut = new Chart(ctx, config3);
    }
    if ($("#redar-chart").length > 0) {
        var randomScalingFactor = function () {
            return Math.round(Math.random() * 100);
        };

        var color = Chart.helpers.color;
        var config2 = {
            type: 'radar',
            data: {
                labels: [['Eating'], ['Drinking'], 'Sleeping', ['Designing'], 'Coding', 'Cycling', ],
                datasets: [{
                        label: ' Data 1',
                        backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                        borderColor: window.chartColors.red,
                        pointBackgroundColor: window.chartColors.red,
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                        ]
                    }, {
                        label: 'Data 2',
                        backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                        borderColor: window.chartColors.blue,
                        pointBackgroundColor: window.chartColors.blue,
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                        ]
                    }]
            },
            options: {
                legend: {
                    position: 'top',
                },
                scale: {
                    ticks: {
                        beginAtZero: true
                    }
                }
            }
        };
        window.myRadar = new Chart(document.getElementById('redar-chart'), config2);
    }
    if ($("#myChart-light").length > 0) {
        var ctx = document.getElementById('myChart-light').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["", "", "", "", "", "", ""],
                datasets: [{
                        backgroundColor: '#bdd4fb',
                        borderColor: '#397ff3',
                        data: [10, 15, 14, 20, 18, 20, 25]
                    }]
            },
            // Configuration options go here
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                            display: false
                        }],
                    yAxes: [{
                            display: false
                        }]
                },
                elements: {
                    line: {
                        tension: 0.00001,
                        //tension: 0.4,
                        borderWidth: 1
                    }
                }
            }
        });
    }
    if ($("#chart2").length > 0) {
        var ctx = document.getElementById('chart2').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        data: [10, 30, 80, 61, 26, 75, 40]
                    },
                    {
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ],
                scaleBeginAtZero: true,
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,0.8)",
                scaleGridLineWidth: 0,
                scaleShowHorizontalLines: true,
                scaleShowVerticalLines: true,
                barShowStroke: true,
                barStrokeWidth: 0,
                tooltipCornerRadius: 2,
                barDatasetSpacing: 3,
                responsive: true
            }
        });
    }


    /*==============================================================
     Sparkline Line Chart Js
     ============================================================= */
    if ($("#sparkline-chart").length > 0) {
        $("#sparkline-chart").sparkline([0, 5, 3, 7, 5, 10, 3, 6, 5, 10], {
            width: "120",
            height: "35",
            lineColor: "#2952fc",
            fillColor: !1,
            spotColor: !1,
            minSpotColor: !1,
            maxSpotColor: !1,
            lineWidth: 1.50
        })
    }
    if ($("#sparkline-barchart").length > 0) {
        $('#sparkline-barchart').sparkline([10, 15, 7, 20, 18, 20, 15, 12, 7, 12, 20, 15], {
            type: 'bar',
            height: '30',
            barWidth: '4',
            resize: true,
            barSpacing: '5',
            barColor: '#f32c00'
        });
    }
    if ($("#discrete").length > 0) {
        $('#discrete').sparkline([5, 5, 6, 6, 7, 7, 6, 6, 7, 7, 8, 8, 7, 7, 8, 8, 9, 9, 8, 8, 9, 9, 10, 10], {
            type: 'discrete',
            width: "80",
            height: "40",
            lineColor: "#00a800"
        });
    }
    if ($("#sparkline_bar").length > 0) {
        $('#sparkline_bar').sparkline([8, 9, 10, 11, 10, 10, 12, 10, 10, 11, 9, 12, 11, 10, 9, 11, 13, 13, 12], {
            type: "bar",
            width: "100",
            barWidth: 5,
            height: "55",
            barColor: "#fe2500",
            negBarColor: "#fe2500"
        });
    }
    if ($("#sparkline_bar2").length > 0) {
        $('#sparkline_bar2').sparkline([9, 11, 12, 13, 12, 13, 10, 14, 13, 11, 11, 12, 11, 11, 10, 12, 11, 10], {
            type: "bar",
            width: "100",
            barWidth: 5,
            height: "55",
            barColor: "#0c61ff",
            negBarColor: "#43c3ff"
        });
    }
    if ($("#sparkline-bar").length > 0) {
        $("#sparkline-bar").sparkline([5, 6, 2, 8, 9, 4, 7, 10, 11, 12, 10, 4, 7, 10], {
            type: 'bar',
            height: '200',
            barWidth: 10,
            barSpacing: 7,
            barColor: '#4baf4f'
        });
    }
    if ($("#composite-bar").length > 0) {
        $('#composite-bar').sparkline([5, 6, 2, 9, 4, 7, 10, 12, 4, 7, 10], {
            type: 'bar',
            height: '200',
            barWidth: '10',
            resize: true,
            barSpacing: '7',
            barColor: '#f54339'
        });
    }
    if ($("#composite-bar").length > 0) {
        $('#composite-bar').sparkline([5, 6, 2, 9, 4, 7, 10, 12, 4, 7, 10], {
            type: 'line',
            height: '200',
            lineColor: '#f54339',
            fillColor: 'transparent',
            composite: true,
            highlightLineColor: 'rgba(0,0,0,.1)',
            highlightSpotColor: 'rgba(0,0,0,.2)'
        });
    }
    if ($("#sparkline-pie").length > 0) {
        $('#sparkline-pie').sparkline([20, 40, 30], {
            type: 'pie',
            height: '200',
            resize: true,
            sliceColors: ['#02bcd5', '#5651ec', '#f6fafb']
        });
    }
    if ($("#sparkline-line").length > 0) {
        $("#sparkline-line").sparkline([0, 23, 43, 35, 44, 45, 56, 37, 40, 45, 56, 7, 10], {
            type: 'line',
            width: '100%',
            height: '200',
            lineColor: '#5651ec',
            fillColor: 'transparent',
            spotColor: '#fff',
            minSpotColor: undefined,
            maxSpotColor: undefined,
            highlightSpotColor: undefined,
            highlightLineColor: undefined
        });
    }
    if ($("#sparkline-line2").length > 0) {
        $('#sparkline-line2').sparkline([15, 23, 55, 35, 54, 45, 66, 47, 30], {
            type: 'line',
            width: '100%',
            height: '200',
            chartRangeMax: 50,
            resize: true,
            lineColor: '#02bcd5',
            fillColor: 'rgba(2, 188, 213, 0.3)',
            highlightLineColor: 'rgba(0,0,0,.1)',
            highlightSpotColor: 'rgba(0,0,0,.2)',
        });
    }

    if ($("#sparkline-line2").length > 0) {
        $('#sparkline-line2').sparkline([0, 13, 10, 14, 15, 10, 18, 20, 0], {
            type: 'line',
            width: '100%',
            height: '200',
            chartRangeMax: 40,
            lineColor: '#5651ec',
            fillColor: 'rgba(86, 81, 236, 0.3)',
            composite: true,
            resize: true,
            highlightLineColor: 'rgba(0,0,0,.1)',
            highlightSpotColor: 'rgba(0,0,0,.2)',
        });
    }
    if ($("#sparkline-graff").length > 0) {
        $("#sparkline-graff").sparkline([2, 4, 4, 6, 8, 5, 6, 4, 8, 6, 6, 2], {
            type: 'line',
            width: '100%',
            height: '200',
            lineColor: '#99d683',
            fillColor: '#99d683',
            maxSpotColor: '#99d683',
            highlightLineColor: 'rgba(0, 0, 0, 0.2)',
            highlightSpotColor: '#99d683'
        });
    }
    /*==============================================================
     Morris garff Chart Js
     ============================================================= */
    if ($("#morris-area-chart").length > 0) {
        Morris.Area({
            element: 'morris-area-chart',
            data: [{
                    period: '2010',
                    iphone: 0,
                    ipad: 0,
                    itouch: 0
                }, {
                    period: '2011',
                    iphone: 130,
                    ipad: 100,
                    itouch: 80
                }, {
                    period: '2012',
                    iphone: 80,
                    ipad: 60,
                    itouch: 70
                }, {
                    period: '2013',
                    iphone: 70,
                    ipad: 200,
                    itouch: 160
                }, {
                    period: '2014',
                    iphone: 180,
                    ipad: 150,
                    itouch: 120
                }, {
                    period: '2015',
                    iphone: 105,
                    ipad: 100,
                    itouch: 90
                },
                {
                    period: '2016',
                    iphone: 250,
                    ipad: 150,
                    itouch: 200
                }],
            xkey: 'period',
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['iPhone', 'iPad', 'iPod Touch'],
            pointSize: 0,
            fillOpacity: 1,
            pointStrokeColors: ['#f9a94a', '#9884da ', '#776ae4'],
            behaveLikeLine: true,
            gridLineColor: '#ebebeb',
            lineWidth: 0,
            hideHover: 'auto',
            lineColors: ['#f9a94a', '#9884da ', '#776ae4'],
            resize: true

        });
    }


    /*==============================================================
     Morris Bars Chart Js
     ============================================================= */
    if ($("#morris-bar-chart").length > 0) {
        Morris.Bar({
            element: 'morris-bar-chart',
            data: [{
                    y: '2006',
                    a: 40,
                    b: 60,
                }, {
                    y: '2007',
                    a: 70,
                    b: 80,
                }, {
                    y: '2008',
                    a: 40,
                    b: 60,
                }, {
                    y: '2009',
                    a: 70,
                    b: 90,
                },
            ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['A', 'B'],
            barColors: ['#16cce1', '#5651ec'],
            hideHover: 'auto',
            gridLineColor: '#eef0f2',
            resize: true
        });
    }
    /*==============================================================
     Morris Line Chart Js
     ============================================================= */
    if ($("#morris-line-chart").length > 0) {
        var line = new Morris.Line({
            element: 'morris-line-chart',
            resize: true,
            data: [
                {y: '2011 Q1', item1: 2666},
                {y: '2011 Q2', item1: 2778},
                {y: '2011 Q3', item1: 4912},
                {y: '2011 Q4', item1: 3767},
                {y: '2012 Q1', item1: 6810},
                {y: '2012 Q2', item1: 5670},
                {y: '2012 Q3', item1: 4820},
                {y: '2012 Q4', item1: 15073},
                {y: '2013 Q1', item1: 10687},
                {y: '2013 Q2', item1: 8432}
            ],
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Item 1'],
            gridLineColor: '#eef0f2',
            lineColors: ['#5651ec'],
            lineWidth: 1,
            hideHover: 'auto'
        });
    }
    /*==============================================================
     Morris Donut Chart Js
     ============================================================= */
    if ($("#morris-donut-chart").length > 0) {
        Morris.Donut({
            element: 'morris-donut-chart',
            data: [{
                    label: "Download Sales",
                    value: 12,
                }, {
                    label: "In-Store Sales",
                    value: 30
                }, {
                    label: "Mail-Order Sales",
                    value: 20
                }],
            resize: true,
            colors: ['#4baf4f', '#02bcd5', '#5651ec']
        });
    }


    /*==============================================================
     Peity Graff Js
     ============================================================= */
    if ($(".line").length > 0) {
        $(".line").peity("line");
    }


    /*==============================================================
     Click Checkbox Header Fix Js
     ============================================================= */
    $('#rightside-scroll').on('click', '#checkbox1', function (event) {
        if ($(this).is(":checked")) {
            $('#header-fix').addClass('fixed-top');
        } else {
            $('#header-fix').removeClass('fixed-top');
        }
    });





    /*==============================================================
     Image Convert to Background Image Js
     ============================================================= */

    $('.background-image-maker').each(function () {
        var imgURL = $(this).next('.holder-image').find('img').attr('src');
        $(this).css('background-image', 'url(' + imgURL + ')');
    });


    /*==============================================================
     Click Auto Close Cards Js
     ============================================================= */
    $('.close-icon').on('click', function () {
        $(this).closest('.card').fadeOut();
    })

    /*==============================================================
     Slimscroll Js 
     ============================================================= */

    $('#rightside-scroll').slimScroll({
        height: '100%'
    });
    $('.scrollerchat').slimScroll({
    
    height: '500px'
    });


    /*==============================================================
     Megnific Popup Js
     ============================================================= */
    $('a.btn-gallery').on('click', function (event) {
        event.preventDefault();
        $('.megnify-popup').magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image',
            gallery: {enabled: true},
        });
    });
    /*==============================================================
     Sidebar Js 
     ============================================================= */

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    });
    $('#menu').metisMenu().show();

    /*==============================================================
     tablesaw  Js
     =============================================================*/

    $(document).trigger("enhance.tablesaw");




    /*==============================================================
     Masonry
     =============================================================*/

    var $container = $('.portfolio-box');
    $container.imagesLoaded(function () {
        $container.masonry({
            columnWidth: '.post',
            itemSelector: '.post'
        });
    });

    //Reinitialize masonry inside each panel after the relative tab link is clicked - 
    $('a[data-toggle=tab]').each(function () {
        var $this = $(this);
        $this.on('shown.bs.tab', function () {
            $container.masonry({
                columnWidth: '.post',
                itemSelector: '.post'
            });
        }); //end shown
    });  //end each

    /*==============================================================
     Back To Top Js 
     ============================================================= */

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').on('click', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });


    /*==============================================================
     Form Validator Data-Api Js 
     ============================================================= */
    $(window).on('load', function () {
        $('form[data-toggle="validator"]').each(function () {
            var $form = $(this)
            Plugin.call($form, $form.data())
        })
    })











    /*==============================================================
     Counter Js 
     ============================================================= */
    $('.counter_number').counterUp({
        delay: 1,
        time: 1600
    });


    /*==============================================================
     Sidechat Js
     ============================================================= */
    $('.setting').on('click', function () {
        $('#sidechat').toggleClass('active');

    });

    /*==============================================================
     Summer Note Editor
     =============================================================*/
    $('.summernote').summernote();
    var edit = function () {
        $('.click2edit').summernote({focus: true});
    };
    var save = function () {
        var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
        $('.click2edit').destroy();
    };

    /*==============================================================
     DropZone 
     =============================================================*/


    $('#dropzone').on('dragover', function () {
        $(this).addClass('hover');
    });

    $('#dropzone').on('dragleave', function () {
        $(this).removeClass('hover');
    });

    $('#dropzone input').on('change', function (e) {
        var file = this.files[0];

        $('#dropzone').removeClass('hover');

        if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
            return alert('File type not allowed.');
        }

        $('#dropzone').addClass('dropped');
        $('#dropzone img').remove();

        if ((/^image\/(gif|png|jpeg)$/i).test(file.type)) {
            var reader = new FileReader(file);

            reader.readAsDataURL(file);

            reader.onload = function (e) {
                var data = e.target.result,
                        $img = $('<img />').attr('src', data).fadeIn();

                $('#dropzone div').html($img);
            };
        } else {
            var ext = file.name.split('.').pop();

            $('#dropzone div').html(ext);
        }
    });

    /*==============================================================
     Alert Popup Js
     =============================================================*/
    if ($('.sweet-1').length > 0) {
        document.querySelector('.sweet-1').onclick = function () {
            swal("Here's a message!");
        };
    }

    if ($('.sweet-2').length > 0) {
        document.querySelector('.sweet-2').onclick = function () {
            swal("Here's a message!", "It's pretty, isn't it?")
        };
    }
    if ($('.sweet-3').length > 0) {
        document.querySelector('.sweet-3').onclick = function () {
            swal("Here's a message!", "Custom HTML Message!!")
        };
    }
    if ($('.sweet-4').length > 0) {
        document.querySelector('.sweet-4').onclick = function () {
            swal("Good job!", "You clicked the button!", "success");
        };
    }
    if ($('.sweet-5').length > 0) {
        document.querySelector('.sweet-5').onclick = function () {
            swal({
                title: "Are you sure?",
                text: "You clicked the button!",
                type: "info",
                confirmButtonClass: 'btn-primary',
            });
        };
    }
    if ($('.sweet-6').length > 0) {
        document.querySelector('.sweet-6').onclick = function () {
            swal({
                title: "Are you sure?",
                text: "You clicked the button!",
                type: "warning",
                confirmButtonClass: 'btn-primary',
            });
        };
    }
    if ($('.sweet-7').length > 0) {
        document.querySelector('.sweet-7').onclick = function () {
            swal({
                title: "Are you sure?",
                text: "You clicked the button!",
                type: "error",
                confirmButtonClass: 'btn-primary',
            });
        };
    }
    if ($('.sweet-8').length > 0) {
        document.querySelector('.sweet-8').onclick = function () {
            swal({
                title: "Sweet!",
                text: "Here's a custom image.",
                imageUrl: 'dist/images/thumbs-up.jpg'
            });
        };
    }
    if ($('.sweet-9').length > 0) {
        document.querySelector('.sweet-9').onclick = function () {
            swal({
                title: "Auto close alert!",
                text: "I will close in 3 seconds.",
                timer: 2000,
                showConfirmButton: true
            });
        };
    }
    if ($('.sweet-10').length > 0) {
        document.querySelector('.sweet-10').onclick = function () {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: false,
                confirmButtonClass: 'btn-primary',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
                    function (isConfirm) {
                        if (isConfirm) {
                            swal("Deleted!", "Your imaginary file has been deleted!", "success");
                        } else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });
        };
    }
    if ($('.sweet-11').length > 0) {
        document.querySelector('.sweet-11').onclick = function () {
            swal({
                title: "",
                text: 'Write something interesting:',
                type: 'input',
                showCancelButton: false,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Write something",
            },
                    function (inputValue) {
                        if (inputValue === false)
                            return false;
                        if (inputValue === "") {
                            swal.showInputError("You need to write something!");
                            return false;
                        }
                        swal("Nice!", 'You wrote: ' + inputValue, "success");
                    });
        };
    }
    if ($('.sweet-12').length > 0) {
        document.querySelector('.sweet-12').onclick = function () {
            swal({
                title: "Ajax request example",
                text: "Submit to run ajax request",
                type: "info",
                showCancelButton: false,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                setTimeout(function () {
                    swal("Ajax request finished!");
                }, 2000);
            });
        };
    }
    if ($('.sweet-13').length > 0) {
        document.querySelector('.sweet-13').onclick = function () {
            swal({
                title: "Message",
                text: 'A Custom <span style="color:#2e5aef">Html<span> Message.',
                html: true
            });
        };
    }

    /*==============================================================
     Toastr Alert Js
     =============================================================*/
    toastr.options = {
        "debug": false,
        "newestOnTop": false,
        "positionClass": "toast-bottom-right",
        "closeButton": true,
        "progressBar": true
    };
    $('.homerDemo1').on('click', function (event) {
        toastr.info('Info - <br /> This is a custom info notification');
    });
    $('.homerDemo2').on('click', function (event) {
        toastr.success('Success - <br /> This is a success notification');
    });
    $('.homerDemo3').on('click', function (event) {
        toastr.warning('Warning - <br /> This is a warning notification');
    });
    $('.homerDemo4').on('click', function (event) {
        toastr.error('Error - <br /> This is a error notification');
    });

    /*==============================================================
     knob Line Chart Js
     ============================================================= */

    $('[data-plugin="knob"]').knob();



    /*==============================================================
     Pie Chart Js
     =============================================================*/
    if ($('#container').length > 0) {
        Highcharts.chart('container', {
            chart: {
                type: 'pie',
                height: 236
            },
            title: {
                text: ''
            },
            series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: [
                        {
                            name: 'Video Ads',
                            y: 5.27,
                            drilldown: 'IE'
                        },
                        {
                            name: 'Affiliate',
                            y: 9.13,
                            drilldown: 'IE'
                        },
                        {
                            name: 'Email',
                            y: 12.1,
                            drilldown: 'IE'
                        },
                        {
                            name: 'Direct',
                            y: 13.08,
                            drilldown: 'IE'
                        },
                        {
                            name: 'Search',
                            y: 60.42,
                            drilldown: 'IE'
                        },
                    ]
                }]
        });
    }
    
      /*==============================================================
                        Form Step Js 
            ============================================================= */
    
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").on('click',function(){
                if(animating) return false;
                animating = true;

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //activate next step on progressbar using the index of next_fs
                $(".progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show(); 
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                        step: function(now, mx) {
                                //as the opacity of current_fs reduces to 0 - stored in "now"
                                //1. scale current_fs down to 80%
                                scale = 1 - (1 - now) * 0.2;
                                //2. bring next_fs from the right(50%)
                                left = (now * 50)+"%";
                                //3. increase opacity of next_fs to 1 as it moves in
                                opacity = 1 - now;
                                current_fs.css({
                'transform': 'scale('+scale+')',
                'position': 'absolute'
              });
                                next_fs.css({'left': left, 'opacity': opacity});
                        }, 
                        duration: 500, 
                        complete: function(){
                                current_fs.hide();
                                animating = false;
                        }, 
                        //this comes from the custom easing plugin
                        easing: 'easeInCirc'
                });
        });

        $(".previous").on('click',function(){
                if(animating) return false;
                animating = true;

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //de-activate current step on progressbar
                $(".progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show(); 
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                        step: function(now, mx) {
                                //as the opacity of current_fs reduces to 0 - stored in "now"
                                //1. scale previous_fs from 80% to 100%
                                scale = 0.8 + (1 - now) * 0.2;
                                //2. take current_fs to the right(50%) - from 0%
                                left = ((1-now) * 50)+"%";
                                //3. increase opacity of previous_fs to 1 as it moves in
                                opacity = 1 - now;
                                current_fs.css({'left': left});
                                previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
                        }, 
                        duration: 500, 
                        complete: function(){
                                current_fs.hide();
                                animating = false;
                        }, 
                        //this comes from the custom easing plugin
                        easing: 'easeInCirc'
                });
        });


}(window.jQuery);




