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

<<<<<<< HEAD
eval("var app = new Vue({\n  el: '#root',\n  data: {\n    users: [],\n    visibleUsers: [],\n    avg_vote: 0\n  },\n  methods: {\n    sortByReviewRate: function sortByReviewRate() {\n      var _this = this;\n\n      this.users = this.users.filter(function (user) {\n        return user.avg_vote > _this.avg_vote;\n      });\n    },\n    orderUserByReview: function orderUserByReview() {\n      return this.users.sort(function (a, b) {\n        return b.nmb_reviews - a.nmb_reviews;\n      });\n    }\n  },\n  mounted: function mounted() {\n    var _this2 = this;\n\n    this.params = location.search; // per ora funzia solo se ci sono i params, domani finisco\n\n    axios.get(\"api/test\".concat(this.params)).then(function (result) {\n      _this2.users = result.data.users;\n      console.log(_this2.users);\n    });\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvZ3Vlc3QvYWR2c2VhcmNoLmpzP2M5NGIiXSwibmFtZXMiOlsiYXBwIiwiVnVlIiwiZWwiLCJkYXRhIiwidXNlcnMiLCJ2aXNpYmxlVXNlcnMiLCJhdmdfdm90ZSIsIm1ldGhvZHMiLCJzb3J0QnlSZXZpZXdSYXRlIiwiZmlsdGVyIiwidXNlciIsIm9yZGVyVXNlckJ5UmV2aWV3Iiwic29ydCIsImEiLCJiIiwibm1iX3Jldmlld3MiLCJtb3VudGVkIiwicGFyYW1zIiwibG9jYXRpb24iLCJzZWFyY2giLCJheGlvcyIsImdldCIsInRoZW4iLCJyZXN1bHQiLCJjb25zb2xlIiwibG9nIl0sIm1hcHBpbmdzIjoiQUFBQSxJQUFJQSxHQUFHLEdBQUcsSUFBSUMsR0FBSixDQUFRO0FBQ2RDLElBQUUsRUFBRSxPQURVO0FBRWRDLE1BQUksRUFBRTtBQUNGQyxTQUFLLEVBQUUsRUFETDtBQUVGQyxnQkFBWSxFQUFFLEVBRlo7QUFHRkMsWUFBUSxFQUFFO0FBSFIsR0FGUTtBQVFkQyxTQUFPLEVBQUU7QUFDTEMsb0JBREssOEJBQ2M7QUFBQTs7QUFDaEIsV0FBS0osS0FBTCxHQUFhLEtBQUtBLEtBQUwsQ0FBV0ssTUFBWCxDQUFrQixVQUFBQyxJQUFJO0FBQUEsZUFBSUEsSUFBSSxDQUFDSixRQUFMLEdBQWdCLEtBQUksQ0FBQ0EsUUFBekI7QUFBQSxPQUF0QixDQUFiO0FBQ0YsS0FISTtBQUtMSyxxQkFMSywrQkFLZTtBQUNqQixhQUFPLEtBQUtQLEtBQUwsQ0FBV1EsSUFBWCxDQUFnQixVQUFDQyxDQUFELEVBQUdDLENBQUg7QUFBQSxlQUFTQSxDQUFDLENBQUNDLFdBQUYsR0FBZ0JGLENBQUMsQ0FBQ0UsV0FBM0I7QUFBQSxPQUFoQixDQUFQO0FBQ0Y7QUFQSSxHQVJLO0FBaUJkQyxTQWpCYyxxQkFpQko7QUFBQTs7QUFDTixTQUFLQyxNQUFMLEdBQWNDLFFBQVEsQ0FBQ0MsTUFBdkIsQ0FETSxDQUVOOztBQUNBQyxTQUFLLENBQUNDLEdBQU4sbUJBQXFCLEtBQUtKLE1BQTFCLEdBQ0NLLElBREQsQ0FDTSxVQUFBQyxNQUFNLEVBQUk7QUFDWixZQUFJLENBQUNuQixLQUFMLEdBQWFtQixNQUFNLENBQUNwQixJQUFQLENBQVlDLEtBQXpCO0FBQ0FvQixhQUFPLENBQUNDLEdBQVIsQ0FBWSxNQUFJLENBQUNyQixLQUFqQjtBQUNILEtBSkQ7QUFLSDtBQXpCYSxDQUFSLENBQVYiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvZ3Vlc3QvYWR2c2VhcmNoLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsidmFyIGFwcCA9IG5ldyBWdWUoe1xuICAgIGVsOiAnI3Jvb3QnLFxuICAgIGRhdGE6IHtcbiAgICAgICAgdXNlcnM6IFtdLFxuICAgICAgICB2aXNpYmxlVXNlcnM6IFtdLFxuICAgICAgICBhdmdfdm90ZTogMCxcblxuICAgIH0sXG4gICAgbWV0aG9kczoge1xuICAgICAgICBzb3J0QnlSZXZpZXdSYXRlKCkge1xuICAgICAgICAgICB0aGlzLnVzZXJzID0gdGhpcy51c2Vycy5maWx0ZXIodXNlciA9PiB1c2VyLmF2Z192b3RlID4gdGhpcy5hdmdfdm90ZSApXG4gICAgICAgIH0sXG4gICAgICAgXG4gICAgICAgIG9yZGVyVXNlckJ5UmV2aWV3KCkge1xuICAgICAgICAgICByZXR1cm4gdGhpcy51c2Vycy5zb3J0KChhLGIpID0+IGIubm1iX3Jldmlld3MgLSBhLm5tYl9yZXZpZXdzICk7XG4gICAgICAgIH1cbiAgICB9LFxuICAgIG1vdW50ZWQoKSB7XG4gICAgICAgIHRoaXMucGFyYW1zID0gbG9jYXRpb24uc2VhcmNoO1xuICAgICAgICAvLyBwZXIgb3JhIGZ1bnppYSBzb2xvIHNlIGNpIHNvbm8gaSBwYXJhbXMsIGRvbWFuaSBmaW5pc2NvXG4gICAgICAgIGF4aW9zLmdldChgYXBpL3Rlc3Qke3RoaXMucGFyYW1zfWApXG4gICAgICAgIC50aGVuKHJlc3VsdCA9PiB7XG4gICAgICAgICAgICB0aGlzLnVzZXJzID0gcmVzdWx0LmRhdGEudXNlcnM7XG4gICAgICAgICAgICBjb25zb2xlLmxvZyh0aGlzLnVzZXJzKVxuICAgICAgICB9KVxuICAgIH1cbn0pIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/guest/advsearch.js\n");
=======
eval("var _require = __webpack_require__(/*! axios */ \"./node_modules/axios/index.js\"),\n    Axios = _require[\"default\"];\n\nvar _require2 = __webpack_require__(/*! lodash */ \"./node_modules/lodash/lodash.js\"),\n    sortBy = _require2.sortBy;\n\nvar app = new Vue({\n  el: '#root',\n  data: {\n    users: [],\n    visibleUsers: [],\n    avg_vote: 0\n  },\n  methods: {\n    sortByReviewRate: function sortByReviewRate() {\n      var _this = this;\n\n      this.users = this.users.filter(function (user) {\n        return user.avg_vote > _this.avg_vote;\n      });\n    },\n    orderUserByReview: function orderUserByReview() {\n      return this.users.sort(function (a, b) {\n        return b.nmb_reviews - a.nmb_reviews;\n      });\n    }\n  },\n  mounted: function mounted() {\n    var _this2 = this;\n\n    this.params = location.search; // per ora funzia solo se ci sono i params, domani finisco\n\n    Axios.get(\"api/test\".concat(this.params)).then(function (result) {\n      _this2.users = result.data.users;\n      console.log(_this2.users);\n    });\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvZ3Vlc3QvYWR2c2VhcmNoLmpzP2M5NGIiXSwibmFtZXMiOlsicmVxdWlyZSIsIkF4aW9zIiwic29ydEJ5IiwiYXBwIiwiVnVlIiwiZWwiLCJkYXRhIiwidXNlcnMiLCJ2aXNpYmxlVXNlcnMiLCJhdmdfdm90ZSIsIm1ldGhvZHMiLCJzb3J0QnlSZXZpZXdSYXRlIiwiZmlsdGVyIiwidXNlciIsIm9yZGVyVXNlckJ5UmV2aWV3Iiwic29ydCIsImEiLCJiIiwibm1iX3Jldmlld3MiLCJtb3VudGVkIiwicGFyYW1zIiwibG9jYXRpb24iLCJzZWFyY2giLCJnZXQiLCJ0aGVuIiwicmVzdWx0IiwiY29uc29sZSIsImxvZyJdLCJtYXBwaW5ncyI6IkFBQUEsZUFBMkJBLG1CQUFPLENBQUMsNENBQUQsQ0FBbEM7QUFBQSxJQUFpQkMsS0FBakI7O0FBQ0EsZ0JBQW1CRCxtQkFBTyxDQUFDLCtDQUFELENBQTFCO0FBQUEsSUFBUUUsTUFBUixhQUFRQSxNQUFSOztBQUVBLElBQUlDLEdBQUcsR0FBRyxJQUFJQyxHQUFKLENBQVE7QUFDZEMsSUFBRSxFQUFFLE9BRFU7QUFFZEMsTUFBSSxFQUFFO0FBQ0ZDLFNBQUssRUFBRSxFQURMO0FBRUZDLGdCQUFZLEVBQUUsRUFGWjtBQUdGQyxZQUFRLEVBQUU7QUFIUixHQUZRO0FBUWRDLFNBQU8sRUFBRTtBQUNMQyxvQkFESyw4QkFDYztBQUFBOztBQUNoQixXQUFLSixLQUFMLEdBQWEsS0FBS0EsS0FBTCxDQUFXSyxNQUFYLENBQWtCLFVBQUFDLElBQUk7QUFBQSxlQUFJQSxJQUFJLENBQUNKLFFBQUwsR0FBZ0IsS0FBSSxDQUFDQSxRQUF6QjtBQUFBLE9BQXRCLENBQWI7QUFDRixLQUhJO0FBS0xLLHFCQUxLLCtCQUtlO0FBQ2pCLGFBQU8sS0FBS1AsS0FBTCxDQUFXUSxJQUFYLENBQWdCLFVBQUNDLENBQUQsRUFBR0MsQ0FBSDtBQUFBLGVBQVNBLENBQUMsQ0FBQ0MsV0FBRixHQUFlRixDQUFDLENBQUNFLFdBQTFCO0FBQUEsT0FBaEIsQ0FBUDtBQUNGO0FBUEksR0FSSztBQWlCZEMsU0FqQmMscUJBaUJKO0FBQUE7O0FBQ04sU0FBS0MsTUFBTCxHQUFjQyxRQUFRLENBQUNDLE1BQXZCLENBRE0sQ0FFTjs7QUFDQXJCLFNBQUssQ0FBQ3NCLEdBQU4sbUJBQXFCLEtBQUtILE1BQTFCLEdBQ0NJLElBREQsQ0FDTSxVQUFBQyxNQUFNLEVBQUk7QUFDWixZQUFJLENBQUNsQixLQUFMLEdBQWFrQixNQUFNLENBQUNuQixJQUFQLENBQVlDLEtBQXpCO0FBQ0FtQixhQUFPLENBQUNDLEdBQVIsQ0FBWSxNQUFJLENBQUNwQixLQUFqQjtBQUNILEtBSkQ7QUFLSDtBQXpCYSxDQUFSLENBQVYiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvZ3Vlc3QvYWR2c2VhcmNoLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiY29uc3QgeyBkZWZhdWx0OiBBeGlvcyB9ID0gcmVxdWlyZShcImF4aW9zXCIpO1xyXG5jb25zdCB7IHNvcnRCeSB9ID0gcmVxdWlyZShcImxvZGFzaFwiKTtcclxuXHJcbnZhciBhcHAgPSBuZXcgVnVlKHtcclxuICAgIGVsOiAnI3Jvb3QnLFxyXG4gICAgZGF0YToge1xyXG4gICAgICAgIHVzZXJzOiBbXSxcclxuICAgICAgICB2aXNpYmxlVXNlcnM6IFtdLFxyXG4gICAgICAgIGF2Z192b3RlOiAwLFxyXG5cclxuICAgIH0sXHJcbiAgICBtZXRob2RzOiB7XHJcbiAgICAgICAgc29ydEJ5UmV2aWV3UmF0ZSgpIHtcclxuICAgICAgICAgICB0aGlzLnVzZXJzID0gdGhpcy51c2Vycy5maWx0ZXIodXNlciA9PiB1c2VyLmF2Z192b3RlID4gdGhpcy5hdmdfdm90ZSApXHJcbiAgICAgICAgfSxcclxuICAgICAgIFxyXG4gICAgICAgIG9yZGVyVXNlckJ5UmV2aWV3KCkge1xyXG4gICAgICAgICAgIHJldHVybiB0aGlzLnVzZXJzLnNvcnQoKGEsYikgPT4gYi5ubWJfcmV2aWV3cyAtYS5ubWJfcmV2aWV3cyApO1xyXG4gICAgICAgIH1cclxuICAgIH0sXHJcbiAgICBtb3VudGVkKCkge1xyXG4gICAgICAgIHRoaXMucGFyYW1zID0gbG9jYXRpb24uc2VhcmNoO1xyXG4gICAgICAgIC8vIHBlciBvcmEgZnVuemlhIHNvbG8gc2UgY2kgc29ubyBpIHBhcmFtcywgZG9tYW5pIGZpbmlzY29cclxuICAgICAgICBBeGlvcy5nZXQoYGFwaS90ZXN0JHt0aGlzLnBhcmFtc31gKVxyXG4gICAgICAgIC50aGVuKHJlc3VsdCA9PiB7XHJcbiAgICAgICAgICAgIHRoaXMudXNlcnMgPSByZXN1bHQuZGF0YS51c2VycztcclxuICAgICAgICAgICAgY29uc29sZS5sb2codGhpcy51c2VycylcclxuICAgICAgICB9KVxyXG4gICAgfVxyXG59KSJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/guest/advsearch.js\n");
>>>>>>> 42d4f6c2d828d92375fefa90f57d45f1a93bb69a

/***/ }),

/***/ 1:
/*!***********************************************!*\
  !*** multi ./resources/js/guest/advsearch.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laravel-projects\bdoctors-1\resources\js\guest\advsearch.js */"./resources/js/guest/advsearch.js");


/***/ })

/******/ });