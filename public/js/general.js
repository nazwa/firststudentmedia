$(window).on('scroll', function() {
    var position = $(window).scrollTop();
    if( position < 155 ) {
        $('#header').height(220 - position);
    } else {
        $('#header').height(65);
        
    }   

});

         




 $(function(){
                
               
        var $container = $('.isotope'),
            $body = $('body'),
            colW = 260,
            columns = null;
             
        $container.isotope({
            // options
            itemSelector : '.item',   
            resizable: true,      
            getSortData : {
                'published' : function ( $elem ) {
                  return $elem.attr('data-published');
                },   
                'category' : function ( $elem ) {
                  return $elem.attr('data-category');
                }, 
                'source' : function ( $elem ) {
                  return $elem.attr('data-source');
                },   
                'stars' : function ( $elem ) {
                  return $elem.attr('data-stars');
                },  
                'date' : function ( $elem ) {
                  return $elem.attr('data-date');
                }, 
                'clicks' : function ( $elem ) {
                  return $elem.attr('data-clicks');
                },
            },
            sortAscending : false,
            sortBy : 'published',   
        });  
  
  
                
        $('#sort-by a').click(function(){
          // get href attribute, minus the '#'
          var asc = true;           
          
          var sortName = $(this).attr('href').slice(1);
          $container.isotope({ 'sortBy' : sortName,  });
          return false;
        });
        
        // filter items when filter link is clicked
        $('.filters a').click(function(){
            var selector = $(this).attr('data-filter');
            $(this).parent().parent().find('.active').removeClass('active');
            $(this).addClass('active');
            $container.isotope({ filter: selector });
            return false;
        });                         
                  
    $('.item').on('click', function(){
          showModal($(this).attr('data-slug'));
    });
          
    // <----
    // See if we have something on startup to load
    // ---->
     if( window.location.hash) {
            var item = window.location.hash.substring(1);  
            showModal(item); 
     }     
     
});
  
    function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }
    
    showModal = function (slug) {                  
        
        $('<img />', {'src' : 'img/ajax-loader.gif', 'class' : 'loader'}).appendTo($("#details-modal .content"));
        window.location.hash = slug;
        $("#details-modal").reveal({animation : 'fade', 'closed' : function(){
            window.location.hash = '';
        }});
        $.ajax ({                               
            url: '/media/show/' + slug, 
            success: function(data, status) {  
                $("#details-modal .content").html(data);   
                
                $('.infoLink a').on('click', function() {  
                    console.log('click');
                    if( _gaq) {
                       _gaq.push(['_trackEvent', 'Feed', 'Redirect', slug]);           
                    }
                });      
                                                                                                       
                $('.infoRating').raty({score : $('.infoRating').html(), click: function(score, evt){
                
                    var sId = $(this).attr('id').replace('infoRating_', '');             
                    $.ajax({
                        url: '/media/ajax_score/' + $('.infoRating').attr('data-id') + '/' + score + '/',
                        success : function(data){                                                                   
                            if( !data.error && data.stars) {
                                $('.infoRating').raty('score', data.stars);   
                            }
                        }
                    });  
                    if( _gaq) {                                              
                       _gaq.push(['_trackEvent', 'Feed', 'Vote', slug]);
                    }   
                                        
                }, path : '/img/raty/', half: false, hints   : ['Boring', 'Nothing special', 'OK', 'Interesting', 'Great'], });       
                
            }      
        }); 
        if( _gaq) {                                              
           _gaq.push(['_trackEvent', 'Feed', 'Details', slug]);
        }
    }
       