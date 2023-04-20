$(".togBtn").on('change', function() {
    if ($(this).is(':checked')) {
        $(".comments").style.display = "block";
    }
    else {
        $(".comments").style.display = "none";
    }
}
);