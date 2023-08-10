console.log("Custom JS");


$("#add_role").on("click", function () {
    $("#add_role_modal").modal('toggle');
    $("#add_role_btn").on("click", function (e) {
        e.preventDefault();
        let values = { name: $("#add_role_name").val(), _token: $('meta[name="csrf-token"]').attr('content') }
        $.ajax({
            type: "post",
            url: "http://localhost/storeUserRole",
            data: values,
            success: function (response) {
                console.log(response);
            }
        });
    });
    $("#add_role_modal").modal('toggle');
    $("#add_role_name").val("");
});

$("#add_user_btn").on("click", function () {
    $.ajax({
        type: "get",
        url: "http://localhost/getUserRole",
        success: function (data) {
            for (const key in data.user_roles) {
                $('#selected_role').append(`<option value="${key}">${data.user_roles[key]}</option>`)
            }
            $("#add_user_modal").modal('toggle');
        }

    });
})

$("#add_user").on("click", function (event) {
    event.preventDefault();
    let values = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        name: $("#name").val(),
        email: $("#email").val(),
        password: $("#password").val(),
        selected_role: $("#selected_role").val()
    }
    $.ajax({
        type: "post",
        url: "http://localhost/addUser",
        data: values,
        dataType: 'json',
        success: function (data) {
            console.log(data);
        }
    });
})

