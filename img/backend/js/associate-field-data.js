/**
 * Created by marcus on 5/3/17.
 */
$(function () {
    var subCategories = [];
    var mainCategories = [];
    var currentSubCatForm = {};
    var currentSubCatFormData = {};
    var currentSelectedSubCat = {};
    var fieldList = [];
    var selectedFieldList = {};
    var table = {};
    var selectedAssociatingField = "";
    var tempAssociatedData = {};
    var dataAssociations = [];

    var init = function () {
        fieldList = loadFields();

        mainCategories = getMainCategories();
        renderMainCategories(mainCategories);

        subCategories = getSubCategoriesForMainCategory();
        renderSubCategories(subCategories);

        currentSelectedSubCat = getSubCategoryByName($("#subCategoriesList").val());

        currentSubCatForm = loadFormForCategory($("#subCategoriesList").val());

        currentSubCatFormData = loadFormDataForCategory($("#subCategoriesList").val());

        for (var i = 0; i < currentSubCatForm.length; i++) {
            addToSelectedFieldMap(currentSubCatForm[i].name);
        }

        for (var i = 0; i < currentSubCatFormData.length; i++) {
            addToDataAssociation(currentSubCatFormData[i]);
        }

        initTable();

        $("#mainCategoriesList").on('change', function (e) {
            subCategories = getSubCategoriesForMainCategory();
            renderSubCategories(subCategories);
            $("#subCategoriesList").trigger('change');
        });

        $("#subCategoriesList").on('change', function (e) {
            var category = $(this).val();

            currentSelectedSubCat = getSubCategoryByName(category);
            currentSubCatForm = loadFormForCategory($("#subCategoriesList").val());
            currentSubCatFormData = loadFormDataForCategory($("#subCategoriesList").val());

            selectedFieldList = {};
            dataAssociations = [];
            if (currentSubCatForm) {
                for (var i = 0; i < currentSubCatForm.length; i++) {
                    addToSelectedFieldMap(currentSubCatForm[i].name);
                }
            }

            if (currentSubCatFormData) {
                for (var i = 0; i < currentSubCatFormData.length; i++) {
                    addToDataAssociation(currentSubCatFormData[i]);
                }
            }

            addDataToTable(fieldList);
        });

        $("#associateData").on("click", function (e) {
            var data = {
                fieldName: selectedAssociatingField,
                defaultData: []
            };

            for (var tag in tempAssociatedData) {
                data.defaultData.push(tag);
            }

            dataAssociations.push(data);
            $('#defaultData').modal('hide');
        });

        addDataToTable(fieldList);

        $("#saveAssociation").on('click', function () {
            saveAssociation();
        });

        $("#previewTab").on('click', function () {
            $("#previewForm").empty();
            if (currentSubCatForm) {
                var container = $("#previewForm");
                currentSelectedSubCat.form = currentSubCatForm;
                currentSelectedSubCat.formData = currentSubCatFormData;
                generateForm.generateForm(currentSelectedSubCat, container);

                $("#previewFormPanel").show();
                $("#previewFormError").hide();
            } else {
                $("#previewForm").empty();
                $("#previewFormPanel").hide();
                $("#previewFormError").show();
            }
        });
    };

    var addToSelectedFieldMap = function (fieldName) {
        selectedFieldList[fieldName] = fieldName;
    };

    var addToDataAssociation = function (formData) {
        dataAssociations.push(formData);
    };

    var getSubCategoryByName = function (categoryName) {

        for (var i = 0; i < subCategories.length; i++) {
            if (subCategories[i].title === categoryName) {
                return subCategories[i];
            }
        }
    };

    var renderMainCategories = function (categories) {
        $("#mainCategoriesList").empty();
        for (var i = 0; i < categories.length; i++) {
            var option = "<option id='" + categories[i].id + "'>" + categories[i].title + "</option>";
            $("#mainCategoriesList").append(option);
        }
    };

    var renderSubCategories = function (subCategories) {
        $("#subCategoriesList").empty();
        for (var i = 0; i < subCategories.length; i++) {
            var option = "<option id='" + subCategories[i].id + "'>" + subCategories[i].title + "</option>";
            $("#subCategoriesList").append(option);
        }
    };

    var initTable = function () {
        table = $("#fields").DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            "bFilter": false,
            'columnDefs': [{
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'className': 'dt-body-center',
                'render': function (data, type, full, meta) {
                    if (selectedFieldList[full[1]]) {
                        return '<input class="selectField" type="checkbox" checked="checked" name="id[]" value="' + $('<div/>').text(full[1]).html() + '">';
                    } else {
                        return '<input class="selectField" type="checkbox" name="id[]" value="' + $('<div/>').text(full[1]).html() + '">';
                    }
                }
            }, {
                'targets': 3,
                'searchable': false,
                'orderable': false,
                'className': 'dt-body-center',
                'render': function (data, type, full, meta) {
                    if (selectedFieldList[full[1]]) {
                        return '<div class="button-container hidden-sm hidden-xs action-buttons" data-id="' + full[1] + '">' +
                            '<a class="green edit-field" href="#">' +
                            '<i class="ace-icon fa fa-pencil bigger-130"></i>' +
                            '</a>' +

                            '<a class="green add-data">' +
                            '<i class="ace-icon fa fa-plus bigger-130"></i>' +
                            '</a>' +

                            '</div>';
                    } else {
                        return '<div class="button-container hidden-sm hidden-xs action-buttons" data-id="' + full[1] + '">' +
                            '<a class="green edit-field" href="#">' +
                            '<i class="ace-icon fa fa-pencil bigger-130"></i>' +
                            '</a>' +

                            '<a class="green add-data" style="display: none;">' +
                            '<i class="ace-icon fa fa-plus bigger-130"></i>' +
                            '</a>' +

                            '</div>';
                    }
                }
            }]
        });

        $(".selectAllFields").on('click', function (e) {
            // Get all rows with search applied
            var rows = table.rows({'search': 'applied'}).nodes();
            // Check/uncheck checkboxes for all rows in the table
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
            if (this.checked) {
                $(this).closest("table").find('.add-data').show();
                for (var i = 0; i < fieldList.length; i++) {
                    selectedFieldList[fieldList[i].name] = fieldList[i].name;
                }
            } else {
                $(this).closest("table").find('.add-data').hide();
                for (var i = 0; i < fieldList.length; i++) {
                    delete selectedFieldList[fieldList[i].name];
                }
            }
        });
    };

    var addDataToTable = function (data) {
        table.clear().draw();
        for (var i = 0; i < data.length; i++) {
            table.row.add([
                "",
                data[i].name,
                data[i].type,
                ""
            ]).draw(false);
        }

        $(".selectField").on('click', function (e) {
            e.stopPropagation();
            if (this.checked) {
                $(this).closest('tr').find('.add-data').show();
                selectedFieldList[$(this).val()] = $(this).val();
            } else {
                $(this).closest('tr').find('.add-data').hide();
                delete selectedFieldList[$(this).val()];
            }
        });

        $(".add-data").on('click', function (e) {
            e.stopPropagation();
            selectedAssociatingField = $(this).parent().attr("data-id");

            var defaultData = getDefaultDataForField(selectedAssociatingField);
            if (defaultData) {
                for (var i = 0; i < defaultData.defaultData.length; i++) {
                    $("#defaultDataInput").append("<option selected='selected'>" + defaultData.defaultData[i] + "</option>");
                }
            }

            $("#defaultDataInput").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });

            $("#defaultDataInput").on("select2:unselect", function (e) {
                debugger;
                var data = e.params.data;
                var defaultData = getDefaultDataForField(selectedAssociatingField);
                // if (isValueExist(defaultData.defaultData, data)) {
                //
                // }
                delete tempAssociatedData[data.id];
            });

            $("#defaultDataInput").on("select2:select", function (e) {
                debugger;
                var data = e.params.data;
                tempAssociatedData[data.id] = data.text;
            });

            $("#modalLabel").text("Add Default Values Data to: " + selectedAssociatingField);
            $('#defaultData').modal('show');
        });
    };

    var getDefaultDataForField = function (fieldName) {
        for (var i = 0; i < dataAssociations.length; i++) {
            if (dataAssociations[i].fieldName === fieldName) {
                return dataAssociations[i];
            }
        }
        return null;
    };

    var isValueExist = function (defaultData, value) {
        for (var i = 0; i < defaultData.length; i++) {
            if (defaultData[i] === value) {
                return true;
            }
        }
        return false;
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

    var getSubCategoriesForMainCategory = function () {
        var subCats = [];
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
                debugger;
                if (data) {
                    subCats = data.data;
                    // addDataToTable(data.data)
                } else {
                    //TODO: warn the user
                }
            },
            error: function (err) {
                debugger;
            }
        });

        return subCats;
    };

    var addFieldsToCategory = function () {

    };

    var loadFormDataForCategory = function (category) {
        var formData = {};
        $.ajax({
            url: "/api-layer-1.0.0-SNAPSHOT/services/service/form-data?category=" + category,
            method: "GET",
            type: "json",
            async: false,
            success: function (data) {
                debugger;
                if (data) {
                    formData = data.formData;
                } else {
                    //TODO: warn the user
                }
            },
            error: function (err) {
                formData = null;
            }
        });

        return formData;
    };

    var loadFormForCategory = function (category) {
        var form = {};
        $.ajax({
            url: "/api-layer-1.0.0-SNAPSHOT/services/service/form?category=" + category,
            method: "GET",
            type: "json",
            async: false,
            success: function (data) {
                debugger;
                if (data) {
                    form = data.form;
                } else {
                    //TODO: warn the user
                }
            },
            error: function (err) {
                form = null;
            }
        });

        return form;
    };

    var loadFields = function () {
        var fields = [];
        $.ajax({
            url: "/api-layer-1.0.0-SNAPSHOT/services/service/fields",
            method: "GET",
            type: "json",
            async: false,
            success: function (data) {
                debugger;
                if (data) {
                    fields = data.data;
                } else {
                    //TODO: warn the user
                }
            },
            error: function (err) {
                debugger;
            }
        });
        return fields;
    };

    var getFieldDataByName = function (fieldName) {
        for (var i = 0; i < fieldList.length; i++) {
            if (fieldName === fieldList[i].name) {
                return fieldList[i];
            }
        }
    };

    var getDefaultData = function (fieldName) {
        for (var i = 0; i < dataAssociations.length; i++) {
            if (fieldName === dataAssociations[i].fieldName) {
                return dataAssociations[i];
            }
        }
    };

    var saveAssociation = function () {
        var category = {
            id: currentSelectedSubCat.id,
            title: currentSelectedSubCat.title,
            description: currentSelectedSubCat.description,
            parent: currentSelectedSubCat.parent,
            isSubCategory: currentSelectedSubCat.isSubCategory,
            isParentCategory: currentSelectedSubCat.isParentCategory,
            form: [],
            formData: []
        };

        for (var key in selectedFieldList) {
            var form = getFieldDataByName(key);
            var formData = getDefaultData(form.name);
            category.form.push(form);
            category.formData.push(formData);
        }

        debugger;
        $.ajax({
            url: "/api-layer-1.0.0-SNAPSHOT/services/service/update-association",
            method: "POST",
            type: "json",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify(category),
            async: false,
            success: function (data) {
                debugger;
                if (data && data.isSuccess === "true") {

                    currentSelectedSubCat = getSubCategoryByName($("#subCategoriesList").val());

                    currentSubCatForm = loadFormForCategory($("#subCategoriesList").val());

                    currentSubCatFormData = loadFormDataForCategory($("#subCategoriesList").val());
                } else {
                    //TODO: warn the user
                }
            },
            error: function (err) {
                //TODO: warn the developer
                debugger;
            }
        });
    };

    init();
}());