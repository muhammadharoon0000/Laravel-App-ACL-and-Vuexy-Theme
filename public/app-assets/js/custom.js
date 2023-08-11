console.log("Custom JS");


function updateUserList() {
    $('#myTable').dataTable({
        ajax: 'http://localhost/get_all_users',
        "columns": [
            { "data": "name" },
            { "data": "email" },
            {
                "data": null,
                "mRender": function (data) {
                    return `<button class="btn btn-primary m-1" onclick="deleteUser(${data.id})">Delete</button><button class="btn btn-success m-1" data-toggle="modal-feed" data-target="#modal_md" data-feed="http://localhost/edit_user_modal/${data.id}">Edit</button>`;
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
                    return `<button class="btn btn-primary m-1" data-toggle="delete-feed"  data-feed="http://localhost/delete_user_role/${data.id}" data-confirm-button-text="Yes, remove it!" data-swal-cancel-text="The record has not been deleted." data-swal-confirm-text="The record has been deleted." data-swal-confirm-title="Deleted!">Delete</button><button class="btn btn-success m-1" data-toggle="modal-feed" data-target="#modal_sm" data-feed="http://localhost/edit_user_role/${data.id}">Edit</button>`;
                }
            }
        ]
    });
}
updateUserList();
updateUserRolesList();


