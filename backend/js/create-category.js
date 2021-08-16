/**
 * Created by marcus on 4/18/17.
 */
$(function () {
    var countId = 0;
    var fields = {};
    var category = {};
    var table = {};

    var init = function () {
        var categories = getMainCategories();
        renderMainCategories(categories);
        initializeTable();

        $("#addField").on("click", function (e) {
            addField();
        });

        $("#saveCategory").on("click", function (e) {
            saveCategory();
        });

        $("#addDefaultDataContainer").hide();
        $("#saveCategoryContainer").show();

        getSubCategories();
    };

    var initializeTable = function () {
        table = $("#categories").DataTable({
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
                    return '<div class="button-container hidden-sm hidden-xs action-buttons" data-id="' + full[0] + '">' +
                        '<a class="green edit-category" href="#">' +
                        '<i class="ace-icon fa fa-pencil bigger-130"></i>' +
                        '</a>' +

                        '<a class="red delete-category" href="#">' +
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
                data[i].title,
                data[i].description,
                ""
            ]).draw(false);
        }
    };

    var getMainCategories = function () {
        var categories = [];
        $.ajax({
            url: "/api-layer-1.0.0-SNAPSHOT/services/service/main-categories",
            method: "GET",
            type: "json",
            async: false,
            success: function (data) {
                if (data !== null && data.data.length !== 0) {
                    debugger;
                    categories = data.data;
                } else {
                    // TODO: Message
                }
            }
        });
        return categories;
    };

    var renderMainCategories = function (categories) {
        for (var i = 0; i < categories.length; i++) {
            var option = "<option id='" + categories[i].id + "'>" + categories[i].title + "</option>";
            $("#mainCategoriesList").append(option);
        }
    };

    var getSubCategories = function () {
        var selectedMainCategory = $("#mainCategoriesList").val();
        var options = $("#mainCategoriesList").find("option");
        var parentId = 0;

        options.each(function () {
            if ($(this).text() === selectedMainCategory) {
                parentId = parseInt($(this).attr('id'));
            }
        });

        $.ajax({
            url: "/api-layer-1.0.0-SNAPSHOT/services/service/sub-categories?parent=" + parentId,
            method: "GET",
            type: "json",
            async: false,
            success: function (data) {
                if (data) {
                    addDataToTable(data.data)
                } else {
                    //TODO: warn the user
                }
            },
            error: function (err) {
                // TODO: Warn Developer
            }
        });
    };

    /**
     * Save Newly created category
     * */
    var saveCategory = function () {
        var selectedMainCategory = $("#mainCategoriesList").val();
        var options = $("#mainCategoriesList").find("option");
        var parentId = 0;

        options.each(function () {
            if ($(this).text() === selectedMainCategory) {
                parentId = parseInt($(this).attr('id'));
            }
        });

        var title = $("#categoryName").val();
        var description = $("#categoryDescription").val();

        if (title === "") {
            // TODO: Add warning message
            return;
        }

        var category = {
            id: 0,
            title: title,
            description: description,
            parent: parentId,
            isSubCategory: 1,
            isParentCategory: 0,
            form: []
        };

        // for (var key in fields) {
        //     if (fields[key] !== null) {
        //         category.form.push(fields[key]);
        //     }
        // }

        $.ajax({
            url: "/api-layer-1.0.0-SNAPSHOT/services/service/save-category",
            method: "POST",
            type: "json",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify(category),
            async: false,
            success: function (data) {
                if (data && data.isSuccess === "true") {
                    clearSubCategory();
                    getSubCategories();
                } else {
                    //TODO: warn the user
                }
            },
            error: function (err) {
                //TODO: warn the developer
            }
        });
    };

    /**
     * Add Field to the newly created category
     * */
    var addField = function () {

    };

    /**
     * Clear user input values
     * */
    var clearField = function () {
        $("#fieldName").val("");
        $("#fieldDataType").val("");
    };

    /**
     * Clear user input values in sub category creation
     * */
    var clearSubCategory = function () {
        $("#categoryName").val("");
        $("#categoryDescription").val("");
        $(".added-field").remove();
        fields = [];
        countId = 0;
        category = {};
        clearField();
    };
    init();
}());