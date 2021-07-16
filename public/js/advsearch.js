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

eval("var app = new Vue({\n  el: '#root',\n  data: {\n    users: [],\n    params: '',\n    visibleUsers: [],\n    avg_vote: 0,\n    searchString: '',\n    selectedCategory: ''\n  },\n  methods: {\n    searchUser: function searchUser() {\n      var _this = this;\n\n      // TODO: cambia lunghezza stringa minima, ora comoda cosi per test\n      if (this.searchString.length > 0) {\n        console.log(this.searchString);\n        axios.get(\"api/search?name=\".concat(this.searchString, \"&cat=\").concat(this.selectedCategory)).then(function (result) {\n          _this.users = result.data.users;\n          console.log(\"api/search?name=\".concat(_this.searchString, \"&cat=\").concat(_this.selectedCategory));\n        });\n      } else {\n        this.users = [];\n        this.searching = false;\n      }\n    },\n    sortUsersByReviewAvg: function sortUsersByReviewAvg() {\n      return this.users.sort(function (a, b) {\n        return b.avg_vote - a.avg_vote;\n      });\n    },\n    sortUsersByReviewNum: function sortUsersByReviewNum() {\n      return this.users.sort(function (a, b) {\n        return b.nmb_reviews - a.nmb_reviews;\n      });\n    }\n  },\n  mounted: function mounted() {\n    var _this2 = this;\n\n    this.params = location.search;\n    this.searchString = new URLSearchParams(location.search).get('name'); // TODO: sembra un poco ripetitivo? inoltre e' uguale alla home, c'e' da fattorizzare\n    // TODO: anche qua funzia solo se categoria selezionata, va corretta API\n\n    axios.get(\"api/search\".concat(this.params)).then(function (result) {\n      _this2.users = result.data.users;\n    });\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvZ3Vlc3QvYWR2c2VhcmNoLmpzP2M5NGIiXSwibmFtZXMiOlsiYXBwIiwiVnVlIiwiZWwiLCJkYXRhIiwidXNlcnMiLCJwYXJhbXMiLCJ2aXNpYmxlVXNlcnMiLCJhdmdfdm90ZSIsInNlYXJjaFN0cmluZyIsInNlbGVjdGVkQ2F0ZWdvcnkiLCJtZXRob2RzIiwic2VhcmNoVXNlciIsImxlbmd0aCIsImNvbnNvbGUiLCJsb2ciLCJheGlvcyIsImdldCIsInRoZW4iLCJyZXN1bHQiLCJzZWFyY2hpbmciLCJzb3J0VXNlcnNCeVJldmlld0F2ZyIsInNvcnQiLCJhIiwiYiIsInNvcnRVc2Vyc0J5UmV2aWV3TnVtIiwibm1iX3Jldmlld3MiLCJtb3VudGVkIiwibG9jYXRpb24iLCJzZWFyY2giLCJVUkxTZWFyY2hQYXJhbXMiXSwibWFwcGluZ3MiOiJBQUFBLElBQUlBLEdBQUcsR0FBRyxJQUFJQyxHQUFKLENBQVE7QUFDZEMsSUFBRSxFQUFFLE9BRFU7QUFFZEMsTUFBSSxFQUFFO0FBQ0ZDLFNBQUssRUFBRSxFQURMO0FBRUZDLFVBQU0sRUFBRSxFQUZOO0FBR0ZDLGdCQUFZLEVBQUUsRUFIWjtBQUlGQyxZQUFRLEVBQUUsQ0FKUjtBQUtGQyxnQkFBWSxFQUFFLEVBTFo7QUFNRkMsb0JBQWdCLEVBQUU7QUFOaEIsR0FGUTtBQVVkQyxTQUFPLEVBQUU7QUFDTEMsY0FESyx3QkFDUTtBQUFBOztBQUNUO0FBQ0EsVUFBSSxLQUFLSCxZQUFMLENBQWtCSSxNQUFsQixHQUEyQixDQUEvQixFQUFrQztBQUM5QkMsZUFBTyxDQUFDQyxHQUFSLENBQVksS0FBS04sWUFBakI7QUFDQU8sYUFBSyxDQUFDQyxHQUFOLDJCQUE2QixLQUFLUixZQUFsQyxrQkFBc0QsS0FBS0MsZ0JBQTNELEdBQ0NRLElBREQsQ0FDTSxVQUFBQyxNQUFNLEVBQUk7QUFDWixlQUFJLENBQUNkLEtBQUwsR0FBYWMsTUFBTSxDQUFDZixJQUFQLENBQVlDLEtBQXpCO0FBQ0FTLGlCQUFPLENBQUNDLEdBQVIsMkJBQStCLEtBQUksQ0FBQ04sWUFBcEMsa0JBQXdELEtBQUksQ0FBQ0MsZ0JBQTdEO0FBQ0gsU0FKRDtBQU1ILE9BUkQsTUFTSztBQUNELGFBQUtMLEtBQUwsR0FBYSxFQUFiO0FBQ0EsYUFBS2UsU0FBTCxHQUFpQixLQUFqQjtBQUNIO0FBR0osS0FsQkk7QUFvQkxDLHdCQXBCSyxrQ0FvQmtCO0FBQ3BCLGFBQU8sS0FBS2hCLEtBQUwsQ0FBV2lCLElBQVgsQ0FBZ0IsVUFBQ0MsQ0FBRCxFQUFHQyxDQUFIO0FBQUEsZUFBU0EsQ0FBQyxDQUFDaEIsUUFBRixHQUFhZSxDQUFDLENBQUNmLFFBQXhCO0FBQUEsT0FBaEIsQ0FBUDtBQUNGLEtBdEJJO0FBd0JMaUIsd0JBeEJLLGtDQXdCa0I7QUFDcEIsYUFBTyxLQUFLcEIsS0FBTCxDQUFXaUIsSUFBWCxDQUFnQixVQUFDQyxDQUFELEVBQUdDLENBQUg7QUFBQSxlQUFTQSxDQUFDLENBQUNFLFdBQUYsR0FBZ0JILENBQUMsQ0FBQ0csV0FBM0I7QUFBQSxPQUFoQixDQUFQO0FBQ0Y7QUExQkksR0FWSztBQXNDZEMsU0F0Q2MscUJBc0NKO0FBQUE7O0FBQ04sU0FBS3JCLE1BQUwsR0FBY3NCLFFBQVEsQ0FBQ0MsTUFBdkI7QUFDQSxTQUFLcEIsWUFBTCxHQUFxQixJQUFJcUIsZUFBSixDQUFvQkYsUUFBUSxDQUFDQyxNQUE3QixFQUFxQ1osR0FBckMsQ0FBeUMsTUFBekMsQ0FBckIsQ0FGTSxDQUdOO0FBQ0E7O0FBRUFELFNBQUssQ0FBQ0MsR0FBTixxQkFBdUIsS0FBS1gsTUFBNUIsR0FDQ1ksSUFERCxDQUNNLFVBQUFDLE1BQU0sRUFBSTtBQUNaLFlBQUksQ0FBQ2QsS0FBTCxHQUFhYyxNQUFNLENBQUNmLElBQVAsQ0FBWUMsS0FBekI7QUFDSCxLQUhEO0FBSUg7QUFoRGEsQ0FBUixDQUFWIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2d1ZXN0L2FkdnNlYXJjaC5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbInZhciBhcHAgPSBuZXcgVnVlKHtcbiAgICBlbDogJyNyb290JyxcbiAgICBkYXRhOiB7XG4gICAgICAgIHVzZXJzOiBbXSxcbiAgICAgICAgcGFyYW1zOiAnJyxcbiAgICAgICAgdmlzaWJsZVVzZXJzOiBbXSxcbiAgICAgICAgYXZnX3ZvdGU6IDAsXG4gICAgICAgIHNlYXJjaFN0cmluZzogJycsXG4gICAgICAgIHNlbGVjdGVkQ2F0ZWdvcnk6ICcnXG4gICAgfSxcbiAgICBtZXRob2RzOiB7XG4gICAgICAgIHNlYXJjaFVzZXIoKSB7XG4gICAgICAgICAgICAvLyBUT0RPOiBjYW1iaWEgbHVuZ2hlenphIHN0cmluZ2EgbWluaW1hLCBvcmEgY29tb2RhIGNvc2kgcGVyIHRlc3RcbiAgICAgICAgICAgIGlmICh0aGlzLnNlYXJjaFN0cmluZy5sZW5ndGggPiAwKSB7XG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2codGhpcy5zZWFyY2hTdHJpbmcpXG4gICAgICAgICAgICAgICAgYXhpb3MuZ2V0KGBhcGkvc2VhcmNoP25hbWU9JHt0aGlzLnNlYXJjaFN0cmluZ30mY2F0PSR7dGhpcy5zZWxlY3RlZENhdGVnb3J5fWApXG4gICAgICAgICAgICAgICAgLnRoZW4ocmVzdWx0ID0+IHtcbiAgICAgICAgICAgICAgICAgICAgdGhpcy51c2VycyA9IHJlc3VsdC5kYXRhLnVzZXJzO1xuICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhgYXBpL3NlYXJjaD9uYW1lPSR7dGhpcy5zZWFyY2hTdHJpbmd9JmNhdD0ke3RoaXMuc2VsZWN0ZWRDYXRlZ29yeX1gKVxuICAgICAgICAgICAgICAgIH0pXG5cbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgICAgIHRoaXMudXNlcnMgPSBbXTtcbiAgICAgICAgICAgICAgICB0aGlzLnNlYXJjaGluZyA9IGZhbHNlO1xuICAgICAgICAgICAgfVxuXG5cbiAgICAgICAgfSxcblxuICAgICAgICBzb3J0VXNlcnNCeVJldmlld0F2ZygpIHtcbiAgICAgICAgICAgcmV0dXJuIHRoaXMudXNlcnMuc29ydCgoYSxiKSA9PiBiLmF2Z192b3RlIC0gYS5hdmdfdm90ZSApO1xuICAgICAgICB9LFxuICAgICAgIFxuICAgICAgICBzb3J0VXNlcnNCeVJldmlld051bSgpIHtcbiAgICAgICAgICAgcmV0dXJuIHRoaXMudXNlcnMuc29ydCgoYSxiKSA9PiBiLm5tYl9yZXZpZXdzIC0gYS5ubWJfcmV2aWV3cyApO1xuICAgICAgICB9XG4gICAgfSxcbiAgICBtb3VudGVkKCkge1xuICAgICAgICB0aGlzLnBhcmFtcyA9IGxvY2F0aW9uLnNlYXJjaDtcbiAgICAgICAgdGhpcy5zZWFyY2hTdHJpbmcgID0gbmV3IFVSTFNlYXJjaFBhcmFtcyhsb2NhdGlvbi5zZWFyY2gpLmdldCgnbmFtZScpO1xuICAgICAgICAvLyBUT0RPOiBzZW1icmEgdW4gcG9jbyByaXBldGl0aXZvPyBpbm9sdHJlIGUnIHVndWFsZSBhbGxhIGhvbWUsIGMnZScgZGEgZmF0dG9yaXp6YXJlXG4gICAgICAgIC8vIFRPRE86IGFuY2hlIHF1YSBmdW56aWEgc29sbyBzZSBjYXRlZ29yaWEgc2VsZXppb25hdGEsIHZhIGNvcnJldHRhIEFQSVxuXG4gICAgICAgIGF4aW9zLmdldChgYXBpL3NlYXJjaCR7dGhpcy5wYXJhbXN9YClcbiAgICAgICAgLnRoZW4ocmVzdWx0ID0+IHtcbiAgICAgICAgICAgIHRoaXMudXNlcnMgPSByZXN1bHQuZGF0YS51c2VycztcbiAgICAgICAgfSlcbiAgICB9XG59KSJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/guest/advsearch.js\n");

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