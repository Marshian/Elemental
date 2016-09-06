$(function(){
   /**
    * Modals
    *
    * @show .modal('show')
    */
   $modalGlobal = $('#globalModal');

   $(document)
      .on('click', '.modal-iframe', function(e){

         var $this = $(this),
             src = $this.attr('href'),
             height = $this.attr('data-height') || 300,
             width = $this.attr('data-width') || '100%';

         $modalGlobal.find('iframe').attr({'src':src, 'height': height, 'width': width}).end().modal('show');

         e.preventDefault();
      })
      .tooltip({ selector: "[data-toggle=tooltip], .tips" });

   // cleanup the content of the hidden remote modal because it is cached
   $modalGlobal.on('hide.bs.modal', function (e) {
      $(this).find('iframe').attr({'src':''});
   });


	/* Tooltips */
    //$('.container').tooltip({
    //  selector: "[data-toggle=tooltip], .tips"
    //});

   // Popovers
   $('[data-toggle="popover"]').popover({ 
        html: true,
        conatiner: 'body',
        content: function() {
          return $($(this).data('target')).html();
        }
    });


   $('.navbar [title]').tooltip({
      placement: 'bottom',
      template: '<div class="tooltip" role="tooltip"><div class="tooltip-inner align-left"></div></div>'
   });

   /* Serialize form */
   $.fn.serializeForm = function(d)
   {

      var o = {};
      var a = this.serializeArray();

      $.each(a, function() {
         if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
               o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
         } else {
            o[this.name] = this.value || '';
         }
      });
      return o;
   };
});