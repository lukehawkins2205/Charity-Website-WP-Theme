
//modules


//js
import "@babel/polyfill/dist/polyfill.min";

import 'core-js/es/string/index'

import './bodyScroll';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
//import 'aos';

import './old';
import '@fortawesome/fontawesome-free/js/fontawesome'
import '@fortawesome/fontawesome-free/js/solid'
import '@fortawesome/fontawesome-free/js/regular'
import '@fortawesome/fontawesome-free/js/brands'
//import react
import React from 'react';
import ReactDOM from 'react-dom';
import SearchPageComponent from "./components/search-page-component/index";



//css
import '../sass/main.scss';

//images
import '../img/groupmembersNEWedit.png';
import '../img/download.png';



const oldJS = require('./old');

window.onOpenNav = function () {
     oldJS.openNav();
}

window.onCloseNav = function () {
     oldJS.closeNav();
}

window.onGoBackPage = function () {
     oldJS.goBack();
}

window.onScrollUp = function () {
     oldJS.onScrollUp();
}

if (window.location.href.indexOf("articles") > 1 || window.location.href.indexOf("events") > 1 || window.location.href.indexOf("Private-Lodge-Articles") > 1 || window.location.href.indexOf("Private-Lodge-Event") > 1 ) {
     ReactDOM.render( <SearchPageComponent/>, document.getElementById('searchPageComponent') );
}
















