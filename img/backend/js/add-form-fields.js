/**
 * Created by marcus on 5/3/17.
 */
$(function () {
    var fieldList = [];
    var table = {};

    var init = function () {
        fieldList = loadFields();

        initTable();

        $("#addField").on('click', function (e) {
            saveField();
        });

        addDataToTable(fieldList);
    };

    var initTable = function () {
        table = $("#fields").DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            "bFilter": false,
            'columnDefs': [{
                'targets': 2,
                'searchable': false,
                'orderable': false,
                'className': 'dt-body-center',
                'render': function (data, type, full, meta) {
                    return '<div class="button-container hidden-sm hidden-xs action-buttons" data-id="' + full[1] + '">' +
                        '<a class="green edit-field" href="#">' +
                        '<i class="ace-icon fa fa-pencil bigger-130"></i>' +
                        '</a>' +

                        '<a class="red delete-field" href="#">' +
                        '<i class="ace-icon fa fa-trash-o bigger-130"></i>' +
                        '</a>' +

                        '</div>';
                }
            }]
        });
    };

    var addDataToTable = function (data) {
        table.clear().draw();
        for (var i = 0; i < data.length; i++) {
            table.row.add([
                data[i].name,
                data[i].type,
                ""
            ]).draw(false);
        }
    };

    var saveField = function () {
        var fieldName = $("#fieldName").val();
        var type = $("#fieldDataType").val();

        if (fieldName !== "" && type !== "") {
            var field = {
                id: 0,
                name: fieldName,
                type: type,
                description: ''
            };

            $.ajax({
                url: "/api-layer-1.0.0-SNAPSHOT/services/service/save-field",
                method: "POST",
                type: "json",
                dataType: "json",
                contentType: "application/json; charset=utf-8",
                data: JSON.stringify(field),
                async: false,
                success: function (data) {
                    debugger;
                    if (data && data.isSuccess === "true") {
                        clearFields();
                        fieldList = loadFields();
                        addDataToTable(fieldList);
                    } else {
                        //TODO: warn the user
                    }
                },
                error: function (err) {
                    debugger;
                }
            });
        }
    };

    var loadFields = function () {
        var fields = [];
        $.ajax({
            url: "/api-layer-1.0.0-SNAPSHOT/services/service/fields",
            method: "GET",
            type: "json",
            async: false,
            success: function (data) {
                if (data) {
                    fields = data.data;
                } else {
                    //TODO: warn the user
                }
            },
            error: function (err) {
            }
        });
        return fields;
    };

    var clearFields = function () {
        $("#fieldName").val("");
    };

    init();
}());