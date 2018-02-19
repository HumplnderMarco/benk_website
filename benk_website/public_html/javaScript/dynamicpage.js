$(function () {

    var newHash = 1,
            $mainContent = $("#main-content"),
            $mainFrame = $("#mainFrame"),
            baseHeight = 0,
            $el;

    $mainFrame.height($mainFrame.height());
    baseHeight = $mainFrame.height() - $mainContent.height();

    $("nav").delegate("a", "click", function () {
        window.location.hash = $(this).attr("href");
        $("nav a[href=" + newHash + "]").addClass("current");
        return false;
    });

    $(window).bind('hashchange', function () {

        newHash = window.location.hash.substring(1);

        if (newHash) {
            $mainContent
                    .find("#guts")
                    .fadeOut(150, function () {
                        $mainContent.hide().load(newHash + " #guts", function () {
                            $mainContent.fadeIn(150, function () {
                                $mainFrame.animate({
                                    height: baseHeight + $mainContent.height() + 800 +  "px"
                                });
                            });
                            $("nav a").removeClass("current");
                            $("nav a[href=" + newHash + "]").addClass("current");
                        });
                    });
        }
        ;

    });

    $(window).trigger('hashchange');

});