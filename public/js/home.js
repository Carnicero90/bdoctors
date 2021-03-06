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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/api.js":
/*!*****************************!*\
  !*** ./resources/js/api.js ***!
  \*****************************/
/*! exports provided: allUsersPath, sponsoredUsersPath, categories, promisedUsers, parseQueryString, getStringFromObject */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "allUsersPath", function() { return allUsersPath; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "sponsoredUsersPath", function() { return sponsoredUsersPath; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "categories", function() { return categories; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "promisedUsers", function() { return promisedUsers; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "parseQueryString", function() { return parseQueryString; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getStringFromObject", function() { return getStringFromObject; });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

// TODO: magari strutturare ad oggetto, pero boh per ora va bene
var allUsersPath = 'api/search'; // path per la ricerca di tutti gli utenti

var sponsoredUsersPath = 'api/sponsored'; // path utenti sponsorizzati

var categories = "api/categories/index";
function promisedUsers(apiPath) {
  var params = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";
  return axios.get(apiPath + getStringFromObject(params));
}
function parseQueryString(queryString) {
  var params = queryString.replace(/^\?/, '').split('&');
  var paramsParsed = params.map(function (param) {
    return param.split('=');
  });
  return Object.fromEntries(paramsParsed);
}
function getStringFromObject(obj) {
  var get_null = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
  var objk = Object.entries(obj);

  if (!get_null) {
    objk = objk.filter(function (item) {
      return item[1] !== '';
    });
  }

  var str = '?' + objk.map(function (i) {
    return i[0] + '=' + i[1];
  }).join('&');
  return str;
} // export function cleanObj(obj) {
// }
// export function getInputValue(input, get_empty=false)
// {
// }
// test stupidi

var ApiPath = /*#__PURE__*/function () {
  function ApiPath(path, availableParams) {
    _classCallCheck(this, ApiPath);

    this.path = path;
    this.availableParams = availableParams;
  }

  _createClass(ApiPath, [{
    key: "call",
    value: function call(params) {
      if (!this.availableParams.includes(params)) {
        return "parametri non validi: usa ".concat(this.availableParams);
      }

      return axios.get(apiPath + '?' + params);
    }
  }]);

  return ApiPath;
}();

/***/ }),

/***/ "./resources/js/guest/home.js":
/*!************************************!*\
  !*** ./resources/js/guest/home.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var Api = __webpack_require__(/*! ../api */ "./resources/js/api.js");

var app = new Vue({
  el: '#root',
  data: {
    users: [],
    sponsoredUsers: [],
    searchString: '',
    selectedCategory: 0,
    timeOutCounter: 0,
    tot_to_show: 4,
    start_index: 0
  },
  methods: {
    slideLeft: function slideLeft() {
      var slicer = this.start_index - this.tot_to_show;

      if (slicer < 0) {
        this.sponsoredUsers = [].concat(_toConsumableArray(this.sponsoredUsers.slice(this.sponsoredUsers.length + slicer, this.sponsoredUsers.length)), _toConsumableArray(this.sponsoredUsers.slice(0, this.sponsoredUsers.length + slicer)));
      } else {
        this.start_index -= this.tot_to_show;
      }
    },
    slideRight: function slideRight() {
      var slicer = this.start_index + this.tot_to_show;

      if (slicer > this.sponsoredUsers.length - 1 - this.tot_to_show) {
        this.sponsoredUsers = [].concat(_toConsumableArray(this.sponsoredUsers.slice(this.sponsoredUsers.length - slicer, this.sponsoredUsers.length)), _toConsumableArray(this.sponsoredUsers.slice(0, this.sponsoredUsers.length - slicer)));
      } else {
        this.start_index = slicer;
      }
    },
    searchUser: function searchUser() {
      var _this = this;

      // test sul coso (bounceback?)
      clearTimeout(this.timeOutCounter);

      if (this.searching) {
        this.timeOutCounter = setTimeout(function () {
          Api.promisedUsers(Api.allUsersPath, _this.searchParams).then(function (result) {
            _this.users = result.data.users.slice(0, 5);
          });
        }, 400);
      }
    }
  },
  mounted: function mounted() {
    var _this2 = this;

    Api.promisedUsers(Api.sponsoredUsersPath).then(function (response) {
      return _this2.sponsoredUsers = response.data;
    })["finally"](function (i) {
      if (!(_this2.tot_to_show >= _this2.sponsoredUsers)) {
        setInterval(function () {
          _this2.slideRight();
        }, 5000);
      }
    });
  },
  created: function created() {},
  computed: {
    searchParams: function searchParams() {
      return {
        name: this.searchString,
        cat: this.advsearchCat
      };
    },
    searching: function searching() {
      return this.searchString.length > 0;
    },
    advsearchCat: function advsearchCat() {
      return this.selectedCategory || '';
    }
  }
});

/***/ }),

/***/ 3:
/*!******************************************!*\
  !*** multi ./resources/js/guest/home.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/mattia/Movies/Boolean/Repository/bdoctors/resources/js/guest/home.js */"./resources/js/guest/home.js");


/***/ })

/******/ });