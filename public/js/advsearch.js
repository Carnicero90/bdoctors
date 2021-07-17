/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/guest/advsearch.js":
/*!*****************************************!*\
  !*** ./resources/js/guest/advsearch.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// TODO: funziona ma e' inaccettabile, non essere pigro e rifallo decentemente quando sei meno stanco e sciatto
var app = new Vue({
  el: '#root',
  data: {
    users: [],
    params: '',
    searchString: '',
    categories: [],
    selectedCategories: []
  },
  methods: {
    searchUser: function searchUser() {
      var _this = this;

      // TODO: cambia lunghezza stringa minima, ora comoda cosi per test
      if (this.searchString.length > 0) {
        axios.get("api/search?name=".concat(this.searchString).concat(this.parsedCategories)).then(function (result) {
          _this.users = result.data.users;
        });
      } else {
        this.users = [];
        this.searching = false;
      }
    },
    addOrRemoveCat: function addOrRemoveCat(id) {
      if (this.selectedCat(id)) {
        this.selectedCategories = this.selectedCategories.filter(function (el) {
          return el != id;
        });
      } else {
        this.selectedCategories.push(id);
      }

      this.searchUser();
    },
    selectedCat: function selectedCat(id) {
      return this.selectedCategories.includes(id);
    },
    sortUsersByReviewAvg: function sortUsersByReviewAvg() {
      return this.users.sort(function (a, b) {
        return b.avg_vote - a.avg_vote;
      });
    },
    sortUsersByReviewNum: function sortUsersByReviewNum() {
      return this.users.sort(function (a, b) {
        return b.nmb_reviews - a.nmb_reviews;
      });
    }
  },
  mounted: function mounted() {
    var _this2 = this;

    if (location.search) {
      this.params = location.search;
      this.searchString = new URLSearchParams(this.params).get('name');
      axios.get("api/search".concat(this.params)).then(function (result) {
        _this2.users = result.data.users;
      });
    }

    axios.get("api/categories/index").then(function (result) {
      _this2.categories = result.data.categories;
    }); // TODO: sembra un poco ripetitivo? inoltre e' uguale alla home, c'e' da fattorizzare
  },
  computed: {
    parsedCategories: function parsedCategories() {
      if (this.selectedCategories.length > 0) {
        return "&cat[]=".concat(this.selectedCategories.join('&cat[]='));
      }

      return '';
    }
  }
});

/***/ }),

/***/ 1:
/*!***********************************************!*\
  !*** multi ./resources/js/guest/advsearch.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/Tom/BDoctors/bdoctors/resources/js/guest/advsearch.js */"./resources/js/guest/advsearch.js");


/***/ })

/******/ });