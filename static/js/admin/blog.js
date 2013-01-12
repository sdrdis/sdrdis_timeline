define([
  'jquery-nos-appdesk'
], function($) {
    "use strict";
    return function(appDesk) {
        return {

            /**
             * Config variables
             */
            blognews : {
                namespace   : 'Nos\\BlogNews\\Blog',
                dir         : 'sdrdis_timeline',
                icon_name   : 'blog'
            }
        };
    };
});
