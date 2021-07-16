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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/guest/home.js":
/*!************************************!*\
  !*** ./resources/js/guest/home.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

<<<<<<< HEAD
eval("var app = new Vue({\n  el: '#root',\n  data: {\n    users: [],\n    sponsoredUsers: [],\n    searchString: '',\n    searching: false,\n    selectedCategory: ''\n  },\n  methods: {\n    searchUser: function searchUser() {\n      var _this = this;\n\n      if (this.searchString.length > 2) {\n        if (this.selectedCategory) {\n          this.searching = true;\n          axios.get(\"api/test?name=\".concat(this.searchString, \"&cat=\").concat(this.selectedCategory)).then(function (result) {\n            _this.users = result.data.users.slice(0, 5);\n          });\n        } else {\n          this.searching = true;\n          axios.get(\"api/index?name=\".concat(this.searchString)).then(function (result) {\n            _this.users = result.data.users.slice(0, 5);\n          });\n        }\n      } else {\n        this.users = [];\n        this.searching = false;\n      }\n    }\n  },\n  mounted: function mounted() {\n    var _this2 = this;\n\n    axios.get('api/sponsored').then(function (result) {\n      _this2.sponsoredUsers = result.data;\n    });\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvZ3Vlc3QvaG9tZS5qcz81ZDlmIl0sIm5hbWVzIjpbImFwcCIsIlZ1ZSIsImVsIiwiZGF0YSIsInVzZXJzIiwic3BvbnNvcmVkVXNlcnMiLCJzZWFyY2hTdHJpbmciLCJzZWFyY2hpbmciLCJzZWxlY3RlZENhdGVnb3J5IiwibWV0aG9kcyIsInNlYXJjaFVzZXIiLCJsZW5ndGgiLCJheGlvcyIsImdldCIsInRoZW4iLCJyZXN1bHQiLCJzbGljZSIsIm1vdW50ZWQiXSwibWFwcGluZ3MiOiJBQUFBLElBQUlBLEdBQUcsR0FBRyxJQUFJQyxHQUFKLENBQVE7QUFDZEMsSUFBRSxFQUFFLE9BRFU7QUFFZEMsTUFBSSxFQUFFO0FBQ0ZDLFNBQUssRUFBRSxFQURMO0FBRUZDLGtCQUFjLEVBQUUsRUFGZDtBQUdGQyxnQkFBWSxFQUFFLEVBSFo7QUFJRkMsYUFBUyxFQUFFLEtBSlQ7QUFLRkMsb0JBQWdCLEVBQUU7QUFMaEIsR0FGUTtBQVNkQyxTQUFPLEVBQUU7QUFDTEMsY0FESyx3QkFDUTtBQUFBOztBQUNULFVBQUksS0FBS0osWUFBTCxDQUFrQkssTUFBbEIsR0FBMkIsQ0FBL0IsRUFBa0M7QUFDOUIsWUFBSSxLQUFLSCxnQkFBVCxFQUEyQjtBQUN2QixlQUFLRCxTQUFMLEdBQWlCLElBQWpCO0FBQ0FLLGVBQUssQ0FBQ0MsR0FBTix5QkFBMkIsS0FBS1AsWUFBaEMsa0JBQW9ELEtBQUtFLGdCQUF6RCxHQUNDTSxJQURELENBQ00sVUFBQUMsTUFBTSxFQUFJO0FBQ1osaUJBQUksQ0FBQ1gsS0FBTCxHQUFhVyxNQUFNLENBQUNaLElBQVAsQ0FBWUMsS0FBWixDQUFrQlksS0FBbEIsQ0FBd0IsQ0FBeEIsRUFBMEIsQ0FBMUIsQ0FBYjtBQUNILFdBSEQ7QUFJSCxTQU5ELE1BT0s7QUFDRCxlQUFLVCxTQUFMLEdBQWlCLElBQWpCO0FBQ0FLLGVBQUssQ0FBQ0MsR0FBTiwwQkFBNEIsS0FBS1AsWUFBakMsR0FDS1EsSUFETCxDQUNVLFVBQUFDLE1BQU0sRUFBSTtBQUNaLGlCQUFJLENBQUNYLEtBQUwsR0FBYVcsTUFBTSxDQUFDWixJQUFQLENBQVlDLEtBQVosQ0FBa0JZLEtBQWxCLENBQXdCLENBQXhCLEVBQTBCLENBQTFCLENBQWI7QUFDSCxXQUhMO0FBSUg7QUFDSixPQWZELE1BZ0JLO0FBQ0QsYUFBS1osS0FBTCxHQUFhLEVBQWI7QUFDQSxhQUFLRyxTQUFMLEdBQWlCLEtBQWpCO0FBQ0g7QUFHSjtBQXhCSSxHQVRLO0FBbUNkVSxTQW5DYyxxQkFtQ0o7QUFBQTs7QUFDTkwsU0FBSyxDQUFDQyxHQUFOLENBQVUsZUFBVixFQUNLQyxJQURMLENBQ1UsVUFBQUMsTUFBTSxFQUFJO0FBQ1osWUFBSSxDQUFDVixjQUFMLEdBQXNCVSxNQUFNLENBQUNaLElBQTdCO0FBQ0gsS0FITDtBQUlIO0FBeENhLENBQVIsQ0FBViIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9ndWVzdC9ob21lLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsidmFyIGFwcCA9IG5ldyBWdWUoe1xuICAgIGVsOiAnI3Jvb3QnLFxuICAgIGRhdGE6IHtcbiAgICAgICAgdXNlcnM6IFtdLFxuICAgICAgICBzcG9uc29yZWRVc2VyczogW10sXG4gICAgICAgIHNlYXJjaFN0cmluZzogJycsXG4gICAgICAgIHNlYXJjaGluZzogZmFsc2UsXG4gICAgICAgIHNlbGVjdGVkQ2F0ZWdvcnk6ICcnLFxuICAgIH0sXG4gICAgbWV0aG9kczoge1xuICAgICAgICBzZWFyY2hVc2VyKCkge1xuICAgICAgICAgICAgaWYgKHRoaXMuc2VhcmNoU3RyaW5nLmxlbmd0aCA+IDIpIHtcbiAgICAgICAgICAgICAgICBpZiAodGhpcy5zZWxlY3RlZENhdGVnb3J5KSB7XG4gICAgICAgICAgICAgICAgICAgIHRoaXMuc2VhcmNoaW5nID0gdHJ1ZTtcbiAgICAgICAgICAgICAgICAgICAgYXhpb3MuZ2V0KGBhcGkvdGVzdD9uYW1lPSR7dGhpcy5zZWFyY2hTdHJpbmd9JmNhdD0ke3RoaXMuc2VsZWN0ZWRDYXRlZ29yeX1gKVxuICAgICAgICAgICAgICAgICAgICAudGhlbihyZXN1bHQgPT4ge1xuICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy51c2VycyA9IHJlc3VsdC5kYXRhLnVzZXJzLnNsaWNlKDAsNSk7XG4gICAgICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICB0aGlzLnNlYXJjaGluZyA9IHRydWU7XG4gICAgICAgICAgICAgICAgICAgIGF4aW9zLmdldChgYXBpL2luZGV4P25hbWU9JHt0aGlzLnNlYXJjaFN0cmluZ31gKVxuICAgICAgICAgICAgICAgICAgICAgICAgLnRoZW4ocmVzdWx0ID0+IHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aGlzLnVzZXJzID0gcmVzdWx0LmRhdGEudXNlcnMuc2xpY2UoMCw1KTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfVxuICAgICAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAgICAgdGhpcy51c2VycyA9IFtdO1xuICAgICAgICAgICAgICAgIHRoaXMuc2VhcmNoaW5nID0gZmFsc2U7XG4gICAgICAgICAgICB9XG5cblxuICAgICAgICB9XG4gICAgfSxcbiAgICBtb3VudGVkKCkge1xuICAgICAgICBheGlvcy5nZXQoJ2FwaS9zcG9uc29yZWQnKVxuICAgICAgICAgICAgLnRoZW4ocmVzdWx0ID0+IHtcbiAgICAgICAgICAgICAgICB0aGlzLnNwb25zb3JlZFVzZXJzID0gcmVzdWx0LmRhdGE7XG4gICAgICAgICAgICB9KVxuICAgIH1cbn0pIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/guest/home.js\n");
=======
eval("var _require = __webpack_require__(/*! axios */ \"./node_modules/axios/index.js\"),\n    Axios = _require[\"default\"];\n\nvar app = new Vue({\n  el: '#root',\n  data: {\n    users: [],\n    sponsoredUsers: [],\n    searchString: '',\n    searching: false,\n    selectedCategory: ''\n  },\n  methods: {\n    searchUser: function searchUser() {\n      var _this = this;\n\n      if (this.searchString.length > 2) {\n        if (this.selectedCategory) {\n          this.searching = true;\n          Axios.get(\"api/test?name=\".concat(this.searchString, \"&cat=\").concat(this.selectedCategory)).then(function (result) {\n            _this.users = result.data.users.slice(0, 5);\n          });\n        } else {\n          this.searching = true;\n          Axios.get(\"api/index?name=\".concat(this.searchString)).then(function (result) {\n            _this.users = result.data.users.slice(0, 5);\n          });\n        }\n      } else {\n        this.users = [];\n        this.searching = false;\n      }\n    }\n  },\n  mounted: function mounted() {\n    var _this2 = this;\n\n    Axios.get('api/sponsored').then(function (result) {\n      _this2.sponsoredUsers = result.data;\n    });\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvZ3Vlc3QvaG9tZS5qcz81ZDlmIl0sIm5hbWVzIjpbInJlcXVpcmUiLCJBeGlvcyIsImFwcCIsIlZ1ZSIsImVsIiwiZGF0YSIsInVzZXJzIiwic3BvbnNvcmVkVXNlcnMiLCJzZWFyY2hTdHJpbmciLCJzZWFyY2hpbmciLCJzZWxlY3RlZENhdGVnb3J5IiwibWV0aG9kcyIsInNlYXJjaFVzZXIiLCJsZW5ndGgiLCJnZXQiLCJ0aGVuIiwicmVzdWx0Iiwic2xpY2UiLCJtb3VudGVkIl0sIm1hcHBpbmdzIjoiQUFBQSxlQUEyQkEsbUJBQU8sQ0FBQyw0Q0FBRCxDQUFsQztBQUFBLElBQWlCQyxLQUFqQjs7QUFFQSxJQUFJQyxHQUFHLEdBQUcsSUFBSUMsR0FBSixDQUFRO0FBQ2RDLElBQUUsRUFBRSxPQURVO0FBRWRDLE1BQUksRUFBRTtBQUNGQyxTQUFLLEVBQUUsRUFETDtBQUVGQyxrQkFBYyxFQUFFLEVBRmQ7QUFHRkMsZ0JBQVksRUFBRSxFQUhaO0FBSUZDLGFBQVMsRUFBRSxLQUpUO0FBS0ZDLG9CQUFnQixFQUFFO0FBTGhCLEdBRlE7QUFTZEMsU0FBTyxFQUFFO0FBQ0xDLGNBREssd0JBQ1E7QUFBQTs7QUFDVCxVQUFJLEtBQUtKLFlBQUwsQ0FBa0JLLE1BQWxCLEdBQTJCLENBQS9CLEVBQWtDO0FBQzlCLFlBQUksS0FBS0gsZ0JBQVQsRUFBMkI7QUFDdkIsZUFBS0QsU0FBTCxHQUFpQixJQUFqQjtBQUNBUixlQUFLLENBQUNhLEdBQU4seUJBQTJCLEtBQUtOLFlBQWhDLGtCQUFvRCxLQUFLRSxnQkFBekQsR0FDQ0ssSUFERCxDQUNNLFVBQUFDLE1BQU0sRUFBSTtBQUNaLGlCQUFJLENBQUNWLEtBQUwsR0FBYVUsTUFBTSxDQUFDWCxJQUFQLENBQVlDLEtBQVosQ0FBa0JXLEtBQWxCLENBQXdCLENBQXhCLEVBQTBCLENBQTFCLENBQWI7QUFDSCxXQUhEO0FBSUgsU0FORCxNQU9LO0FBQ0QsZUFBS1IsU0FBTCxHQUFpQixJQUFqQjtBQUNBUixlQUFLLENBQUNhLEdBQU4sMEJBQTRCLEtBQUtOLFlBQWpDLEdBQ0tPLElBREwsQ0FDVSxVQUFBQyxNQUFNLEVBQUk7QUFDWixpQkFBSSxDQUFDVixLQUFMLEdBQWFVLE1BQU0sQ0FBQ1gsSUFBUCxDQUFZQyxLQUFaLENBQWtCVyxLQUFsQixDQUF3QixDQUF4QixFQUEwQixDQUExQixDQUFiO0FBQ0gsV0FITDtBQUlIO0FBQ0osT0FmRCxNQWdCSztBQUNELGFBQUtYLEtBQUwsR0FBYSxFQUFiO0FBQ0EsYUFBS0csU0FBTCxHQUFpQixLQUFqQjtBQUNIO0FBR0o7QUF4QkksR0FUSztBQW1DZFMsU0FuQ2MscUJBbUNKO0FBQUE7O0FBQ05qQixTQUFLLENBQUNhLEdBQU4sQ0FBVSxlQUFWLEVBQ0tDLElBREwsQ0FDVSxVQUFBQyxNQUFNLEVBQUk7QUFDWixZQUFJLENBQUNULGNBQUwsR0FBc0JTLE1BQU0sQ0FBQ1gsSUFBN0I7QUFDSCxLQUhMO0FBSUg7QUF4Q2EsQ0FBUixDQUFWIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2d1ZXN0L2hvbWUuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJjb25zdCB7IGRlZmF1bHQ6IEF4aW9zIH0gPSByZXF1aXJlKFwiYXhpb3NcIilcclxuXHJcbnZhciBhcHAgPSBuZXcgVnVlKHtcclxuICAgIGVsOiAnI3Jvb3QnLFxyXG4gICAgZGF0YToge1xyXG4gICAgICAgIHVzZXJzOiBbXSxcclxuICAgICAgICBzcG9uc29yZWRVc2VyczogW10sXHJcbiAgICAgICAgc2VhcmNoU3RyaW5nOiAnJyxcclxuICAgICAgICBzZWFyY2hpbmc6IGZhbHNlLFxyXG4gICAgICAgIHNlbGVjdGVkQ2F0ZWdvcnk6ICcnLFxyXG4gICAgfSxcclxuICAgIG1ldGhvZHM6IHtcclxuICAgICAgICBzZWFyY2hVc2VyKCkge1xyXG4gICAgICAgICAgICBpZiAodGhpcy5zZWFyY2hTdHJpbmcubGVuZ3RoID4gMikge1xyXG4gICAgICAgICAgICAgICAgaWYgKHRoaXMuc2VsZWN0ZWRDYXRlZ29yeSkge1xyXG4gICAgICAgICAgICAgICAgICAgIHRoaXMuc2VhcmNoaW5nID0gdHJ1ZTtcclxuICAgICAgICAgICAgICAgICAgICBBeGlvcy5nZXQoYGFwaS90ZXN0P25hbWU9JHt0aGlzLnNlYXJjaFN0cmluZ30mY2F0PSR7dGhpcy5zZWxlY3RlZENhdGVnb3J5fWApXHJcbiAgICAgICAgICAgICAgICAgICAgLnRoZW4ocmVzdWx0ID0+IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy51c2VycyA9IHJlc3VsdC5kYXRhLnVzZXJzLnNsaWNlKDAsNSk7XHJcbiAgICAgICAgICAgICAgICAgICAgfSlcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgIHRoaXMuc2VhcmNoaW5nID0gdHJ1ZTtcclxuICAgICAgICAgICAgICAgICAgICBBeGlvcy5nZXQoYGFwaS9pbmRleD9uYW1lPSR7dGhpcy5zZWFyY2hTdHJpbmd9YClcclxuICAgICAgICAgICAgICAgICAgICAgICAgLnRoZW4ocmVzdWx0ID0+IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRoaXMudXNlcnMgPSByZXN1bHQuZGF0YS51c2Vycy5zbGljZSgwLDUpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9KVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgdGhpcy51c2VycyA9IFtdO1xyXG4gICAgICAgICAgICAgICAgdGhpcy5zZWFyY2hpbmcgPSBmYWxzZTtcclxuICAgICAgICAgICAgfVxyXG5cclxuXHJcbiAgICAgICAgfVxyXG4gICAgfSxcclxuICAgIG1vdW50ZWQoKSB7XHJcbiAgICAgICAgQXhpb3MuZ2V0KCdhcGkvc3BvbnNvcmVkJylcclxuICAgICAgICAgICAgLnRoZW4ocmVzdWx0ID0+IHtcclxuICAgICAgICAgICAgICAgIHRoaXMuc3BvbnNvcmVkVXNlcnMgPSByZXN1bHQuZGF0YTtcclxuICAgICAgICAgICAgfSlcclxuICAgIH1cclxufSkiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/guest/home.js\n");
>>>>>>> 42d4f6c2d828d92375fefa90f57d45f1a93bb69a

/***/ }),

/***/ 2:
/*!******************************************!*\
  !*** multi ./resources/js/guest/home.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

<<<<<<< HEAD
module.exports = __webpack_require__(/*! /Users/filippomontani/booldoctors/bdoctors/resources/js/guest/home.js */"./resources/js/guest/home.js");
=======
module.exports = __webpack_require__(/*! C:\laravel-projects\bdoctors-1\resources\js\guest\home.js */"./resources/js/guest/home.js");
>>>>>>> 42d4f6c2d828d92375fefa90f57d45f1a93bb69a


/***/ })

/******/ });