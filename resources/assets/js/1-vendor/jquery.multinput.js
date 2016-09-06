/*
 * jQuery Multinput plugin v1.0
 *
 * Copyright 2012, Ryun Shofner <ryun@humboldtweb.com>
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * Depends:
 *	jquery
 */
(function (window, $) {
  var attr = function (a) {
    var val, pairs = [];
    for (var key in a) {
      val = a[key];
      if (typeof val !== 'undefined' && val !== null) {
        pairs.push(key + '="' + this.escapeHTML(val) + '"');
      }
    }
    return pairs.length > 0 ? ' ' + pairs.join(' ') : '';
  };

  var fieldTypes = {
    input: function (name, value, type) {
      type = type || 'text';
      return '<input type="' + type + '" name="' + name + '" value="' + value + '" class="form-control">';
    }
  };

  var Multinput = function (e, cfg) {
    this.cfg = cfg || {};

    this.$el = $(e);


    this.fields = this.cfg.fields || [];
    this._id = Date.now ? Date.now() : new Date().getTime();
    this.values = {}
    this.init();
    this.$el.append('<div class="multinput-fields"></div>')
    this.$target = this.$el.find('.multinput-fields');
  };

  Multinput.prototype = {
    init: function () {
      var sel = '<select name="fieldType" id="fieldType-' + this._id + '" class="form-control">';
      for (var i = 0, len = this.fields.length; i < len; i++) {
        sel += '<option value="' + this.fields[i].field + '">' + this.fields[i].label + '</option>';
      }
      this.$el.append(sel + '</select>');
      this.$el.append('<button id="fieldAdd-' + this._id + '" class="btn btn-default btn-xs">Add</button>');
      this.$fieldType = $('#fieldType-' + this._id);
      this.$fieldAdd = $('#fieldAdd-' + this._id);
      this.addHandleAddButtonClick();
    },
    findField: function (val, prop) {
      prop = prop || 'field';
      for (var i = 0, len = this.fields.length; i < len; i++) {
        if (this.fields[i][prop] == val) {
          return this.fields[i];
        }
      }
    },
    addHandleAddButtonClick: function (e) {
      var _this = this;
      console.log('click..');
      this.$fieldAdd.on('click', function () {
        var fieldName = _this.$fieldType.find(':selected').val();
        var field = _this.findField(fieldName);
        console.log(fieldName, fieldTypes[field.type](fieldName, ''))
        _this.$target.append(
        '<div class="form-group">' +
        '<label>'+field.label+'</label>' +
        fieldTypes[field.type](fieldName, '') +
        '</div>'
        );
      })
    }
  };

  $.fn.multinput = function (option) {
    return this.each(function () {
      var $this = $(this)
      , data = $this.data('multinput')
      , options = $.extend({}, $.fn.multinput.defaults, $this.data(), typeof option == 'object' && option);
      if (!data) $this.data('multinput', (data = new Multinput(this, options)));
      if (typeof option == 'string') data[option]();
    })
  };
  $.fn.multinput.defaults = {};
  window.Multinput = Multinput;

})
(window, jQuery);
