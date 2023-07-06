"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

// Invoice Demo
// =============================================================
var InvoiceDemo = /*#__PURE__*/function () {
  function InvoiceDemo() {
    _classCallCheck(this, InvoiceDemo);

    this.worker = '';
    this.init();
  }

  _createClass(InvoiceDemo, [{
    key: "init",
    value: function init() {
      // event handlers
      this.generateInvoice();
      this.handleUpdate();
      this.handleDownload();
    }
  }, {
    key: "generateInvoice",
    value: function generateInvoice() {
      var worker = html2pdf();
      var element = document.getElementById('invoice');
      var $element = $(element);
      var $wrapper = $element.parent();
      var filename = $element.data('id');
      var $img = $('<img />');
      worker.from(element).toImg().then(function () {
        $element.css('display', 'none');
        $img.prop('alt', filename).prop('src', worker.prop.img.src).addClass('invoice-img').css('max-width', "".concat($element.outerWidth(), "px"));
        $wrapper.append($img);
      });
      this.worker = worker;
    }
  }, {
    key: "savePdf",
    value: function savePdf() {
      var element = document.getElementById('invoice');
      var filename = $(element).data('id');
      this.worker.from(element).toPdf().save(filename);
    }
    /**
     * Please Add `<button id="update-invoice" class="btn btn-secondary">Update</button>`
     * into `page-invoice.html` to see a demo of how to add content dynamically.
     */

  }, {
    key: "handleUpdate",
    value: function handleUpdate() {
      var _this = this;

      var $invoice = $('#invoice');
      $('#update-invoice').on('click', function (e) {
        var $invoiceImg = $('.invoice-img'); // simute for changes
        // update invoice content

        $invoice.css('display', '').find('.invoice-body').append('<hr />'); // remove existing invoice

        $invoiceImg.remove(); // generate new invoice

        _this.generateInvoice();
      });
    }
  }, {
    key: "handleDownload",
    value: function handleDownload() {
      var _this2 = this;

      $('#download-pdf').on('click', function (e) {
        e.preventDefault();

        _this2.savePdf();
      });
    }
  }]);

  return InvoiceDemo;
}();
/**
 * Keep in mind that your scripts may not always be executed after the theme is completely ready,
 * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
 */


$(document).on('theme:init', function () {
  new InvoiceDemo();
});