/**
 * Created by marcus on 4/22/17.
 */
var generateForm = {};

generateForm.generateForm = function (category, container) {

    // var category = {
    //     id: 0,
    //     title: title,
    //     description: description,
    //     parent: parentId,
    //     isSubCategory: 1,
    //     isParentCategory: 0,
    //     form: []
    // };

    container = $(container);

    var title = $("<h3/>", {
        class: "page-header",
        text: "Add a " + category.title,
        id: "id-" + category.id
    }).appendTo(container);

    for (var index = 0; index < category.form.length; index++) {
        var row = $("<div/>", {
            class: "row"
        }).appendTo(container);

        var column = $("<div/>", {
            class: "col-lg-12"
        }).appendTo(row);

        var form = $("<form/>", {
            role: "form",
			class: "form-horizontal"
        }).appendTo(column);

        var formGroup = $("<div/>", {
            class: "form-group"
        }).appendTo(form);

        var label = $("<label/>", {
            text: category.form[index].name
        }).appendTo(formGroup);

        var inputElement = this.getFieldElement(category.form[index].name, category.form[index].type);
        inputElement.appendTo(formGroup);

        if (category.formData) {
            if (category.formData.length > 0 && this.getFormDataByFieldName(category.formData, category.form[index].name)) {
                this.addData(this.getFormDataByFieldName(category.formData, category.form[index].name), inputElement, category.form[index].type);
            }
        }
    }
};

generateForm.getFormDataByFieldName = function (formData, fieldName) {
    for (var i = 0; i < formData.length; i++) {
        if (formData[i].fieldName === fieldName) {
            return formData[i];
        }
    }
    return null;
};

generateForm.addData = function (formData, element, elementType) {
    switch (elementType) {
        case "text":
            element.val(formData.defaultData[0]);
            break;
        case "select":
            for (var i = 0; i < formData.defaultData.length; i++) {
                element.append("<option>" + formData.defaultData[i] + "</option>")
            }
            break;
        case "check":
            break;
        case "option":
            break;
        default:
            break;
    }
};

generateForm.getFieldElement = function (name, type) {
    switch (type) {
        case "text":
            return $("<input/>", {
                id: "fieldName",
                class: "form-control"
            });
            break;
        case "select":
            return $("<select/>", {
                id: name,
                class: "form-control chosen-select"
            });
            break;
        case "check":
            return $("<input/>", {
                id: name,
                type: "checkbox",
                class: "ace"
            });
            break;
        case "option":
            return $("<input/>", {
                type: "radio",
                name: "optionsRadios",
                id: name,
                value: name,
                class: "ace",
                checked: ""
            });
            break;
        default:
            return null;
            break;
    }
};