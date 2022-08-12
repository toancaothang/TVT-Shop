$("#chart").kendoChart({
    legend: {
        position: "top"
    },
    seriesDefaults: {
        type: "column"
    },
    series: [{
        name: "Nhập hàng",
        data: [22000000, 23000000,35000000, 29000000,42000000, 22000000, 32000000, 53000000, 23000000, 52000000, 23000000,25000000]
    },{
        name: "Bán hàng",
        data: [12000000, 13000000,45000000, 39000000,-10000000, 34000000, 60000000, 23000000, 43000000, 32000000, 63000000,45000000]
    }],
    valueAxis: {
        labels: {
            template: "#= kendo.format('{0:N0}', value/1000000) # Tr"
        },
        line: {
            visible: false
        },
        axisCrossingValue: 0
    },
    categoryAxis: {
        categories: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10","Tháng 11","Tháng 12"],
        line: {
            visible: false
        },
        labels: {
            padding: {top: 50}
        }
    },
    tooltip: {
        visible: true,
        format: "{0}%",
        template: "#= series.name #: #= value #"
    }
});
$(document).ready(createChart);
$(document).bind("kendo:skinChange", createChart);