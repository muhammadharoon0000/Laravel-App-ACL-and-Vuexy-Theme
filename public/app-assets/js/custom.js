console.log("Custom JS");


// let table = new DataTable('#myTable');
// var table = $('#myTable').DataTable({
//     ajax: "http://localhost/get_all_users",
//     "columns": [
//         { "data": "name" },
//         { "data": "email" },
//         {
//             "data": null,
//             "mRender": function (data, type, row) {
//                 return `<button class="btn btn-primary m-1"  onclick="deleteUser(${data.id})">Delete</button><button class="btn btn-success m-1"  onclick="editUser(${data.id})">Edit</button>`;
//             }
//         },
//     ]
// });


$("#add_role_btn").on("click", function () {

    let add_user_role_modal = $("#add_user_role_modal").html();
    $("#main_modal_body").append(add_user_role_modal);
    $("#main_modal").modal('toggle');

    $("#add_role").on("click", function (e) {
        e.preventDefault();
        let values = { name: $("#add_role_name").val(), _token: $('meta[name="csrf-token"]').attr('content') }
        $.ajax({
            type: "post",
            url: "http://localhost/store_user_role",
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
        url: "http://localhost/get_user_role",
        success: function (data) {
            $("#main_modal_body").append(data.html);
            $("#main_modal").modal('toggle');
        }
    })
    $("#main_modal_body").html("");
});






$("#add_user").on("click", function (event) {
    event.preventDefault();
    let values = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        name: $("#name").val(),
        email: $("#email").val(),
        password: $("#password").val(),
        confirm_password: $("#confirm_password").val(),
        selected_role: $("#selected_role").val()
    }
    $.ajax({
        type: "post",
        url: "http://localhost/add_user",
        data: values,
        dataType: 'json',
        success: function (data) {
            console.log(data);
        }
    });
})

$("#assign_permissions_btn").on("click", function (e) {
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "http://localhost/get_permissions",
        success: function (data) {
            $("#main_modal_body").append(data.html);
            $("#main_modal").modal('toggle');
        }
    });
})


function updateUserList() {
    $('#myTable').dataTable({
        ajax: 'http://localhost/get_all_users',
        "columns": [
            { "data": "name" },
            { "data": "email" },
            {
                "data": null,
                "mRender": function (data) {
                    return `<button class="btn btn-primary m-1" onclick="deleteUser(${data.id})">Delete</button><button class="btn btn-success m-1"><a href="http://localhost/edit_user_form/${data.id}">Edit</a></button>`;
                }
            }
        ]
    });
}

function updateUserRolesList() {
    $('#myTable2').dataTable({
        ajax: 'http://localhost/get_all_user_roles',
        "columns": [
            { "data": "name" },
            {
                "data": null,
                "mRender": function (data) {
                    return `<button class="btn btn-primary m-1"  onclick="deleteUserRole(${data.id})">Delete</button><button class="btn btn-success m-1"  onclick="editUserRole(${data.id})">Edit</button>`;
                }
            }
        ]
    });
}
updateUserList();
updateUserRolesList();



function deleteUser(id) {
    $.ajax({
        type: "get",
        url: `http://localhost/delete_user/${id}`,
        success: function (response) {
            console.log(response);
            updateUserList();
        }
    });
}
function editUser(id) {
    $.ajax({
        type: "get",
        url: `http://localhost/edit_user/${id}`,
        success: function (response) {
            console.log(response);
            updateUserList();
        }
    });
}
function deleteUserRole(id) {
    $.ajax({
        type: "get",
        url: `http://localhost/delete_user_role/${id}`,
        success: function (response) {
            console.log(response);
            updateUserRolesList();
        }
    });
}

