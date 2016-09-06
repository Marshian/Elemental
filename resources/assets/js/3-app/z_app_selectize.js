$(function(){

	/**
	 * Basic Select
	 */

   var $selects = $('.select'),
      $inputTags = $('.input-tags');

   if ($selects.length)
   {
      $('.select').not('.input-tags, .select-emails').selectize({
         sortField: 'text'
      }
      );
   }

	/**
	 * Tags input
	 */
   if ($inputTags.length)
   {
      $('.input-tags').selectize({
         plugins: ['remove_button'],
         delimiter: ',',
         persist: false,
         create: function (input) {
            return {
               value: input,
               text: input
            }
         }
      }
      );
   }

   $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
      event.preventDefault();
      event.stopPropagation();
      $(this).parent().siblings().removeClass('open');
      $(this).parent().toggleClass('open');
   });
   //
	///**
	// * Email Selector
	// */
	//var REGEX_EMAIL = '([a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*@' +
	//                  '(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)';
   //
	//$('.select-emails').selectize({
	//    persist: false,
	//    maxItems: null,
	//    valueField: 'email',
	//    labelField: 'name',
	//    searchField: ['name', 'email'],
	//    options: [],
	//    render: {
	//        item: function(item, escape) {
	//            return '<div>' +
	//                (item.name ? '<span class="name">' + escape(item.name) + '</span>' : '') +
	//                (item.email ? '<span class="email">' + escape(item.email) + '</span>' : '') +
	//            '</div>';
	//        },
	//        option: function(item, escape) {
	//            var label = item.name || item.email;
	//            var caption = item.name ? item.email : null;
	//            return '<div>' +
	//                '<span class="label">' + escape(label) + '</span>' +
	//                (caption ? '<span class="caption">' + escape(caption) + '</span>' : '') +
	//            '</div>';
	//        }
	//    },
	//    create: function(input) {
	//        if ((new RegExp('^' + REGEX_EMAIL + '$', 'i')).test(input)) {
	//            return {email: input};
	//        }
	//        var match = input.match(new RegExp('^([^<]*)\<' + REGEX_EMAIL + '\>$', 'i'));
	//        if (match) {
	//            return {
	//                email : match[2],
	//                name  : $.trim(match[1])
	//            };
	//        }
	//        alert('Invalid email address.');
	//        return false;
	//    }
	//});

});