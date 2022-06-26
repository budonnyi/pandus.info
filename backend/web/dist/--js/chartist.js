/*==============================================================
 Chartist Bar Chart Js
 ============================================================= */
if ($(".bar-chart").length > 0) {
    new Chartist.Bar('.bar-chart', {
        labels: ['2010', '2011', '2012', '2013', '2014', '2015'],
        series: [180, 100, 180, 90, 50, 190]
    }, {
        distributeSeries: true
    });

}
/*==============================================================
 Chartist Chart Js
 ============================================================= */
if ($(".app_sales").length > 0) {
    new Chartist.Line('.app_sales', {
        labels: [1, 2, 3, 4, 5, 6, 7],
        series: [
            [3, 1, 2, 0, 2.5, 1, 2],
            [-2, -3, -1.5, -2.5, 1, -1, -2],
            [-1, 0, -1, 2, -1, -0.2, -1],
        ]
    },
            {
                high: 3,
                low: -3,
                fullWidth: true,
                // As this is axis specific we need to tell Chartist to use whole numbers only on the concerned axis
                axisY: {
                    onlyInteger: true,
                    offset: 20
                }
            });
}
/*==============================================================
 Line Scatter Diagram Chart Js
 ============================================================= */
if ($(".chartist1").length > 0) {
    var times = function (n) {
        return Array.apply(null, new Array(n));
    };

    var data = times(52).map(Math.random).reduce(function (data, rnd, index) {
        data.labels.push(index + 1);
        data.series.forEach(function (series) {
            series.push(Math.random() * 100)
        });

        return data;
    }, {
        labels: [],
        series: times(4).map(function () {
            return new Array()
        })
    });

    var options = {
        showLine: false,
        axisX: {
            labelInterpolationFnc: function (value, index) {
                return index % 13 === 0 ? 'W' + value : null;
            }
        }
    };

    var responsiveOptions = [
        ['screen and (min-width: 640px)', {
                axisX: {
                    labelInterpolationFnc: function (value, index) {
                        return index % 4 === 0 ? 'W' + value : null;
                    }
                }
            }]
    ];
    new Chartist.Line('.chartist1', data, options, responsiveOptions);
}


/*==============================================================
 Svg Path Animation Chart Js
 ============================================================= */
if ($(".chartist2").length > 0) {
    var chart = new Chartist.Line('.chartist2', {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        series: [
            [1, 5, 2, 5, 4, 3],
            [2, 3, 4, 8, 1, 2],
            [5, 4, 3, 2, 1, 0.5]
        ]
    }, {
        low: 0,
        showArea: true,
        showPoint: false,
        fullWidth: true
    });
    chart.on('draw', function (data) {
    if (data.type === 'line' || data.type === 'area') {
        data.element.animate({
            d: {
                begin: 2000 * data.index,
                dur: 2000,
                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                to: data.path.clone().stringify(),
                easing: Chartist.Svg.Easing.easeOutQuint
            }
        });
    }
});
}



/*==============================================================
 Line Chart With Area Js
 ============================================================= */
if ($(".chartist3").length > 0) {
    new Chartist.Line('.chartist3', {
        labels: [1, 2, 3, 4, 5, 6, 7, 8],
        series: [
            [5, 9, 7, 8, 5, 3, 5, 4]
        ]
    }, {
        low: 0,
        showArea: true
    });
}
/*==============================================================
 Bi-Polar Line Chart With Area Js
 ============================================================= */
if ($(".chartist4").length > 0) {
    new Chartist.Line('.chartist4', {
        labels: [1, 2, 3, 4, 5, 6, 7, 8],
        series: [
            [1, 2, 3, 1, -2, 0, 1, 0],
            [-2, -1, -2, -1, -2.5, -1, -2, -1],
            [0, 0, 0, 1, 2, 2.5, 2, 1],
            [2.5, 2, 1, 0.5, 1, 0.5, -1, -2.5]
        ]
    }, {
        high: 3,
        low: -3,
        showArea: true,
        showLine: false,
        showPoint: false,
        fullWidth: true,
        axisX: {
            showLabel: false,
            showGrid: false
        }
    });
}
/*==============================================================
 Stacked Bar Chart Js
 ============================================================= */
if ($(".chartist5").length > 0) {
    new Chartist.Bar('.chartist5', {
        labels: ['Q1', 'Q2', 'Q3', 'Q4'],
        series: [
            [800000, 1200000, 1400000, 1300000],
            [200000, 400000, 500000, 300000],
            [100000, 200000, 400000, 600000]
        ]
    }, {
        stackBars: true,
        axisY: {
            labelInterpolationFnc: function (value) {
                return (value / 1000) + 'k';
            }
        }
    }).on('draw', function (data) {
        if (data.type === 'bar') {
            data.element.attr({
                style: 'stroke-width: 30px'
            });
        }
    });
}
/*==============================================================
 Horizontal Bar Chart Js
 ============================================================= */
if ($(".chartist6").length > 0) {
    new Chartist.Bar('.chartist6', {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        series: [
            [5, 4, 3, 7, 5, 10, 3],
            [3, 2, 9, 5, 4, 6, 4]
        ]
    }, {
        seriesBarDistance: 10,
        reverseData: true,
        horizontalBars: true,
        axisY: {
            offset: 70
        }
    });
}
/*==============================================================
 Pie Chart Js
 ============================================================= */
if ($(".chartist7").length > 0) {
    var data = {
        series: [5, 3, 4]
    };

    var sum = function (a, b) {
        return a + b
    };

    new Chartist.Pie('.chartist7', data, {
        labelInterpolationFnc: function (value) {
            return Math.round(value / data.series.reduce(sum) * 100) + '%';
        }
    });
}
/*==============================================================
 Animated Donut Chart Js
 ============================================================= */
if ($(".chartist8").length > 0) {
    var chart = new Chartist.Pie('.chartist8', {
        series: [10, 20, 50, 20, 5, 50, 15],
        labels: [1, 2, 3, 4, 5, 6, 7]
    }, {
        donut: true,
        showLabel: false
    });

    chart.on('draw', function (data) {
        if (data.type === 'slice') {
            // Get the total path length in order to use for dash array animation
            var pathLength = data.element._node.getTotalLength();

            // Set a dasharray that matches the path length as prerequisite to animate dashoffset
            data.element.attr({
                'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
            });

            // Create animation definition while also assigning an ID to the animation for later sync usage
            var animationDefinition = {
                'stroke-dashoffset': {
                    id: 'anim' + data.index,
                    dur: 1000,
                    from: -pathLength + 'px',
                    to: '0px',
                    easing: Chartist.Svg.Easing.easeOutQuint,
                    // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
                    fill: 'freeze'
                }
            };

            // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
            if (data.index !== 0) {
                animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
            }

            // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
            data.element.attr({
                'stroke-dashoffset': -pathLength + 'px'
            });

            // We can't use guided mode as the animations need to rely on setting begin manually
            // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
            data.element.animate(animationDefinition, false);
        }
    });

    // For the sake of the example we update the chart every time it's created with a delay of 8 seconds
    chart.on('created', function () {
        if (window.__anim21278907124) {
            clearTimeout(window.__anim21278907124);
            window.__anim21278907124 = null;
        }
        window.__anim21278907124 = setTimeout(chart.update.bind(chart), 10000);
    });
}