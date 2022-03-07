(function ($) {
    "use strict";

    $("nav .dropdown").hover(
        function () {
            var $this = $(this);
            $this.addClass("show");
            $this.find("> a").attr("aria-expanded", true);
            $this.find(".dropdown-menu").addClass("show");
        },
        function () {
            var $this = $(this);
            $this.removeClass("show");
            $this.find("> a").attr("aria-expanded", false);
            $this.find(".dropdown-menu").removeClass("show");
        }
    );
})(jQuery);

$(document).ready(function () {
    let title = $("title").text();

    if (title == "Home") {
        $("#activeHome").addClass("active");
    } else if (title == "Admin Register" || title == "Blogger Register") {
        $("#activeSignUp").addClass("active");
    } else if (title == "Admin LogIn" || title == "Blogger LogIn") {
        $("#activeLogin").addClass("active");
    } else if (title == "Blogger Dashboard" || title == "Admin Dashboard") {
        $(".activeDashboard").addClass("active");
    } else if (title == "Create Post") {
        $("#activeCreatePost").addClass("active");
    } else if (
        title == "Pending Posts" ||
        title == "Updated Pending Posts" ||
        title == "Approved Posts" ||
        title == "Disapproved Posts"
    ) {
        $(".activePost").addClass("active");
    } else if (
        title == "Pending Admins" ||
        title == "Updated Pending Admins" ||
        title == "Approved Admins" ||
        title == "Disapproved Admins"
    ) {
        $("#activeAdmins").addClass("active");
    } else if (
        title == "Pending Bloggers" ||
        title == "Updated Pending Bloggers" ||
        title == "Approved Bloggers" ||
        title == "Disapproved Bloggers"
    ) {
        $("#activeBloggers").addClass("active");
    } else if (title == "Blogger Setting" || title == "Admin Setting") {
        $(".activeSetting").addClass("active");
    }
});
