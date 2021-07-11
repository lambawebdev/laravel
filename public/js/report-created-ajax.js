/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/report-created-ajax.js":
/*!*********************************************!*\
  !*** ./resources/js/report-created-ajax.js ***!
  \*********************************************/
/***/ (() => {

eval("$('#feedback-form button').addClass('disabled').prop('disabled', true);\n$('#Check1, #Check2, #Check3, #Check4').on('click', function () {\n  if ($('#feedback-form input[type=checkbox]:checked').length > 0) {\n    $('#feedback-form button').addClass('enabled').removeClass('disabled').prop('disabled', false);\n  } else {\n    $('#feedback-form button').addClass('disabled').removeClass('enabled');\n  }\n});\n$('#feedback-form').on('submit', function (e) {\n  e.preventDefault();\n  var data = {};\n  $('#Check1').is(\":checked\") ? data.news = true : null;\n  $('#Check2').is(\":checked\") ? data.articles = true : null;\n  $('#Check3').is(\":checked\") ? data.comments = true : null;\n  $('#Check4').is(\":checked\") ? data.tags = true : null;\n  axios.post('/contacts/report', data).then(function (res) {\n    console.log(res);\n    $(\"#Check1, #Check2, #Check3, #Check4\").prop(\"checked\", false);\n    $('#feedback-form button').addClass('disabled').removeClass('enabled').prop('disabled', true);\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvcmVwb3J0LWNyZWF0ZWQtYWpheC5qcz8zMTFmIl0sIm5hbWVzIjpbIiQiLCJhZGRDbGFzcyIsInByb3AiLCJvbiIsImxlbmd0aCIsInJlbW92ZUNsYXNzIiwiZSIsInByZXZlbnREZWZhdWx0IiwiZGF0YSIsImlzIiwibmV3cyIsImFydGljbGVzIiwiY29tbWVudHMiLCJ0YWdzIiwiYXhpb3MiLCJwb3N0IiwidGhlbiIsInJlcyIsImNvbnNvbGUiLCJsb2ciXSwibWFwcGluZ3MiOiJBQUFBQSxDQUFDLENBQUMsdUJBQUQsQ0FBRCxDQUEyQkMsUUFBM0IsQ0FBb0MsVUFBcEMsRUFBZ0RDLElBQWhELENBQXFELFVBQXJELEVBQWlFLElBQWpFO0FBRUFGLENBQUMsQ0FBQyxvQ0FBRCxDQUFELENBQXdDRyxFQUF4QyxDQUEyQyxPQUEzQyxFQUFvRCxZQUFZO0FBQzlELE1BQUlILENBQUMsQ0FBQyw2Q0FBRCxDQUFELENBQWlESSxNQUFqRCxHQUEwRCxDQUE5RCxFQUFpRTtBQUMvREosSUFBQUEsQ0FBQyxDQUFDLHVCQUFELENBQUQsQ0FBMkJDLFFBQTNCLENBQW9DLFNBQXBDLEVBQStDSSxXQUEvQyxDQUEyRCxVQUEzRCxFQUF1RUgsSUFBdkUsQ0FBNEUsVUFBNUUsRUFBd0YsS0FBeEY7QUFDRCxHQUZELE1BRU87QUFDTEYsSUFBQUEsQ0FBQyxDQUFDLHVCQUFELENBQUQsQ0FBMkJDLFFBQTNCLENBQW9DLFVBQXBDLEVBQWdESSxXQUFoRCxDQUE0RCxTQUE1RDtBQUNEO0FBQ0YsQ0FORDtBQVFBTCxDQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQkcsRUFBcEIsQ0FBdUIsUUFBdkIsRUFBaUMsVUFBVUcsQ0FBVixFQUFhO0FBRTVDQSxFQUFBQSxDQUFDLENBQUNDLGNBQUY7QUFFQSxNQUFJQyxJQUFJLEdBQUcsRUFBWDtBQUVBUixFQUFBQSxDQUFDLENBQUMsU0FBRCxDQUFELENBQWFTLEVBQWIsQ0FBZ0IsVUFBaEIsSUFBOEJELElBQUksQ0FBQ0UsSUFBTCxHQUFZLElBQTFDLEdBQWlELElBQWpEO0FBQ0FWLEVBQUFBLENBQUMsQ0FBQyxTQUFELENBQUQsQ0FBYVMsRUFBYixDQUFnQixVQUFoQixJQUE4QkQsSUFBSSxDQUFDRyxRQUFMLEdBQWdCLElBQTlDLEdBQXFELElBQXJEO0FBQ0FYLEVBQUFBLENBQUMsQ0FBQyxTQUFELENBQUQsQ0FBYVMsRUFBYixDQUFnQixVQUFoQixJQUE4QkQsSUFBSSxDQUFDSSxRQUFMLEdBQWdCLElBQTlDLEdBQXFELElBQXJEO0FBQ0FaLEVBQUFBLENBQUMsQ0FBQyxTQUFELENBQUQsQ0FBYVMsRUFBYixDQUFnQixVQUFoQixJQUE4QkQsSUFBSSxDQUFDSyxJQUFMLEdBQVksSUFBMUMsR0FBaUQsSUFBakQ7QUFFQUMsRUFBQUEsS0FBSyxDQUFDQyxJQUFOLENBQVcsa0JBQVgsRUFBK0JQLElBQS9CLEVBQXFDUSxJQUFyQyxDQUEwQyxVQUFBQyxHQUFHLEVBQUk7QUFDL0NDLElBQUFBLE9BQU8sQ0FBQ0MsR0FBUixDQUFZRixHQUFaO0FBQ0FqQixJQUFBQSxDQUFDLENBQUMsb0NBQUQsQ0FBRCxDQUF3Q0UsSUFBeEMsQ0FBNkMsU0FBN0MsRUFBd0QsS0FBeEQ7QUFDQUYsSUFBQUEsQ0FBQyxDQUFDLHVCQUFELENBQUQsQ0FBMkJDLFFBQTNCLENBQW9DLFVBQXBDLEVBQWdESSxXQUFoRCxDQUE0RCxTQUE1RCxFQUF1RUgsSUFBdkUsQ0FBNEUsVUFBNUUsRUFBd0YsSUFBeEY7QUFDRCxHQUpEO0FBS0QsQ0FoQkQiLCJzb3VyY2VzQ29udGVudCI6WyIkKCcjZmVlZGJhY2stZm9ybSBidXR0b24nKS5hZGRDbGFzcygnZGlzYWJsZWQnKS5wcm9wKCdkaXNhYmxlZCcsIHRydWUpO1xuXG4kKCcjQ2hlY2sxLCAjQ2hlY2syLCAjQ2hlY2szLCAjQ2hlY2s0Jykub24oJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xuICBpZiAoJCgnI2ZlZWRiYWNrLWZvcm0gaW5wdXRbdHlwZT1jaGVja2JveF06Y2hlY2tlZCcpLmxlbmd0aCA+IDApIHtcbiAgICAkKCcjZmVlZGJhY2stZm9ybSBidXR0b24nKS5hZGRDbGFzcygnZW5hYmxlZCcpLnJlbW92ZUNsYXNzKCdkaXNhYmxlZCcpLnByb3AoJ2Rpc2FibGVkJywgZmFsc2UpO1xuICB9IGVsc2Uge1xuICAgICQoJyNmZWVkYmFjay1mb3JtIGJ1dHRvbicpLmFkZENsYXNzKCdkaXNhYmxlZCcpLnJlbW92ZUNsYXNzKCdlbmFibGVkJyk7XG4gIH1cbn0pO1xuXG4kKCcjZmVlZGJhY2stZm9ybScpLm9uKCdzdWJtaXQnLCBmdW5jdGlvbiAoZSkge1xuXG4gIGUucHJldmVudERlZmF1bHQoKTtcblxuICBsZXQgZGF0YSA9IHt9O1xuXG4gICQoJyNDaGVjazEnKS5pcyhcIjpjaGVja2VkXCIpID8gZGF0YS5uZXdzID0gdHJ1ZSA6IG51bGw7XG4gICQoJyNDaGVjazInKS5pcyhcIjpjaGVja2VkXCIpID8gZGF0YS5hcnRpY2xlcyA9IHRydWUgOiBudWxsO1xuICAkKCcjQ2hlY2szJykuaXMoXCI6Y2hlY2tlZFwiKSA/IGRhdGEuY29tbWVudHMgPSB0cnVlIDogbnVsbDtcbiAgJCgnI0NoZWNrNCcpLmlzKFwiOmNoZWNrZWRcIikgPyBkYXRhLnRhZ3MgPSB0cnVlIDogbnVsbDtcblxuICBheGlvcy5wb3N0KCcvY29udGFjdHMvcmVwb3J0JywgZGF0YSkudGhlbihyZXMgPT4ge1xuICAgIGNvbnNvbGUubG9nKHJlcyk7XG4gICAgJChcIiNDaGVjazEsICNDaGVjazIsICNDaGVjazMsICNDaGVjazRcIikucHJvcChcImNoZWNrZWRcIiwgZmFsc2UpO1xuICAgICQoJyNmZWVkYmFjay1mb3JtIGJ1dHRvbicpLmFkZENsYXNzKCdkaXNhYmxlZCcpLnJlbW92ZUNsYXNzKCdlbmFibGVkJykucHJvcCgnZGlzYWJsZWQnLCB0cnVlKTtcbiAgfSk7XG59KTsiXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3JlcG9ydC1jcmVhdGVkLWFqYXguanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/report-created-ajax.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/report-created-ajax.js"]();
/******/ 	
/******/ })()
;