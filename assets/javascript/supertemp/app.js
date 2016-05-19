(function($){
  
  $(document).ready(function() {

    var $doc = $(document);
    var $win = $(window);
    var $body = $('body');


    // Copy to clipboard
    // =============================================================================
      var $copy_wrapper = $('.copy-link-wrapper');
      $('input', $copy_wrapper).focus(function() { $(this).select(); } );
      var copy = new ZeroClipboard( $("#copy-button", $copy_wrapper));
      copy.on( "ready", function( readyEvent ) {
        copy.on( "aftercopy", function( event ) {
          alert("Copied text to clipboard: " + event.data["text/plain"] );
        });
      });


    // Catchall anchor click event
    // =============================================================================

      $('a[href="#"]').on('click', function(event) { event.preventDefault(); });


    // Hero (parallax / video iframe switcher)
    // =============================================================================

      var $hero = $('#hero:not(.no-image-set)');
      var $play = $('.play-button', $hero);

      $win.on('scroll.hero resize.hero', function(event) {
        var canopy_height = $hero.height();
        var scroll_distance = $doc.scrollTop();
        var percent_difference = 100 - (scroll_distance / canopy_height * 100 + 50);
        $hero.css({'background-position': "50% " + percent_difference + "%"});
      });

      $play.on('click.singleVideo', function(event) {
        $body.addClass('play-video');
        var $iframe = $(window.supertemp_video.embed_code);
        $('.video', $hero).html($iframe);
        $win.scrollTop(0);
      });


      // Share modal trigger
      // =============================================================================
        $doc.on('open.fndtn.reveal', '[data-reveal]', function () {
          $body.css('overflow', 'hidden');
        }).on('close.fndtn.reveal', '[data-reveal]', function () {
          $body.css('overflow', '');
        });


      // Modal share buttons
      // =============================================================================
      var $share = $('.share-links-wrapper .share');
      $share.on('click', function(event) {
        event.preventDefault();
        var $this = $(this);
        var url = $this.attr('href');
        var title = $this.attr('data-title');
        var w = $this.attr('data-width');
        var h = $this.attr('data-height');
        var dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop !== undefined ? window.screenTop : screen.top;
        var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
        var ieFriendlyTitle = title.replace(/\s+/g, '');

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        var newWindow = window.open(url, ieFriendlyTitle, 'scrollbars=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

        // Puts focus on the newWindow
        if (window.focus) { newWindow.focus(); }
      });

  }); // document.ready

})(jQuery);
