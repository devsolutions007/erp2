//Javascript code for autocomplete of field sel_product_id 

$(document).ready(function() {
    var autoselect = 0;
    var options = [];

    /* Remove product id before select another product use keyup instead of change to avoid loosing the product id. This is needed only for select of predefined product */
    /* TODO Check if we can remove this */
    $("input#search_sel_product_id").keydown(function() {
        $("#sel_product_id").val("");
    });

    /* I disable this. A call to trigger is already done later into the select action of the autocomplete code
        $("input#search_sel_product_id").change(function() {
        console.log("Call the change trigger on input sel_product_id because of a change on search_sel_product_id was triggered");
        $("#sel_product_id").trigger("change");
    });*/

    // Check options for secondary actions when keyup
    $("input#search_sel_product_id").keyup(function() {
            if ($(this).val().length == 0)
            {
                $("#search_sel_product_id").val("");
                $("#sel_product_id").val("").trigger("change");
                if (options.option_disabled) {
                    $("#" + options.option_disabled).removeAttr("disabled");
                }
                if (options.disabled) {
                    $.each(options.disabled, function(key, value) {
                        $("#" + value).removeAttr("disabled");
                    });
                }
                if (options.update) {
                    $.each(options.update, function(key, value) {
                        $("#" + key).val("").trigger("change");
                    });
                }
                if (options.show) {
                    $.each(options.show, function(key, value) {
                        $("#" + value).hide().trigger("hide");
                    });
                }
                if (options.update_textarea) {
                    $.each(options.update_textarea, function(key, value) {
                        if (typeof CKEDITOR == "object" && typeof CKEDITOR.instances != "undefined" && CKEDITOR.instances[key] != "undefined") {
                            CKEDITOR.instances[key].setData("");
                        } else {
                            $("#" + key).html("");
                        }
                    });
                }
            }
    });
    $("input#search_sel_product_id").autocomplete({
        source: function( request, response ) {
            $.get("/product/ajax/products.php?htmlname=sel_product_id&outjson=1&price_level=0&type=&mode=1&status=1&finished=2&warehousestatus=", { sel_product_id: request.term }, function(data){
                if (data != null)
                {
                    response($.map( data, function(item) {
                        if (autoselect == 1 && data.length == 1) {
                            $("#search_sel_product_id").val(item.value);
                            $("#sel_product_id").val(item.key).trigger("change");
                        }
                        var label = item.label.toString();
                        var update = {};
                        if (options.update) {
                            $.each(options.update, function(key, value) {
                                update[key] = item[value];
                            });
                        }
                        var textarea = {};
                        if (options.update_textarea) {
                            $.each(options.update_textarea, function(key, value) {
                                textarea[key] = item[value];
                            });
                        }
                        return { label: label, value: item.value, id: item.key, update: update, textarea: textarea, disabled: item.disabled }
                    }));
                }
                else console.error("Error: Ajax url /product/ajax/products.php?htmlname=sel_product_id&outjson=1&price_level=0&type=&mode=1&status=1&finished=2&warehousestatus= has returned an empty page. Should be an empty json array.");
            }, "json");
        },
        dataType: "json",
        minLength: 2,
        select: function( event, ui ) {     // Function ran once new value has been selected into javascript combo
            console.log("Call change on input sel_product_id because of select definition of autocomplete select call on input#search_sel_product_id");
            console.log("Selected id = "+ui.item.id+" - If this value is null, it means you select a record with key that is null so selection is not effective");
            $("#sel_product_id").val(ui.item.id).trigger("change"); // Select new value
            // Disable an element
            if (options.option_disabled) {
                console.log("Make action option_disabled on #"+options.option_disabled+" with disabled="+ui.item.disabled)
                if (ui.item.disabled) {
                    $("#" + options.option_disabled).prop("disabled", true);
                    if (options.error) {
                        $.jnotify(options.error, "error", true);        // Output with jnotify the error message
                    }
                    if (options.warning) {
                        $.jnotify(options.warning, "warning", false);       // Output with jnotify the warning message
                    }
                } else {
                    $("#" + options.option_disabled).removeAttr("disabled");
                }
            }
            if (options.disabled) {
                console.log("Make action disabled on each "+options.option_disabled)
                $.each(options.disabled, function(key, value) {
                    $("#" + value).prop("disabled", true);
                });
            }
            if (options.show) {
                console.log("Make action show on each "+options.show)
                $.each(options.show, function(key, value) {
                    $("#" + value).show().trigger("show");
                });
            }
            // Update an input
            if (ui.item.update) {
                console.log("Make action update on each ui.item.update")
                // loop on each "update" fields
                $.each(ui.item.update, function(key, value) {
                    $("#" + key).val(value).trigger("change");
                });
            }
            if (ui.item.textarea) {
                console.log("Make action textarea on each ui.item.textarea")
                $.each(ui.item.textarea, function(key, value) {
                    if (typeof CKEDITOR == "object" && typeof CKEDITOR.instances != "undefined" && CKEDITOR.instances[key] != "undefined") {
                        CKEDITOR.instances[key].setData(value);
                        CKEDITOR.instances[key].focus();
                    } else {
                        $("#" + key).html(value);
                        $("#" + key).focus();
                    }
                });
            }
            console.log("ajax_autocompleter new value selected, we trigger change on original component so field #search_sel_product_id");

            $("#search_sel_product_id").val(ui.item.label).trigger("change");   // We have changed value of the combo select, we must be sure to trigger all js hook binded on this event. This is required to trigger other javascript change method binded on original field by other code.
        }
        ,delay: 500
    }).data("ui-autocomplete")._renderItem = function( ul, item ) {
        return $("<li>")
        .data( "ui-autocomplete-item", item ) // jQuery UI > 1.10.0
        .append( '<a><span class="tag">' + item.label + "</span></a>" )
        .appendTo(ul);
    };

});


//JS CODE TO ENABLE select2 for id = idwarehouse 
$(document).ready(function () {
    $('#idwarehouse').select2({
        dir: 'ltr',
        width: 'resolve',       /* off or resolve */
        minimumInputLength: 0
    });
});


// JS CODE TO ENABLE select2 for id = release_stock_plant 
$(document).ready(function () {
    $('#release_stock_plant').select2({
        dir: 'ltr',
        width: 'resolve',       /* off or resolve */
        minimumInputLength: 0
    });
});