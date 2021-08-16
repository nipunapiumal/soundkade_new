/**
 * Created by marcus on 4/18/17.
 */
$(function () {
    var countId = 0;
    var fields = {};
    var category = {};

    var init = function () {
        var categories = getMainCategories();
        renderMainCategories(categories);

        $("#saveCategory").on("click", function (e) {
            saveCategory();
        });

        $("#saveCategoryContainer").show();
    };

    var getMainCategories = function () {
        var categories = [];
        $.ajax({
            url: "/data-handler-1.0.0-SNAPSHOT/services/service/main-categories",
            method: "GET",
            type: "json",
            async: false,
            success: function (data) {
                if (data != null && data.data.length != 0) {
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

        for (var key in fields) {
            if (fields[key] !== null) {
                category.form.push(fields[key]);
            }
        }

        $.ajax({
            url: "/data-handler-1.0.0-SNAPSHOT/services/service/save-category",
            method: "POST",
            type: "json",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify(category),
            async: false,
            success: function (data) {
                if (data && data.isSuccess === "true") {
                    var container = $("#previewForm");
                    generateForm.generateForm(category, container);
                    $("#previewFormPanel").show();
                    clearSubCategory();
                    $("#saveCategoryContainer").hide();
                } else {
                    //TODO: warn the user
                }
            },
            error: function (err) {
                debugger;
            }
        });
    };

    /**
     * Add Field to the newly created category
     * */
    var addField = function () {
        var fieldName = $("#fieldName").val();
        var type = $("#fieldDataType").val();

        if (fieldName !== "" && type !== "") {
            countId += 1;

            fields[countId] = {
                name: fieldName,
                type: type
            };

            var div = $("<div/>", {
                class: "row added-field",
                id: "" + countId
            });

            var nameDiv = $("<div/>", {
                class: "col-lg-4"
            });

            div.append(nameDiv);

            var form = $("<form/>", {
                role: "form",
				class: "form-horizontal"			
            });

            nameDiv.append(form);

            var nameGroup = $("<div/>", {
                class: "form-group"
            });

            var nameLabel = $("<label>" + fieldName + "</label>");

            form.append(nameGroup);
            nameGroup.append(nameLabel);


            var typeDiv = $("<div/>", {
                class: "col-lg-4"
            });

            div.append(typeDiv);

            var typeForm = $("<form/>", {
                role: "form",
				class: "form-horizontal"
            });

            typeDiv.append(typeForm);

            var typeGroup = $("<div/>", {
                class: "form-group"
            });

            var typeLabel = $("<label>" + type + "</label>");

            typeForm.append(typeGroup);
            typeGroup.append(typeLabel);

            var deleteDiv = $("<div/>", {
                class: "col-lg-4"
            });

            div.append(deleteDiv);

            var deleteForm = $("<form/>", {
                role: "form",
				class: "form-horizontal"
            });

            deleteDiv.append(deleteForm);

            var deleteGroup = $("<div/>", {
                class: "form-group"
            });

            var deleteButton = $("<button/>", {
                class: "btn btn-danger btn-sm",
                type: "button",
                id: "" + countId
            }).append("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>");

            deleteButton.on('click', function (e) {
                var id = $(this).attr('id');
                $(this).closest(".row").remove();
                $("#fieldName").val("");
                fields[id] = null;
            });

            deleteForm.append(deleteGroup);
            deleteGroup.append(deleteButton);

            $("#fieldContainer").prepend(div);

            clearField();
        } else {
            // TODO: Warn Customer
        }
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