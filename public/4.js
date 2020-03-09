(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[4],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/admin/components/PasswordUpdateForm.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/admin/components/PasswordUpdateForm.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var lodash_each__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lodash/each */ "./node_modules/lodash/each.js");
/* harmony import */ var lodash_each__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lodash_each__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _CardComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CardComponent */ "./resources/assets/js/admin/components/CardComponent.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'PasswordUpdateForm',
  components: {
    CardComponent: _CardComponent__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    return {
      isLoading: false,
      errors: {},
      form: {
        password_current: null,
        password: null,
        password_confirmation: null
      }
    };
  },
  computed: {
    formPasswordCurrentType: function formPasswordCurrentType() {
      return this.errors.password_current ? 'is-danger' : null;
    },
    formPasswordCurrentMessage: function formPasswordCurrentMessage() {
      return this.errors.password_current ? this.errors.password_current[0] : 'Required. Your current password';
    },
    formPasswordType: function formPasswordType() {
      return this.errors.password ? 'is-danger' : null;
    },
    formPasswordMessage: function formPasswordMessage() {
      return this.errors.password ? this.errors.password[0] : 'Required. New password';
    }
  },
  methods: {
    submit: function submit() {
      var _this = this;

      this.isLoading = true;
      this.errors = {};
      axios.patch('/user/password', this.form).then(function (r) {
        _this.isLoading = false;
        _this.form.password_current = null;
        _this.form.password = null;
        _this.form.password_confirmation = null;

        _this.$buefy.snackbar.open({
          message: 'Password updated',
          duration: 1000,
          queue: false
        });
      })["catch"](function (err) {
        _this.isLoading = false;

        if (err.response.data.errors) {
          _this.errors = err.response.data.errors;
        } else {
          _this.errors = {
            _all: ['An error occurred']
          };
        }

        lodash_each__WEBPACK_IMPORTED_MODULE_0___default()(_this.errors, function (err) {
          _this.$buefy.toast.open({
            message: err[0],
            type: 'is-danger',
            queue: false,
            duration: 3000
          });
        });
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/admin/components/ProfileUpdateForm.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/admin/components/ProfileUpdateForm.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var lodash_each__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lodash/each */ "./node_modules/lodash/each.js");
/* harmony import */ var lodash_each__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lodash_each__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var _FilePicker__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./FilePicker */ "./resources/assets/js/admin/components/FilePicker.vue");
/* harmony import */ var _CardComponent__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./CardComponent */ "./resources/assets/js/admin/components/CardComponent.vue");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'ProfileUpdateForm',
  components: {
    CardComponent: _CardComponent__WEBPACK_IMPORTED_MODULE_3__["default"],
    FilePicker: _FilePicker__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      isFileUploaded: false,
      isLoading: false,
      errors: {},
      form: {
        name: null,
        email: null,
        file_id: null
      }
    };
  },
  computed: _objectSpread({
    formNameType: function formNameType() {
      return this.errors.name ? 'is-danger' : null;
    },
    formNameMessage: function formNameMessage() {
      return this.errors.name ? this.errors.name[0] : 'Required. Your name';
    },
    formEmailType: function formEmailType() {
      return this.errors.email ? 'is-danger' : null;
    },
    formEmailMessage: function formEmailMessage() {
      return this.errors.email ? this.errors.email[0] : 'Required. Your e-mail';
    }
  }, Object(vuex__WEBPACK_IMPORTED_MODULE_1__["mapState"])(['userName', 'userEmail'])),
  mounted: function mounted() {
    this.form.name = this.userName;
    this.form.email = this.userEmail;
  },
  methods: {
    fileStored: function fileStored(file) {
      this.isFileUploaded = true;
      this.form.file_id = file.id;

      if (this.form.name && this.form.email) {
        this.submit();
      }
    },
    emitIsForbidden: function emitIsForbidden() {
      this.$emit('is-forbidden');
    },
    submit: function submit() {
      var _this = this;

      this.isFileUploaded = false;
      this.isLoading = true;
      this.errors = {};
      axios.patch('/user', this.form).then(function (r) {
        _this.isLoading = false;

        _this.$store.commit('user', r.data.data);

        _this.$buefy.snackbar.open({
          message: 'Profile updated',
          duration: 1000,
          queue: false
        });
      })["catch"](function (err) {
        _this.isLoading = false;

        if (err.response.data.errors) {
          _this.errors = err.response.data.errors;
        } else if (err.response.status === 403) {
          _this.$emit('is-forbidden');

          _this.errors = {
            _all: ['Forbidden with demo account']
          };
        } else {
          console.error(err.response);
          _this.errors = {
            _all: ['An error occurred']
          };
        }

        lodash_each__WEBPACK_IMPORTED_MODULE_0___default()(_this.errors, function (err) {
          _this.$buefy.toast.open({
            message: err[0],
            type: 'is-danger',
            queue: false,
            duration: 3000
          });
        });
      });
    }
  },
  watch: {
    userName: function userName(newValue) {
      this.form.name = newValue;
    },
    userEmail: function userEmail(newValue) {
      this.form.email = newValue;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/admin/views/Profile.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/admin/views/Profile.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var _components_CardComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./../components/CardComponent */ "./resources/assets/js/admin/components/CardComponent.vue");
/* harmony import */ var _components_TitleBar__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./../components/TitleBar */ "./resources/assets/js/admin/components/TitleBar.vue");
/* harmony import */ var _components_HeroBar__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./../components/HeroBar */ "./resources/assets/js/admin/components/HeroBar.vue");
/* harmony import */ var _components_ProfileUpdateForm__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./../components/ProfileUpdateForm */ "./resources/assets/js/admin/components/ProfileUpdateForm.vue");
/* harmony import */ var _components_PasswordUpdateForm__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./../components/PasswordUpdateForm */ "./resources/assets/js/admin/components/PasswordUpdateForm.vue");
/* harmony import */ var _components_Tiles__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./../components/Tiles */ "./resources/assets/js/admin/components/Tiles.vue");
/* harmony import */ var _components_UserAvatar__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./../components/UserAvatar */ "./resources/assets/js/admin/components/UserAvatar.vue");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//








/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'Profile',
  components: {
    UserAvatar: _components_UserAvatar__WEBPACK_IMPORTED_MODULE_7__["default"],
    Tiles: _components_Tiles__WEBPACK_IMPORTED_MODULE_6__["default"],
    PasswordUpdateForm: _components_PasswordUpdateForm__WEBPACK_IMPORTED_MODULE_5__["default"],
    ProfileUpdateForm: _components_ProfileUpdateForm__WEBPACK_IMPORTED_MODULE_4__["default"],
    HeroBar: _components_HeroBar__WEBPACK_IMPORTED_MODULE_3__["default"],
    TitleBar: _components_TitleBar__WEBPACK_IMPORTED_MODULE_2__["default"],
    CardComponent: _components_CardComponent__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  computed: _objectSpread({
    titleStack: function titleStack() {
      return ['Admin', 'Profile'];
    }
  }, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapState"])(['userName', 'userEmail']))
});

/***/ }),

/***/ "./node_modules/lodash/_arrayEach.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_arrayEach.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * A specialized version of `_.forEach` for arrays without support for
 * iteratee shorthands.
 *
 * @private
 * @param {Array} [array] The array to iterate over.
 * @param {Function} iteratee The function invoked per iteration.
 * @returns {Array} Returns `array`.
 */
function arrayEach(array, iteratee) {
  var index = -1,
      length = array == null ? 0 : array.length;

  while (++index < length) {
    if (iteratee(array[index], index, array) === false) {
      break;
    }
  }
  return array;
}

module.exports = arrayEach;


/***/ }),

/***/ "./node_modules/lodash/_castFunction.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_castFunction.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var identity = __webpack_require__(/*! ./identity */ "./node_modules/lodash/identity.js");

/**
 * Casts `value` to `identity` if it's not a function.
 *
 * @private
 * @param {*} value The value to inspect.
 * @returns {Function} Returns cast function.
 */
function castFunction(value) {
  return typeof value == 'function' ? value : identity;
}

module.exports = castFunction;


/***/ }),

/***/ "./node_modules/lodash/each.js":
/*!*************************************!*\
  !*** ./node_modules/lodash/each.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! ./forEach */ "./node_modules/lodash/forEach.js");


/***/ }),

/***/ "./node_modules/lodash/forEach.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/forEach.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayEach = __webpack_require__(/*! ./_arrayEach */ "./node_modules/lodash/_arrayEach.js"),
    baseEach = __webpack_require__(/*! ./_baseEach */ "./node_modules/lodash/_baseEach.js"),
    castFunction = __webpack_require__(/*! ./_castFunction */ "./node_modules/lodash/_castFunction.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js");

/**
 * Iterates over elements of `collection` and invokes `iteratee` for each element.
 * The iteratee is invoked with three arguments: (value, index|key, collection).
 * Iteratee functions may exit iteration early by explicitly returning `false`.
 *
 * **Note:** As with other "Collections" methods, objects with a "length"
 * property are iterated like arrays. To avoid this behavior use `_.forIn`
 * or `_.forOwn` for object iteration.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @alias each
 * @category Collection
 * @param {Array|Object} collection The collection to iterate over.
 * @param {Function} [iteratee=_.identity] The function invoked per iteration.
 * @returns {Array|Object} Returns `collection`.
 * @see _.forEachRight
 * @example
 *
 * _.forEach([1, 2], function(value) {
 *   console.log(value);
 * });
 * // => Logs `1` then `2`.
 *
 * _.forEach({ 'a': 1, 'b': 2 }, function(value, key) {
 *   console.log(key);
 * });
 * // => Logs 'a' then 'b' (iteration order is not guaranteed).
 */
function forEach(collection, iteratee) {
  var func = isArray(collection) ? arrayEach : baseEach;
  return func(collection, castFunction(iteratee));
}

module.exports = forEach;


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/admin/components/PasswordUpdateForm.vue?vue&type=template&id=785c055f&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/admin/components/PasswordUpdateForm.vue?vue&type=template&id=785c055f& ***!
  \**********************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "card-component",
    { attrs: { title: "Change Password", icon: "lock" } },
    [
      _c(
        "form",
        {
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.submit($event)
            }
          }
        },
        [
          _c(
            "b-field",
            {
              attrs: {
                horizontal: "",
                label: "Current password",
                message: _vm.formPasswordCurrentMessage,
                type: _vm.formPasswordCurrentType
              }
            },
            [
              _c("b-input", {
                attrs: {
                  name: "password_current",
                  type: "password",
                  required: "",
                  autcomplete: "current-password"
                },
                model: {
                  value: _vm.form.password_current,
                  callback: function($$v) {
                    _vm.$set(_vm.form, "password_current", $$v)
                  },
                  expression: "form.password_current"
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c("hr"),
          _vm._v(" "),
          _c(
            "b-field",
            {
              attrs: {
                horizontal: "",
                label: "New password",
                message: _vm.formPasswordMessage,
                type: _vm.formPasswordType
              }
            },
            [
              _c("b-input", {
                attrs: {
                  name: "password",
                  type: "password",
                  required: "",
                  autocomplete: "new-password"
                },
                model: {
                  value: _vm.form.password,
                  callback: function($$v) {
                    _vm.$set(_vm.form, "password", $$v)
                  },
                  expression: "form.password"
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "b-field",
            {
              attrs: {
                horizontal: "",
                label: "New password (confirm)",
                message: "Required. New password one more time"
              }
            },
            [
              _c("b-input", {
                attrs: {
                  name: "password_confirmation",
                  type: "password",
                  required: "",
                  autocomplete: "new-password"
                },
                model: {
                  value: _vm.form.password_confirmation,
                  callback: function($$v) {
                    _vm.$set(_vm.form, "password_confirmation", $$v)
                  },
                  expression: "form.password_confirmation"
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c("hr"),
          _vm._v(" "),
          _c("b-field", { attrs: { horizontal: "" } }, [
            _c("div", { staticClass: "control" }, [
              _c(
                "button",
                {
                  staticClass: "button is-primary",
                  class: { "is-loading": _vm.isLoading },
                  attrs: { type: "submit" }
                },
                [_vm._v("\n          Submit\n        ")]
              )
            ])
          ])
        ],
        1
      )
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/admin/components/ProfileUpdateForm.vue?vue&type=template&id=031502cf&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/admin/components/ProfileUpdateForm.vue?vue&type=template&id=031502cf& ***!
  \*********************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "card-component",
    { attrs: { title: "Edit Profile", icon: "account-circle" } },
    [
      _c(
        "form",
        {
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.submit($event)
            }
          }
        },
        [
          _c(
            "b-field",
            { attrs: { horizontal: "", label: "Avatar" } },
            [_c("file-picker", { on: { "file-stored": _vm.fileStored } })],
            1
          ),
          _vm._v(" "),
          _c("hr"),
          _vm._v(" "),
          _c(
            "b-field",
            {
              attrs: {
                horizontal: "",
                label: "Name",
                message: _vm.formNameMessage,
                type: _vm.formNameType
              }
            },
            [
              _c("b-input", {
                attrs: { name: "name", required: "" },
                model: {
                  value: _vm.form.name,
                  callback: function($$v) {
                    _vm.$set(_vm.form, "name", $$v)
                  },
                  expression: "form.name"
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "b-field",
            {
              attrs: {
                horizontal: "",
                label: "E-mail",
                message: _vm.formEmailMessage,
                type: _vm.formEmailType
              }
            },
            [
              _c("b-input", {
                attrs: { name: "email", type: "email", required: "" },
                model: {
                  value: _vm.form.email,
                  callback: function($$v) {
                    _vm.$set(_vm.form, "email", $$v)
                  },
                  expression: "form.email"
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c("hr"),
          _vm._v(" "),
          _c("b-field", { attrs: { horizontal: "" } }, [
            _c("div", { staticClass: "control" }, [
              _c(
                "button",
                {
                  staticClass: "button is-primary",
                  class: { "is-loading": _vm.isLoading },
                  attrs: { type: "submit" }
                },
                [_vm._v("\n          Submit\n        ")]
              )
            ])
          ])
        ],
        1
      )
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/admin/views/Profile.vue?vue&type=template&id=6a0faae6&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/assets/js/admin/views/Profile.vue?vue&type=template&id=6a0faae6& ***!
  \******************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("title-bar", { attrs: { "title-stack": _vm.titleStack } }),
      _vm._v(" "),
      _c(
        "hero-bar",
        [
          _vm._v("\n    Profile\n    "),
          _c(
            "router-link",
            {
              staticClass: "button",
              attrs: { slot: "right", to: "/" },
              slot: "right"
            },
            [_vm._v("\n      Dashboard\n    ")]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "section",
        { staticClass: "section is-main-section" },
        [
          _c(
            "tiles",
            [
              _c("profile-update-form", { staticClass: "tile is-child" }),
              _vm._v(" "),
              _c(
                "card-component",
                {
                  staticClass: "tile is-child",
                  attrs: { title: "Profile", icon: "account" }
                },
                [
                  _c("user-avatar", {
                    staticClass: "image has-max-width is-aligned-center"
                  }),
                  _vm._v(" "),
                  _c("hr"),
                  _vm._v(" "),
                  _c(
                    "b-field",
                    { attrs: { label: "Name" } },
                    [
                      _c("b-input", {
                        attrs: {
                          value: _vm.userName,
                          "custom-class": "is-static",
                          readonly: ""
                        }
                      })
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c("hr"),
                  _vm._v(" "),
                  _c(
                    "b-field",
                    { attrs: { label: "E-mail" } },
                    [
                      _c("b-input", {
                        attrs: {
                          value: _vm.userEmail,
                          "custom-class": "is-static",
                          readonly: ""
                        }
                      })
                    ],
                    1
                  )
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c("password-update-form")
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/assets/js/admin/components/PasswordUpdateForm.vue":
/*!*********************************************************************!*\
  !*** ./resources/assets/js/admin/components/PasswordUpdateForm.vue ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PasswordUpdateForm_vue_vue_type_template_id_785c055f___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PasswordUpdateForm.vue?vue&type=template&id=785c055f& */ "./resources/assets/js/admin/components/PasswordUpdateForm.vue?vue&type=template&id=785c055f&");
/* harmony import */ var _PasswordUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PasswordUpdateForm.vue?vue&type=script&lang=js& */ "./resources/assets/js/admin/components/PasswordUpdateForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PasswordUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PasswordUpdateForm_vue_vue_type_template_id_785c055f___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PasswordUpdateForm_vue_vue_type_template_id_785c055f___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/admin/components/PasswordUpdateForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/admin/components/PasswordUpdateForm.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************!*\
  !*** ./resources/assets/js/admin/components/PasswordUpdateForm.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./PasswordUpdateForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/admin/components/PasswordUpdateForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/admin/components/PasswordUpdateForm.vue?vue&type=template&id=785c055f&":
/*!****************************************************************************************************!*\
  !*** ./resources/assets/js/admin/components/PasswordUpdateForm.vue?vue&type=template&id=785c055f& ***!
  \****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordUpdateForm_vue_vue_type_template_id_785c055f___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./PasswordUpdateForm.vue?vue&type=template&id=785c055f& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/admin/components/PasswordUpdateForm.vue?vue&type=template&id=785c055f&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordUpdateForm_vue_vue_type_template_id_785c055f___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PasswordUpdateForm_vue_vue_type_template_id_785c055f___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/admin/components/ProfileUpdateForm.vue":
/*!********************************************************************!*\
  !*** ./resources/assets/js/admin/components/ProfileUpdateForm.vue ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProfileUpdateForm_vue_vue_type_template_id_031502cf___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProfileUpdateForm.vue?vue&type=template&id=031502cf& */ "./resources/assets/js/admin/components/ProfileUpdateForm.vue?vue&type=template&id=031502cf&");
/* harmony import */ var _ProfileUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProfileUpdateForm.vue?vue&type=script&lang=js& */ "./resources/assets/js/admin/components/ProfileUpdateForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ProfileUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProfileUpdateForm_vue_vue_type_template_id_031502cf___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProfileUpdateForm_vue_vue_type_template_id_031502cf___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/admin/components/ProfileUpdateForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/admin/components/ProfileUpdateForm.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************!*\
  !*** ./resources/assets/js/admin/components/ProfileUpdateForm.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ProfileUpdateForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/admin/components/ProfileUpdateForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/admin/components/ProfileUpdateForm.vue?vue&type=template&id=031502cf&":
/*!***************************************************************************************************!*\
  !*** ./resources/assets/js/admin/components/ProfileUpdateForm.vue?vue&type=template&id=031502cf& ***!
  \***************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileUpdateForm_vue_vue_type_template_id_031502cf___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./ProfileUpdateForm.vue?vue&type=template&id=031502cf& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/admin/components/ProfileUpdateForm.vue?vue&type=template&id=031502cf&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileUpdateForm_vue_vue_type_template_id_031502cf___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProfileUpdateForm_vue_vue_type_template_id_031502cf___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/assets/js/admin/views/Profile.vue":
/*!*****************************************************!*\
  !*** ./resources/assets/js/admin/views/Profile.vue ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Profile_vue_vue_type_template_id_6a0faae6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Profile.vue?vue&type=template&id=6a0faae6& */ "./resources/assets/js/admin/views/Profile.vue?vue&type=template&id=6a0faae6&");
/* harmony import */ var _Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Profile.vue?vue&type=script&lang=js& */ "./resources/assets/js/admin/views/Profile.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Profile_vue_vue_type_template_id_6a0faae6___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Profile_vue_vue_type_template_id_6a0faae6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/assets/js/admin/views/Profile.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/assets/js/admin/views/Profile.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/assets/js/admin/views/Profile.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Profile.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/admin/views/Profile.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/assets/js/admin/views/Profile.vue?vue&type=template&id=6a0faae6&":
/*!************************************************************************************!*\
  !*** ./resources/assets/js/admin/views/Profile.vue?vue&type=template&id=6a0faae6& ***!
  \************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_template_id_6a0faae6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Profile.vue?vue&type=template&id=6a0faae6& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/assets/js/admin/views/Profile.vue?vue&type=template&id=6a0faae6&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_template_id_6a0faae6___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profile_vue_vue_type_template_id_6a0faae6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);