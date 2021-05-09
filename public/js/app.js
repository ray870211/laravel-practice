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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/css/app.scss":
/*!********************************!*\
  !*** ./resources/css/app.scss ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _cart__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./cart */ "./resources/js/cart.js");
/* harmony import */ var _imageUploader__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./imageUploader */ "./resources/js/imageUploader.js");



window.initAddToCart = _cart__WEBPACK_IMPORTED_MODULE_0__["initAddToCart"];
window.initCartDeleteButton = _cart__WEBPACK_IMPORTED_MODULE_0__["initCartDeleteButton"];
window.imageUploader = _imageUploader__WEBPACK_IMPORTED_MODULE_1__["default"];

/***/ }),

/***/ "./resources/js/cart.js":
/*!******************************!*\
  !*** ./resources/js/cart.js ***!
  \******************************/
/*! exports provided: initAddToCart, initCartDeleteButton */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "initAddToCart", function() { return initAddToCart; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "initCartDeleteButton", function() { return initCartDeleteButton; });
function initCart() {
  return getCart();
}

function getCart() {
  var cart = Cookies.get("cart");

  if (!cart) {
    cart = {};
  } else {
    cart = JSON.parse(cart); //方法把會把一個JSON字串轉換成JavaScript的數值或是物件
  }

  return cart; // return !cart ? {} : JSON.parse(cart);
}

function saveCart(cart) {
  Cookies.set("cart", JSON.stringify(cart));
}

function addProductToCart(productId, quantity) {
  var cart = getCart();
  var currentquantity = parseInt(cart[productId]) || 0;
  var addQuantity = parseInt(quantity) || 0;
  var newQuantity = currentquantity + addQuantity;
  cart[productId] = newQuantity;
  updateproductToCart(productId, newQuantity);
}

function updateproductToCart(productId, newQuantity) {
  var cart = getCart();
  cart[productId] = newQuantity;
  saveCart(cart);
}

function alertProductQuantity(productId) {
  var cart = getCart();
  var quantity = parseInt(cart[productId]) || 0;
  alert(quantity);
}

function initAddToCart() {
  var addToCatBtn = document.querySelector("#addToCart");

  if (addToCatBtn) {
    addToCatBtn.addEventListener("click", function () {
      var quantityInput = document.querySelector('input[name="quantity"]');

      if (quantityInput) {
        addProductToCart(productId, quantityInput.value);
        alertProductQuantity(productId);
      }
    });
  }
}

function initCartDeleteButton(actionUrl) {
  var cartDeleteBtns = document.querySelectorAll(".cartDeleteBtn"); //選取所有class名稱為cartDeleteBtn的標籤

  for (var index = 0; index < cartDeleteBtns.length; index++) {
    var cartDeleteBtn = cartDeleteBtns[index];
    cartDeleteBtn.addEventListener("click", function (e) {
      //代入的參數 e，代表 event，透過這個方法可以得到當事件發生時，發生事件的元素上的各種資訊
      var btn = e.target; //指向最初觸發事件的 DOM 物件

      var dataId = btn.getAttribute("data-id"); //回傳元素指定的屬性值

      var formData = new FormData(); //要送出去是dlete的話要加上delete
      //FormData()可為表單資料中的欄位/值建立相對應的的鍵/值對（key/value）集合，之後便可使用 XMLHttpRequest.send() 方法來送出資料。

      formData.append("_method", "DELETE"); //append(),追加新值到 FormData 物件已有的對應鍵上；若該鍵不存在，則為其追加新的鍵。

      var csrfTokenMeta = document.querySelector( //找到我們設定的_token值
      'meta[name="csrf-token"]');
      var csrfToken = csrfTokenMeta.content; //而那個值是放在conten裡面，把它加進去

      formData.append("_token", csrfToken);
      formData.append("id", dataId);
      var request = new XMLHttpRequest();
      request.open("POST", actionUrl); //要讀取的網址

      request.onreadystatechange = function () {
        //存储函数（或函数名），每当 readyState 属性改变时，就会调用该函数
        if (request.readyState === XMLHttpRequest.DONE && //常數值 4，伺服端回應結束，可能是資料傳輸完成，或者是傳送過程因發生錯誤而中斷
        request.status === 200) {
          //檢查伺服器傳回的 HTTP 狀態碼。所有狀態碼列表可於 W3C 網站上查到，但我們要管的是 200 OK 這種狀態
          //readyState裡面有五個狀態碼
          console.log(request.responseText);
          window.location.reload(); //重新整理
        }
      };

      request.send(formData); //送出去的資料
    });
  }
}



/***/ }),

/***/ "./resources/js/imageUploader.js":
/*!***************************************!*\
  !*** ./resources/js/imageUploader.js ***!
  \***************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var imageUploader = function imageUploader(className) {
  var containers = document.querySelectorAll(".".concat(className));

  var _iterator = _createForOfIteratorHelper(containers),
      _step;

  try {
    var _loop = function _loop() {
      var container = _step.value;
      var input = container.querySelector("input[type=file]");
      input.addEventListener("change", function (e) {
        readURL(e.target);
      });
      var img = document.querySelector("img");
      var oldSrc = img.getAttribute("src");

      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            img.setAttribute("src", e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
        } else {
          img.setAttribute("src", oldSrc);
        }
      }
    };

    for (_iterator.s(); !(_step = _iterator.n()).done;) {
      _loop();
    }
  } catch (err) {
    _iterator.e(err);
  } finally {
    _iterator.f();
  }
};

/* harmony default export */ __webpack_exports__["default"] = (imageUploader);

/***/ }),

/***/ 0:
/*!************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/css/app.scss ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\laravel\_frontend_assets\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\laravel\_frontend_assets\resources\css\app.scss */"./resources/css/app.scss");


/***/ })

/******/ });