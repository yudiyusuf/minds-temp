(()=>{var e,t={chart:{height:290,type:"bar",toolbar:{show:!1}},plotOptions:{bar:{columnWidth:"20%",endingShape:"rounded",borderRadius:6}},dataLabels:{enabled:!1},series:[{name:"Overview",data:[52,66,50,74,36,52,66]}],grid:{yaxis:{lines:{show:!1}}},yaxis:{labels:{formatter:function(e){return e+"hrs"}},title:{text:"% (Percentage)"}},xaxis:{labels:{rotate:-90},categories:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],title:{text:"Week"}},colors:(e=$("#overview-chart").attr("data-colors"),(e=JSON.parse(e)).map((function(e){var t=e.replace(" ","");if(-1==t.indexOf("--"))return t;var r=getComputedStyle(document.documentElement).getPropertyValue(t);return r||void 0})))};new ApexCharts(document.querySelector("#overview-chart"),t).render()})();