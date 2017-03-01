/**
* Loading plugin for jQuery
* version: v1.0.6
* 
* Small helper to give the user a visual feedback that something is happening 
* when fetching/posting data
* 
* USAGE:
* - global overlay:                     $.isLoading();
* - use javascript:                     $( selector ).isLoading();
* - On non-form elements:               $("div").isLoading({ text: "Loading", position:'inside'});
* - remove the loading element:         $( selector ).isLoading( "hide" );
*
* @author Laurent Blanes <laurent.blanes@gmail.com>
* ---
* Copyright 2013, Laurent Blanes ( https://github.com/hekigan/is-loading )
* 
* The MIT License (MIT)
* 
* Copyright (c) 2013 Laurent Blanes
* 
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
* 
* The above copyright notice and this permission notice shall be included in
* all copies or substantial portions of the Software.
* 
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
(function(e,t,n,r){function o(t,n){this.element=t;this.options=e.extend({},s,n);this._defaults=s;this._name=i;this._loader=null;this.init()}function u(){e[i]||(e.isLoading=function(t){e("body").isLoading(t)})}var i="isLoading",s={position:"right",text:"","class":"icon-refresh",tpl:'<span class="isloading-wrapper %wrapper%">%text%<i class="%class% icon-spin"></i></span>',disableSource:!0,disableOthers:[]};o.prototype={init:function(){e(this.element).is("body")&&(this.options.position="overlay");this.show()},show:function(){var n=this,r=n.options.tpl.replace("%wrapper%"," isloading-show  isloading-"+n.options.position);r=r.replace("%class%",n.options["class"]);r=r.replace("%text%",n.options.text!==""?n.options.text+" ":"");n._loader=e(r);e(n.element).is("input, textarea")&&!0===n.options.disableSource?e(n.element).attr("disabled","disabled"):!0===n.options.disableSource&&e(n.element).addClass("disabled");switch(n.options.position){case"inside":e(n.element).html(n._loader);break;case"overlay":var i=null;if(e(n.element).is("body")){i=e('<div class="isloading-overlay" style="position:fixed; left:0; top:0; z-index: 10000; background: rgba(0,0,0,0.5); width: 100%; height: '+e(t).height()+'px;" />');e("body").prepend(i);e(t).on("resize",function(){i.height(e(t).height()+"px");n._loader.css({top:e(t).height()/2-n._loader.outerHeight()/2+"px"})})}else{var s=e(n.element).css("position"),o={},u=e(n.element).outerHeight()+"px",a="100%";"relative"===s||"absolute"===s?o={top:0,left:0}:o=e(n.element).position();i=e('<div class="isloading-overlay" style="position:absolute; top: '+o.top+"px; left: "+o.left+"px; z-index: 10000; background: rgba(0,0,0,0.5); width: "+a+"; height: "+u+';" />');e(n.element).prepend(i);e(t).on("resize",function(){i.height(e(n.element).outerHeight()+"px");n._loader.css({top:i.outerHeight()/2-n._loader.outerHeight()/2+"px"})})}i.html(n._loader);n._loader.css({top:i.outerHeight()/2-n._loader.outerHeight()/2+"px"});break;default:e(n.element).after(n._loader)}n.disableOthers()},hide:function(){if("overlay"===this.options.position)e(this.element).find(".isloading-overlay").first().remove();else{e(this._loader).remove();e(this.element).text(e(this.element).attr("data-isloading-label"))}e(this.element).removeAttr("disabled").removeClass("disabled");this.enableOthers()},disableOthers:function(){e.each(this.options.disableOthers,function(t,n){var r=e(n);r.is("button, input, textarea")?r.attr("disabled","disabled"):r.addClass("disabled")})},enableOthers:function(){e.each(this.options.disableOthers,function(t,n){var r=e(n);r.is("button, input, textarea")?r.removeAttr("disabled"):r.removeClass("disabled")})}};e.fn[i]=function(t){return this.each(function(){if(t&&"hide"!==t||!e.data(this,"plugin_"+i))e.data(this,"plugin_"+i,new o(this,t));else{var n=e.data(this,"plugin_"+i);"hide"===t?n.hide():n.show()}})};u()})(jQuery,window,document);
 */
(function ( $, window, document, undefined ) {

    // Create the defaults once
    var pluginName = "isLoading",
        defaults = {
            'position': "right",        // right | inside | overlay
            'text': "",                 // Text to display next to the loader
            'class': "glyphicon glyphicon-refresh",    // loader CSS class
            'transparency': 0.5,        // background transparency for using with overlay
            'tpl': '<span class="isloading-wrapper %wrapper%">%text%<i class="%class% glyphicon-spin"></i></span>',    // loader base Tag. Change to support bootstrap > 3.x
            'disableSource': true,      // true | false
            'disableOthers': []
        };

    // The actual plugin constructor
    function Plugin( element, options ) {
        this.element = element;

        // Merge user options with default ones
        this.options = $.extend( {}, defaults, options );

        this._defaults     = defaults;
        this._name         = pluginName;
        this._loader       = null;                // Contain the loading tag element

        this.init();
    }

    // Contructor function for the plugin (only once on page load)
    function contruct() {

        if ( !$[pluginName] ) {
            $.isLoading = function( opts ) {
                $( "body" ).isLoading( opts );
            };
        }
    }

    Plugin.prototype = {

        init: function() {

            if( $( this.element ).is( "body") ) {
                this.options.position = "overlay";
            }
            this.show();
        },

        show: function() {

            var self = this,
                tpl = self.options.tpl.replace( '%wrapper%', ' isloading-show ' + ' isloading-' + self.options.position );
            tpl = tpl.replace( '%class%', self.options['class'] );
            tpl = tpl.replace( '%text%', ( self.options.text !== "" ) ? self.options.text + ' ' : '' );
            self._loader = $( tpl );

            // Disable the element
            if( $( self.element ).is( "input, textarea" ) && true === self.options.disableSource ) {

                $( self.element ).attr( "disabled", "disabled" );

            }
            else if( true === self.options.disableSource ) {

                $( self.element ).addClass( "disabled" );

            }

            // Set position
            switch( self.options.position ) {

                case "inside":
                    $( self.element ).html( self._loader );
                    break;

                case "overlay":
                    var $wrapperTpl = null;

                    if( $( self.element ).is( "body") ) {
                        $wrapperTpl = $('<div class="isloading-overlay" style="position:fixed; left:0; top:0; z-index: 10000; background: rgba(0,0,0,' + self.options.transparency + '); width: 100%; height: ' + $(window).height() + 'px;" />');
                        $( "body" ).prepend( $wrapperTpl );

                        $( window ).on('resize', function() {
                            $wrapperTpl.height( $(window).height() + 'px' );
                            self._loader.css({top: ($(window).height()/2 - self._loader.outerHeight()/2) + 'px' });
                        });
                    } else {
                        var cssPosition = $( self.element ).css('position'),
                            pos = {},
                            height = $( self.element ).outerHeight() + 'px',
                            width = $(self.element).css("width"); // $( self.element ).outerWidth() + 'px;

                        if( 'relative' === cssPosition || 'absolute' === cssPosition) {
                            pos = { 'top': 0,  'left': 0 };
                        } else {
                            pos = $( self.element ).position();
                        }
                        $wrapperTpl = $('<div class="isloading-overlay" style="position:absolute; top: ' + pos.top + 'px; left: ' + pos.left + 'px; z-index: 10000; background: rgba(0,0,0,' + self.options.transparency + '); width: ' + width + '; height: ' + height + ';" />');
                        $( self.element ).prepend( $wrapperTpl );

                        $( window ).on('resize', function() {
                            $wrapperTpl.height( $( self.element ).outerHeight() + 'px' );
                            self._loader.css({top: ($wrapperTpl.outerHeight()/2 - self._loader.outerHeight()/2) + 'px' });
                        });
                    }

                    $wrapperTpl.html( self._loader );
                    self._loader.css({top: ($wrapperTpl.outerHeight()/2 - self._loader.outerHeight()/2) + 'px' });
                    break;

                default:
                    $( self.element ).after( self._loader );
                    break;
            }

            self.disableOthers();
        },

        hide: function() {

            if( "overlay" === this.options.position ) {

                $( this.element ).find( ".isloading-overlay" ).first().remove();

            } else {

                $( this._loader ).remove();
                $( this.element ).text( $( this.element ).attr( "data-isloading-label" ) );

            }

            $( this.element ).removeAttr("disabled").removeClass("disabled");

            this.enableOthers();
        },

        disableOthers: function() {
            $.each(this.options.disableOthers, function( i, e ) {
                var elt = $( e );
                if( elt.is( "button, input, textarea" ) ) {
                    elt.attr( "disabled", "disabled" );
                }
                else {
                    elt.addClass( "disabled" );
                }
            });
        },

        enableOthers: function() {
            $.each(this.options.disableOthers, function( i, e ) {
                var elt = $( e );
                if( elt.is( "button, input, textarea" ) ) {
                    elt.removeAttr( "disabled" );
                }
                else {
                    elt.removeClass( "disabled" );
                }
            });
        }
    };

    // Constructor
    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if ( options && "hide" !== options || !$.data( this, "plugin_" + pluginName ) ) {
                $.data( this, "plugin_" + pluginName, new Plugin( this, options ) );
            } else {
                var elt = $.data( this, "plugin_" + pluginName );

                if( "hide" === options )    { elt.hide(); }
                else                        { elt.show(); }
            }
        });
    };

    contruct();

})( jQuery, window, document );