!function(a,b){"function"==typeof define&&define.amd?define([],function(){return a.svg4everybody=b()}):"object"==typeof exports?module.exports=b():a.svg4everybody=b()}(this,function(){/*! svg4everybody v2.0.0 | github.com/jonathantneal/svg4everybody */
function a(a,b){if(b){var c=!a.getAttribute("viewBox")&&b.getAttribute("viewBox"),d=document.createDocumentFragment(),e=b.cloneNode(!0);for(c&&a.setAttribute("viewBox",c);e.childNodes.length;)d.appendChild(e.firstChild);a.appendChild(d)}}function b(b){b.onreadystatechange=function(){if(4===b.readyState){var c=document.createElement("x");c.innerHTML=b.responseText,b.s.splice(0).map(function(b){a(b[0],c.querySelector("#"+b[1].replace(/(\W)/g,"\\$1")))})}},b.onreadystatechange()}function c(c){function d(){for(var c,j,k=0;k<e.length;)if(c=e[k],j=c.parentNode,j&&/svg/i.test(j.nodeName)){var l=c.getAttribute("xlink:href");if(f&&(!g||g(l,j,c))){var m=l.split("#"),n=m[0],o=m[1];if(j.removeChild(c),n.length){var p=i[n]=i[n]||new XMLHttpRequest;p.s||(p.s=[],p.open("GET",n),p.send()),p.s.push([j,o]),b(p)}else a(j,document.getElementById(o))}}else k+=1;h(d,17)}c=c||{};var e=document.getElementsByTagName("use"),f="polyfill"in c?c.polyfill:/\bEdge\/12\b|\bTrident\/[567]\b|\bVersion\/7.0 Safari\b/.test(navigator.userAgent)||(navigator.userAgent.match(/AppleWebKit\/(\d+)/)||[])[1]<537,g=c.validate,h=window.requestAnimationFrame||setTimeout,i={};f&&d()}return c});