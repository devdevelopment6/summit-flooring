/*
 *    Brand List
 */
$(document).ready(function () {

   $(window).load(function () {

      var $grid = $('#brand-item-list').isotope({
         itemSelector: '.element-item',
         layoutMode: 'fitRows',
         percentPosition: true,
         masonry: {
            itemSelector: '.element-item',
            columnWidth: '.element-item',
            gutter: 20
         },
         getSortData: {
            category: '[data-category]',
            weight: function (itemElem) {
               var weight = $(itemElem).find('.weight').text();
               return parseFloat(weight.replace(/[\(\)]/g, ''));
            }
         }
      });

      var filterFns = {
         numberGreaterThan50: function () {
            var number = $(this).find('.number').text();
            return parseInt(number, 10) > 50;
         },
         ium: function () {
            var name = $(this).find('.name').text();
            return name.match(/ium$/);
         }
      };

      $('#filters').on('click', 'a', function () {
         var filterValue = $(this).attr('data-filter');
         // use filterFn if matches value
         filterValue = filterFns[ filterValue ] || filterValue;
         $grid.isotope({filter: filterValue});
         $('#filters a').removeClass('active');
         $(this).addClass('active');
      });

      $('#sorts').on('click', 'a', function () {
         var sortByValue = $(this).attr('data-sort-by');
         $grid.isotope({sortBy: sortByValue});
      });

   });

});

/*
 *    Reference List
 */
$(document).ready(function () {

   $(window).load(function () {

      var $grid = $('#reference-item-list').isotope({
         itemSelector: '.element-item',
         layoutMode: 'fitRows',
         percentPosition: true,
         masonry: {
            itemSelector: '.element-item',
            columnWidth: '.element-item',
            gutter: 20
         },
         getSortData: {
            category: '[data-category]',
            weight: function (itemElem) {
               var weight = $(itemElem).find('.weight').text();
               return parseFloat(weight.replace(/[\(\)]/g, ''));
            }
         }
      });

      var filterFns = {
         numberGreaterThan50: function () {
            var number = $(this).find('.number').text();
            return parseInt(number, 10) > 50;
         },
         ium: function () {
            var name = $(this).find('.name').text();
            return name.match(/ium$/);
         }
      };

      $('#filters').on('click', 'a', function () {
         var filterValue = $(this).attr('data-filter');
         // use filterFn if matches value
         filterValue = filterFns[ filterValue ] || filterValue;
         $grid.isotope({filter: filterValue});
         $('#filters a').removeClass('active');
         $(this).addClass('active');
      });

      $('#sorts').on('click', 'a', function () {
         var sortByValue = $(this).attr('data-sort-by');
         $grid.isotope({sortBy: sortByValue});
      });

   });

});


/*
 *    Insight List
 */
$(document).ready(function () {

   $(window).load(function () {

      var $grid = $('#insight-item-list').isotope({
         itemSelector: '.element-item',
         layoutMode: 'fitRows',
         percentPosition: true,
         masonry: {
            itemSelector: '.element-item',
            columnWidth: '.element-item',
            gutter: 20
         },
         getSortData: {
            category: '[data-category]',
            weight: function (itemElem) {
               var weight = $(itemElem).find('.weight').text();
               return parseFloat(weight.replace(/[\(\)]/g, ''));
            }
         }
      });

      var filterFns = {
         numberGreaterThan50: function () {
            var number = $(this).find('.number').text();
            return parseInt(number, 10) > 50;
         },
         ium: function () {
            var name = $(this).find('.name').text();
            return name.match(/ium$/);
         }
      };

      $('#filters').on('click', 'a', function () {
         var filterValue = $(this).attr('data-filter');
         // use filterFn if matches value
         filterValue = filterFns[ filterValue ] || filterValue;
         $grid.isotope({filter: filterValue});
         $('#filters a').removeClass('active');
         $(this).addClass('active');
      });

      $('#sorts').on('click', 'a', function () {
         var sortByValue = $(this).attr('data-sort-by');
         $grid.isotope({sortBy: sortByValue});
      });

   });

});

/*
 *    Product Presentation List
 */
$(document).ready(function () {

   $(window).load(function () {

      var $grid = $('#product-presentation-item-list').isotope({
         itemSelector: '.element-item',
         layoutMode: 'fitRows',
         percentPosition: true,
         masonry: {
            itemSelector: '.element-item',
            columnWidth: '.element-item',
            gutter: 20
         },
         getSortData: {
            category: '[data-category]',
            weight: function (itemElem) {
               var weight = $(itemElem).find('.weight').text();
               return parseFloat(weight.replace(/[\(\)]/g, ''));
            }
         }
      });

      var filterFns = {
         numberGreaterThan50: function () {
            var number = $(this).find('.number').text();
            return parseInt(number, 10) > 50;
         },
         ium: function () {
            var name = $(this).find('.name').text();
            return name.match(/ium$/);
         }
      };

      $('#filters').on('click', 'a', function () {
         var filterValue = $(this).attr('data-filter');
         // use filterFn if matches value
         filterValue = filterFns[ filterValue ] || filterValue;
         $grid.isotope({filter: filterValue});
         $('#filters a').removeClass('active');
         $(this).addClass('active');
      });

      $('#sorts').on('click', 'a', function () {
         var sortByValue = $(this).attr('data-sort-by');
         $grid.isotope({sortBy: sortByValue});
      });

   });

});