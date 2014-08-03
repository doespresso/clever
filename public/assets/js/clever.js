yepnope({
    load:{
        "pace":"/assets/js/plugins/pace.min.js",
        "jquery":"/assets/js/lib/jquery.js",
        "bootstrap":"/assets/js/plugins/bootstrap-select.min.js",
        "bootstrap-select":"/assets/js/lib/bootstrap.min.js",
        "pathjs":"/assets/js/lib/path.min.js",
        "scrolling":"/assets/js/plugins/scrolling.js",
        "jquerytransit":"/assets/js/lib/jquery.transit.min.js",
        "jquerynav":"/assets/js/lib/jquery.nav.js",
        "site":"/assets/js/app/site.js"
    },
    callback:{
        'pace':function (url, result, key) {
            Pace.start({
                    document:false
                }
            );
        },
        'jquery':function (url, result, key) {
            console.info('jquery');
        },
        'bootstrap':function (url, result, key) {

        },
        'bootstrap-select':function (url, result, key) {
            $('select').selectpicker();
        },
        'site':function (url, result, key) {

        }
    }
});