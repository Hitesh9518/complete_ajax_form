
// select-state-city
$(document).ready(function () {
    $("#state").change(function () {
        var stateID = $(this).val();
        // alert(stateID);
        $.ajax({
            method: "POST",
            url: "ajax_get_city_data.php",
            data: 'state_id=' + stateID,
            // data: {state_id:stateID},
            success: function (data) {
                $("#city").html(data);
            }
        });
    });
});

// insert
$(document).on("submit", "#teachar_form", function (e) {

    e.preventDefault();
    $.ajax({
        method: "POST",
        url: "ajax_form_insert.php",
        data: $(this).serialize(),
        success: function (data) {
            $("#msg").html(data),
                $("#teachar_form").find("input");
        }
    });
});

// update
$(document).on("submit", "#teachar_update_form", function (e) {

    e.preventDefault();
    $.ajax({
        method: "POST",
        url: "ajax_form_update.php",
        data: $(this).serialize(),
        success: function (data) {
            $("#msg").html(data),
                $("teachar_update_form").text(data)
        }
    });
});

//display
$(document).ready(function () {
    $.ajax({
        url: "ajax_display_data.php",
        method: "POST",
        cache: false,
        success: function (data) {
            $("#table").html(data);
        }
    });
});

//select-state-city-update

$(document).ready(function () {
    $.ajax({
        url: "ajax_get_state_data.php",
        type: "POST",
        success: function (data) {
            $("#state_dropdown").append(data);
            $("#state_dropdown").find();
            $("#state_id").val();
            var state_id = $("#state_id").val();
            $("#state_dropdown").val(state_id);
        }
    });
});

$(document).ready(function () {
    $("#state_id").load("ajax_get_state_data.php", function () {
        var stateID = $(this).val();
        // alert(stateID);
        $.ajax({
            url: "ajax_get_city_data2.php",
            type: "POST",
            data: { state: stateID },
            success: function (data) {
                $("#city_dropdown").find();
                $("#city_dropdown").append(data);
                var city_id = $("#city_id").val();
                $("#city_dropdown").val(city_id);
            }
        });
    });
});


$(document).ready(function () {
    $("#state_dropdown").change(function () {
        var stateID = $(this).val();
        $.ajax({
            method: "POST",
            url: "ajax_get_city_data.php",
            data: 'state_id=' + stateID,
            // data: {state_id:stateID},
            success: function (data) {
                $("#city_dropdown").html(data);
            }
        });
    });
});

// soft delete

$(document).ready(function () {
    $(document).on("click", ".delete-btn", function () {
        var teacher_id = $(this).data("id");
        var element = this;

        $.ajax({
            url: "ajax_soft_delete.php",
            method: "POST",
            data: { id: teacher_id },
            success: function (data) {
                if (data == 1) {
                    $(element).closest("tr").fadeOut();
                }
            }
        });
    });
});

// search - input
$(document).ready(function () {
    $("#search").keyup(function () {
        var search = $(this).val();
        // alert(search);

        $.ajax({
            url: "ajax_search_text.php",
            method: "POST",
            data: { search: search },
            success: function (data) {
                $("#table").html(data);
            }
        });
    });
});

// search - date
$(document).ready(function () {
    $("#search_date").mouseleave(function () {
        var search = $(this).val();
        // alert(search);

        $.ajax({
            url: "ajax_search_date.php",
            method: "POST",
            data: { search_date: search },
            success: function (data) {
                $("#table").html(data);
            }
        });
    });
});