"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

// FullCalendar Demo
// =============================================================
var FullcalendarDemo = /*#__PURE__*/function () {
  function FullcalendarDemo() {
    _classCallCheck(this, FullcalendarDemo);

    this.init();
  }

  _createClass(FullcalendarDemo, [{
    key: "init",
    value: function init() {
      var calendarEl = document.getElementById('calendar');
      var listEventEl = document.getElementById('calendar-list');
      this.calendar = this.registerCalendar(calendarEl);
      this.listEvents = this.registerListEvents(listEventEl);
      this.calendar.render();
      this.listEvents.render();
    }
  }, {
    key: "updateTitleAndTodayBtn",
    value: function updateTitleAndTodayBtn(calendar) {
      // calendar title
      var title = document.querySelector('#calendar-title'); // today button

      var btnToday = document.querySelector('[data-nav="today"]');
      var isToday = moment(calendar.getDate().toISOString()).format('YYYY-MM-DD') === moment().format('YYYY-MM-DD'); // update title

      title.innerHTML = calendar.currentData.viewTitle; // disable/enable today button

      if (isToday) {
        btnToday.setAttribute('disabled', 'disabled');
      } else {
        btnToday.removeAttribute('disabled');
      }
    }
  }, {
    key: "registerCalendar",
    value: function registerCalendar(el) {
      var _this = this;

      return new FullCalendar.Calendar(el, {
        themeSystem: 'bootstrap',
        aspectRatio: Looper.isToggleScreenDown() ? 0.85 : 1.35,
        headerToolbar: false,
        initialView: 'dayGridMonth',
        events: 'assets/data/events.json',
        dayMaxEvents: true,
        // allow "more" link when too many events
        editable: true,
        viewDidMount: function viewDidMount() {
          // view buttons
          var btnView = document.querySelectorAll('[data-toggle="calendarview"]'); // navigation buttons

          var btnNav = document.querySelectorAll('[data-toggle="calendarnav"]'); // remove class from elements

          var removeClass = function removeClass(elems, className) {
            elems.forEach(function (elem) {
              return elem.classList.remove(className);
            });
          };

          _this.updateTitleAndTodayBtn(_this.calendar); // update view


          btnView.forEach(function (btn) {
            btn.addEventListener('click', function () {
              var view = btn.dataset.view;
              var listEventView = "list".concat(view.substr(view.indexOf('Grid') + 4));
              removeClass(btnView, 'active');
              btn.classList.add('active');

              _this.calendar.changeView(view);

              _this.listEvents.changeView(listEventView);

              _this.updateTitleAndTodayBtn(_this.calendar);
            }, false);
          }); // update navigation

          btnNav.forEach(function (btn) {
            btn.addEventListener('click', function () {
              _this.calendar[btn.dataset.nav]();

              _this.listEvents[btn.dataset.nav]();

              _this.updateTitleAndTodayBtn(_this.calendar);
            }, false);
          });
        }
      });
    }
  }, {
    key: "registerListEvents",
    value: function registerListEvents(el) {
      return new FullCalendar.Calendar(el, {
        themeSystem: 'bootstrap',
        height: 'auto',
        headerToolbar: false,
        initialView: 'listMonth',
        events: 'assets/data/events.json'
      });
    }
  }]);

  return FullcalendarDemo;
}();
/**
 * Keep in mind that your scripts may not always be executed after the theme is completely ready,
 * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
 */


$(document).on('theme:init', function () {
  new FullcalendarDemo();
});