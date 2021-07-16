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

eval("var app = new Vue({\n  el: '#root',\n  data: {\n    users: [],\n    params: '',\n    visibleUsers: [],\n    avg_vote: 0,\n    searchString: ''\n  },\n  methods: {\n    searchUser: function searchUser() {\n      var _this = this;\n\n      // TODO: cambia lunghezza stringa minima, ora comoda cosi per test\n      if (this.searchString.length > 0) {\n        if (this.selectedCategory) {\n          this.searching = true;\n          axios.get(\"api/test?name=\".concat(this.searchString, \"&cat=\").concat(this.selectedCategory)).then(function (result) {\n            _this.users = result.data.users.slice(0, 5);\n          });\n        } else {\n          this.searching = true;\n          axios.get(\"api/index?name=\".concat(this.searchString)).then(function (result) {\n            _this.users = result.data.users.slice(0, 5);\n          });\n        }\n      } else {\n        this.users = [];\n        this.searching = false;\n      }\n    },\n    sortUsersByReviewAvg: function sortUsersByReviewAvg() {\n      return this.users.sort(function (a, b) {\n        return b.avg_vote - a.avg_vote;\n      });\n    },\n    sortUsersByReviewNum: function sortUsersByReviewNum() {\n      return this.users.sort(function (a, b) {\n        return b.nmb_reviews - a.nmb_reviews;\n      });\n    }\n  },\n  mounted: function mounted() {\n    var _this2 = this;\n\n    this.params = location.search;\n    var a = new URLSearchParams(location.search); // TODO: usarlo in un qualche modo, che pare comodo\n    // per ora funzia solo se ci sono i params, domani finisco\n\n    axios.get(\"api/test\".concat(this.params)).then(function (result) {\n      _this2.users = result.data.users;\n    });\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvZ3Vlc3QvYWR2c2VhcmNoLmpzP2M5NGIiXSwibmFtZXMiOlsiYXBwIiwiVnVlIiwiZWwiLCJkYXRhIiwidXNlcnMiLCJwYXJhbXMiLCJ2aXNpYmxlVXNlcnMiLCJhdmdfdm90ZSIsInNlYXJjaFN0cmluZyIsIm1ldGhvZHMiLCJzZWFyY2hVc2VyIiwibGVuZ3RoIiwic2VsZWN0ZWRDYXRlZ29yeSIsInNlYXJjaGluZyIsImF4aW9zIiwiZ2V0IiwidGhlbiIsInJlc3VsdCIsInNsaWNlIiwic29ydFVzZXJzQnlSZXZpZXdBdmciLCJzb3J0IiwiYSIsImIiLCJzb3J0VXNlcnNCeVJldmlld051bSIsIm5tYl9yZXZpZXdzIiwibW91bnRlZCIsImxvY2F0aW9uIiwic2VhcmNoIiwiVVJMU2VhcmNoUGFyYW1zIl0sIm1hcHBpbmdzIjoiQUFBQSxJQUFJQSxHQUFHLEdBQUcsSUFBSUMsR0FBSixDQUFRO0FBQ2RDLElBQUUsRUFBRSxPQURVO0FBRWRDLE1BQUksRUFBRTtBQUNGQyxTQUFLLEVBQUUsRUFETDtBQUVGQyxVQUFNLEVBQUUsRUFGTjtBQUdGQyxnQkFBWSxFQUFFLEVBSFo7QUFJRkMsWUFBUSxFQUFFLENBSlI7QUFLRkMsZ0JBQVksRUFBRTtBQUxaLEdBRlE7QUFVZEMsU0FBTyxFQUFFO0FBQ0xDLGNBREssd0JBQ1E7QUFBQTs7QUFDVDtBQUNBLFVBQUksS0FBS0YsWUFBTCxDQUFrQkcsTUFBbEIsR0FBMkIsQ0FBL0IsRUFBa0M7QUFDOUIsWUFBSSxLQUFLQyxnQkFBVCxFQUEyQjtBQUN2QixlQUFLQyxTQUFMLEdBQWlCLElBQWpCO0FBQ0FDLGVBQUssQ0FBQ0MsR0FBTix5QkFBMkIsS0FBS1AsWUFBaEMsa0JBQW9ELEtBQUtJLGdCQUF6RCxHQUNDSSxJQURELENBQ00sVUFBQUMsTUFBTSxFQUFJO0FBQ1osaUJBQUksQ0FBQ2IsS0FBTCxHQUFhYSxNQUFNLENBQUNkLElBQVAsQ0FBWUMsS0FBWixDQUFrQmMsS0FBbEIsQ0FBd0IsQ0FBeEIsRUFBMEIsQ0FBMUIsQ0FBYjtBQUNILFdBSEQ7QUFJSCxTQU5ELE1BT0s7QUFDRCxlQUFLTCxTQUFMLEdBQWlCLElBQWpCO0FBQ0FDLGVBQUssQ0FBQ0MsR0FBTiwwQkFBNEIsS0FBS1AsWUFBakMsR0FDS1EsSUFETCxDQUNVLFVBQUFDLE1BQU0sRUFBSTtBQUNaLGlCQUFJLENBQUNiLEtBQUwsR0FBYWEsTUFBTSxDQUFDZCxJQUFQLENBQVlDLEtBQVosQ0FBa0JjLEtBQWxCLENBQXdCLENBQXhCLEVBQTBCLENBQTFCLENBQWI7QUFDSCxXQUhMO0FBSUg7QUFDSixPQWZELE1BZ0JLO0FBQ0QsYUFBS2QsS0FBTCxHQUFhLEVBQWI7QUFDQSxhQUFLUyxTQUFMLEdBQWlCLEtBQWpCO0FBQ0g7QUFHSixLQXpCSTtBQTJCTE0sd0JBM0JLLGtDQTJCa0I7QUFDcEIsYUFBTyxLQUFLZixLQUFMLENBQVdnQixJQUFYLENBQWdCLFVBQUNDLENBQUQsRUFBR0MsQ0FBSDtBQUFBLGVBQVNBLENBQUMsQ0FBQ2YsUUFBRixHQUFhYyxDQUFDLENBQUNkLFFBQXhCO0FBQUEsT0FBaEIsQ0FBUDtBQUNGLEtBN0JJO0FBK0JMZ0Isd0JBL0JLLGtDQStCa0I7QUFDcEIsYUFBTyxLQUFLbkIsS0FBTCxDQUFXZ0IsSUFBWCxDQUFnQixVQUFDQyxDQUFELEVBQUdDLENBQUg7QUFBQSxlQUFTQSxDQUFDLENBQUNFLFdBQUYsR0FBZ0JILENBQUMsQ0FBQ0csV0FBM0I7QUFBQSxPQUFoQixDQUFQO0FBQ0Y7QUFqQ0ksR0FWSztBQTZDZEMsU0E3Q2MscUJBNkNKO0FBQUE7O0FBQ04sU0FBS3BCLE1BQUwsR0FBY3FCLFFBQVEsQ0FBQ0MsTUFBdkI7QUFDQSxRQUFJTixDQUFDLEdBQUcsSUFBSU8sZUFBSixDQUFvQkYsUUFBUSxDQUFDQyxNQUE3QixDQUFSLENBRk0sQ0FHTjtBQUVBOztBQUNBYixTQUFLLENBQUNDLEdBQU4sbUJBQXFCLEtBQUtWLE1BQTFCLEdBQ0NXLElBREQsQ0FDTSxVQUFBQyxNQUFNLEVBQUk7QUFDWixZQUFJLENBQUNiLEtBQUwsR0FBYWEsTUFBTSxDQUFDZCxJQUFQLENBQVlDLEtBQXpCO0FBQ0gsS0FIRDtBQUlIO0FBdkRhLENBQVIsQ0FBViIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9ndWVzdC9hZHZzZWFyY2guanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJ2YXIgYXBwID0gbmV3IFZ1ZSh7XG4gICAgZWw6ICcjcm9vdCcsXG4gICAgZGF0YToge1xuICAgICAgICB1c2VyczogW10sXG4gICAgICAgIHBhcmFtczogJycsXG4gICAgICAgIHZpc2libGVVc2VyczogW10sXG4gICAgICAgIGF2Z192b3RlOiAwLFxuICAgICAgICBzZWFyY2hTdHJpbmc6ICcnLFxuXG4gICAgfSxcbiAgICBtZXRob2RzOiB7XG4gICAgICAgIHNlYXJjaFVzZXIoKSB7XG4gICAgICAgICAgICAvLyBUT0RPOiBjYW1iaWEgbHVuZ2hlenphIHN0cmluZ2EgbWluaW1hLCBvcmEgY29tb2RhIGNvc2kgcGVyIHRlc3RcbiAgICAgICAgICAgIGlmICh0aGlzLnNlYXJjaFN0cmluZy5sZW5ndGggPiAwKSB7XG4gICAgICAgICAgICAgICAgaWYgKHRoaXMuc2VsZWN0ZWRDYXRlZ29yeSkge1xuICAgICAgICAgICAgICAgICAgICB0aGlzLnNlYXJjaGluZyA9IHRydWU7XG4gICAgICAgICAgICAgICAgICAgIGF4aW9zLmdldChgYXBpL3Rlc3Q/bmFtZT0ke3RoaXMuc2VhcmNoU3RyaW5nfSZjYXQ9JHt0aGlzLnNlbGVjdGVkQ2F0ZWdvcnl9YClcbiAgICAgICAgICAgICAgICAgICAgLnRoZW4ocmVzdWx0ID0+IHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMudXNlcnMgPSByZXN1bHQuZGF0YS51c2Vycy5zbGljZSgwLDUpO1xuICAgICAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgdGhpcy5zZWFyY2hpbmcgPSB0cnVlO1xuICAgICAgICAgICAgICAgICAgICBheGlvcy5nZXQoYGFwaS9pbmRleD9uYW1lPSR7dGhpcy5zZWFyY2hTdHJpbmd9YClcbiAgICAgICAgICAgICAgICAgICAgICAgIC50aGVuKHJlc3VsdCA9PiB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy51c2VycyA9IHJlc3VsdC5kYXRhLnVzZXJzLnNsaWNlKDAsNSk7XG4gICAgICAgICAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgICAgIHRoaXMudXNlcnMgPSBbXTtcbiAgICAgICAgICAgICAgICB0aGlzLnNlYXJjaGluZyA9IGZhbHNlO1xuICAgICAgICAgICAgfVxuXG5cbiAgICAgICAgfSxcblxuICAgICAgICBzb3J0VXNlcnNCeVJldmlld0F2ZygpIHtcbiAgICAgICAgICAgcmV0dXJuIHRoaXMudXNlcnMuc29ydCgoYSxiKSA9PiBiLmF2Z192b3RlIC0gYS5hdmdfdm90ZSApO1xuICAgICAgICB9LFxuICAgICAgIFxuICAgICAgICBzb3J0VXNlcnNCeVJldmlld051bSgpIHtcbiAgICAgICAgICAgcmV0dXJuIHRoaXMudXNlcnMuc29ydCgoYSxiKSA9PiBiLm5tYl9yZXZpZXdzIC0gYS5ubWJfcmV2aWV3cyApO1xuICAgICAgICB9XG4gICAgfSxcbiAgICBtb3VudGVkKCkge1xuICAgICAgICB0aGlzLnBhcmFtcyA9IGxvY2F0aW9uLnNlYXJjaDtcbiAgICAgICAgbGV0IGEgPSBuZXcgVVJMU2VhcmNoUGFyYW1zKGxvY2F0aW9uLnNlYXJjaCk7XG4gICAgICAgIC8vIFRPRE86IHVzYXJsbyBpbiB1biBxdWFsY2hlIG1vZG8sIGNoZSBwYXJlIGNvbW9kb1xuXG4gICAgICAgIC8vIHBlciBvcmEgZnVuemlhIHNvbG8gc2UgY2kgc29ubyBpIHBhcmFtcywgZG9tYW5pIGZpbmlzY29cbiAgICAgICAgYXhpb3MuZ2V0KGBhcGkvdGVzdCR7dGhpcy5wYXJhbXN9YClcbiAgICAgICAgLnRoZW4ocmVzdWx0ID0+IHtcbiAgICAgICAgICAgIHRoaXMudXNlcnMgPSByZXN1bHQuZGF0YS51c2VycztcbiAgICAgICAgfSlcbiAgICB9XG59KSJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/guest/advsearch.js\n");

/***/ }),

/***/ 1:
/*!***********************************************!*\
  !*** multi ./resources/js/guest/advsearch.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/filippomontani/booldoctors/bdoctors/resources/js/guest/advsearch.js */"./resources/js/guest/advsearch.js");


/***/ })

/******/ });