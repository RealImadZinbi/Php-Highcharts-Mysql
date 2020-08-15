// .Stat Query URI
var conf_query = 'https://stats.pacificdata.org/data-nsi/Rest/data/SPC,DF_SDG,1.0/.SE_TOT_GPI......ISCED11_10..../?startPeriod=2007&endPeriod=2018&dimensionAtObservation=AllDimensions';
 
// Parser parameters
var conf_parser = {
  "name": "dim[2].id",
  "label": "dim[2].name",
  "year": "dim[12].name",
  "y": "val[0]"
};

$(function() {
  new DotStatChart(
    // DIV ID
    'dotstat-sdg451',
    // Chart Title
    'Education Level (SDG 4.5.1)',
    // Link on subtitle
    'https://stats.pacificdata.org/data-explorer/',
    // highcharts options
    {
      subtitle: '',
      chart : {
        type: 'column'
      },
      xAxis: {
        title: {
          text: 'Country'
        }
      },
      yAxis: {
        title: {
          text: 'Index'
        }
      },
      tooltip: {
        headerFormat: '',
        pointFormat: '<em>{point.label}</em><br />Education Level ({point.year}): <b>{point.y}</b>'
      },
      // customize table values column header
      series: [
        { name: 'Level' }
      ],
      // display table of data in a tab
      showTable: true,
      // show raw JSON from .stat in a tab (and debug info in JS console)
      debug: true
    }
  ).go(
    conf_query,
    conf_parser
  );
    
}); // end jquery onload