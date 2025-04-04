define([
    "jquery",
    "local_kopere_dashboard/dataTables",
    "local_kopere_dashboard/dataTables.buttons",
    "local_kopere_dashboard/dataTables.buttons.html5",
    "local_kopere_dashboard/dataTables.buttons.print",
    "local_kopere_dashboard/dataTables.responsive",
    "local_kopere_dashboard/jszip",
], function($) {
    var dataTables_init = {
        init : function(tableid, params) {

            if (!params) {
                var params_json = $(`#tableparams_${tableid}`).val();
                params = JSON.parse(params_json);
            }

            var renderer = {
                mustacheRenderer  : function(data, type, row, info) {
                    if (type != 'display') {
                        return data;
                    }

                    var columns = info.settings.aoColumns;
                    var col = info.col;
                    var column = columns[col];
                    var columnname = column.data;

                    if (row[`${columnname}_mustache`]) {
                        return row[`${columnname}_mustache`];
                    } else {
                        return data;
                    }
                },
                numberRenderer    : function(data, type, row, info) {
                    if (data === null) {
                        return "";
                    }
                    if (type != 'display') {
                        return data;
                    }

                    return '<div class="text-center text-nowrap">' + data + '</div>';
                },
                currencyRenderer  : function(data, type, row, info) {
                    if (type != 'display') {
                        return data;
                    }

                    return '<div class="text-center text-nowrap">R$ ' + data + '</div>';
                },
                filesizeRenderer  : function(data, type, row, info) {
                    if (type != 'display') {
                        return data;
                    }

                    if (data == null || data < 1) {
                        return '0 b';
                    } else if (data < 1000) {
                        return data + ' b';
                    } else if (data < 1000 * 1000) {
                        data = data / (1000);
                        return data.toFixed(2) + ' Kb';
                    } else if (data < 1000 * 1000 * 1000) {
                        data = data / (1000 * 1000);
                        return data.toFixed(2) + ' Mb';
                    } else if (data < 1000 * 1000 * 1000 * 1000) {
                        data = data / (1000 * 1000 * 1000);
                        return data.toFixed(2) + ' Gb';
                    } else {
                        return data.toFixed(2) + ' Tb';
                    }
                },
                dateRenderer      : function(data, type, row, info) {
                    if (type != 'display') {
                        return data;
                    }

                    if (data < 1000) {
                        return "";
                    }

                    function twoDigit($value) {
                        if ($value < 10) {
                            return '0' + $value;
                        }
                        return $value;
                    }

                    var a = new Date(data * 1000);
                    var year = a.getFullYear();
                    var month = twoDigit(a.getMonth() + 1);
                    var day = twoDigit(a.getDate());

                    var result = M.util.get_string('date_renderer_format', "local_kopere_dashboard");
                    result = result.replace("day", day);
                    result = result.replace("month", month);
                    result = result.replace("year", year);

                    return '<div class="text-nowrap">' + result + '</div>';
                },
                datetimeRenderer  : function(data, type, row, info) {
                    if (type != 'display') {
                        return data;
                    }

                    if (data < 1000) {
                        return "";
                    }

                    function twoDigit($value) {
                        if ($value < 10) {
                            return '0' + $value;
                        }
                        return $value;
                    }

                    var a = new Date(data * 1000);
                    var year = a.getFullYear();
                    var month = twoDigit(a.getMonth() + 1);
                    var day = twoDigit(a.getDate());
                    var hour = twoDigit(a.getHours());
                    var min = twoDigit(a.getMinutes());

                    var result = M.util.get_string('datetime_renderer_format', "local_kopere_dashboard");
                    result = result.replace("day", day);
                    result = result.replace("month", month);
                    result = result.replace("year", year);
                    result = result.replace("hour", hour);
                    result = result.replace("min", min);

                    return '<div class="text-nowrap">' + result + '</div>';
                },
                visibleRenderer   : function(data, type, row, info) {
                    if (type != 'display') {
                        if (type == 'filter') {
                            if (!data) {
                                return M.util.get_string('invisible', "local_kopere_dashboard");
                            } else {
                                return M.util.get_string('visible', "local_kopere_dashboard");
                            }
                        }
                        return data;
                    }

                    if (!data) {
                        return '<div class="status-pill grey"  title="' +
                            M.util.get_string('invisible', "local_kopere_dashboard") +
                            '"></div>';
                    } else {
                        return '<div class="status-pill green" title="' + M.util.get_string('visible', "local_kopere_dashboard") +
                            '"></div>';
                    }
                },
                statusRenderer    : function(data, type, row, info) {
                    if (type != 'display') {
                        if (type == 'filter') {
                            if (data) {
                                return M.util.get_string('inactive', "local_kopere_dashboard");
                            } else {
                                return M.util.get_string('active', "local_kopere_dashboard");
                            }
                        }
                        return data;
                    }

                    if (data) {
                        return '<div class="status-pill grey"  title="' +
                            M.util.get_string('inactive', "local_kopere_dashboard") +
                            '"></div>';
                    } else {
                        return '<div class="status-pill green" title="' +
                            M.util.get_string('active', "local_kopere_dashboard") +
                            '"></div>';
                    }
                },
                deletedRenderer   : function(data, type, row, info) {
                    if (type != 'display') {
                        if (type == 'filter') {
                            if (!data) {
                                return M.util.get_string('notification_status_deleted', "local_kopere_dashboard");
                            } else {
                                return M.util.get_string('active', "local_kopere_dashboard");
                            }
                        }
                        return data;
                    }

                    if (!data) {
                        return `<div class="status-pill grey"
                                     title="${M.util.get_string('notification_status_deleted', "local_kopere_dashboard")}"></div>`;
                    } else {
                        return `<div class="status-pill green"
                                     title="${M.util.get_string('active', "local_kopere_dashboard")}"></div>`;
                    }
                },
                trueFalseRenderer : function(data, type, row, info) {
                    if (type != 'display') {
                        return data;
                    }

                    if (data == 0 || data == false || data == 'false') {
                        return M.util.get_string('no');
                    } else {
                        return M.util.get_string('yes');
                    }
                },
                userphotoRenderer : function(data, type, row, info) {
                    if (type != 'display') {
                        return data;
                    }

                    return `<img class="media-object"
                                 src="${M.cfg.wwwroot}/local/kopere_dashboard/profile-image.php?type=photo_user&id=${data}"
                                 style="width:35px;height:35px" />`;
                },
                secondsRenderer   : function(data, type, row, info) {
                    if (type != 'display') {
                        return data;
                    }

                    var tempo = parseInt(data);
                    if (isNaN(tempo) || tempo < 1) {
                        return '00:00:00';
                    }

                    var min = parseInt(tempo / 60);
                    var hor = parseInt(min / 60);

                    min = min % 60;
                    if (min < 10) {
                        min = "0" + min;
                        min = min.substr(0, 2);
                    }

                    var seg = tempo % 60;
                    if (seg <= 9) {
                        seg = "0" + seg;
                    }

                    if (hor <= 9) {
                        hor = "0" + hor;
                    }

                    return `${hor}:${min}:${seg}`;
                },
                timeRenderer      : function(data, type, row, info) {
                    if (type != 'display') {
                        return data;
                    }

                    var tempo = parseInt(data);
                    if (isNaN(tempo) || tempo < 1) {
                        return '00:00:00';
                    }

                    var min = parseInt(tempo / 60);
                    var hor = parseInt(min / 60);

                    min = min % 60;
                    if (min < 10) {
                        min = "0" + min;
                        min = min.substr(0, 2);
                    }

                    var seg = tempo % 60;
                    if (seg <= 9) {
                        seg = "0" + seg;
                    }

                    if (hor <= 9) {
                        hor = "0" + hor;
                    }

                    return `${hor}:${min}:${seg}`;
                },
            };

            var newColumnDefs = [];
            var iterate = $.each(params.columnDefs, function(id, columnDef) {
                switch (columnDef.render) {
                    case "numberRenderer":
                        columnDef.render = renderer.numberRenderer;
                        break;
                    case "currencyRenderer":
                        columnDef.render = renderer.currencyRenderer;
                        break;
                    case "filesizeRenderer":
                        columnDef.render = renderer.filesizeRenderer;
                        break;
                    case "dateRenderer":
                        columnDef.render = renderer.dateRenderer;
                        break;
                    case "datetimeRenderer":
                        columnDef.render = renderer.datetimeRenderer;
                        break;
                    case "visibleRenderer":
                        columnDef.render = renderer.visibleRenderer;
                        break;
                    case "statusRenderer":
                        columnDef.render = renderer.statusRenderer;
                        break;
                    case "deletedRenderer":
                        columnDef.render = renderer.deletedRenderer;
                        break;
                    case "trueFalseRenderer":
                        columnDef.render = renderer.trueFalseRenderer;
                        break;
                    case "userphotoRenderer":
                        columnDef.render = renderer.userphotoRenderer;
                        break;
                    case "secondsRenderer":
                        columnDef.render = renderer.secondsRenderer;
                        break;
                    case "timeRenderer":
                        columnDef.render = renderer.timeRenderer;
                        break;

                    default:
                        columnDef.render = renderer.mustacheRenderer;
                        break;
                }
                newColumnDefs.push(columnDef);
            });
            $.when(iterate).done(function() {

                params.columnDefs = newColumnDefs;
                params.oLanguage = {
                    sEmptyTable        : M.util.get_string('datatables_sEmptyTable', "local_kopere_dashboard"),
                    sInfo              : M.util.get_string('datatables_sInfo', "local_kopere_dashboard"),
                    sInfoEmpty         : M.util.get_string('datatables_sInfoEmpty', "local_kopere_dashboard"),
                    sInfoFiltered      : M.util.get_string('datatables_sInfoFiltered', "local_kopere_dashboard"),
                    sInfoPostFix       : M.util.get_string('datatables_sInfoPostFix', "local_kopere_dashboard"),
                    sInfoThousands     : M.util.get_string('datatables_sInfoThousands', "local_kopere_dashboard"),
                    sLengthMenu        : M.util.get_string('datatables_sLengthMenu', "local_kopere_dashboard"),
                    sLoadingRecords    : M.util.get_string('datatables_sLoadingRecords', "local_kopere_dashboard"),
                    sProcessing        : M.util.get_string('datatables_sProcessing', "local_kopere_dashboard"),
                    sErrorMessage      : M.util.get_string('datatables_sErrorMessage', "local_kopere_dashboard"),
                    sZeroRecords       : M.util.get_string('datatables_sZeroRecords', "local_kopere_dashboard"),
                    sSearch            : "",
                    sSearchPlaceholder : M.util.get_string('datatables_sSearch', "local_kopere_dashboard"),
                    buttons            : {
                        print_text   : M.util.get_string('datatables_buttons_print_text', "local_kopere_dashboard"),
                        copy_text    : M.util.get_string('datatables_buttons_copy_text', "local_kopere_dashboard"),
                        csv_text     : M.util.get_string('datatables_buttons_csv_text', "local_kopere_dashboard"),
                        copySuccess1 : M.util.get_string('datatables_buttons_copySuccess1', "local_kopere_dashboard"),
                        copySuccess_ : M.util.get_string('datatables_buttons_copySuccess_', "local_kopere_dashboard"),
                        copyTitle    : M.util.get_string('datatables_buttons_copyTitle', "local_kopere_dashboard"),
                        copyKeys     : M.util.get_string('datatables_buttons_copyKeys', "local_kopere_dashboard"),
                        pageLength   : {
                            '_'  : M.util.get_string('datatables_buttons_pageLength_', "local_kopere_dashboard"),
                            '-1' : M.util.get_string('datatables_buttons_pageLength_1', "local_kopere_dashboard"),
                        }
                    },
                    select             : {
                        rows : {
                            _ : M.util.get_string('datatables_buttons_select_rows_', "local_kopere_dashboard"),
                            0 : "",
                            1 : M.util.get_string('datatables_buttons_select_rows1', "local_kopere_dashboard"),
                        }
                    },
                    oPaginate          : {
                        sNext     : M.util.get_string('datatables_oPaginate_sNext', "local_kopere_dashboard"),
                        sPrevious : M.util.get_string('datatables_oPaginate_sPrevious', "local_kopere_dashboard"),
                        sFirst    : M.util.get_string('datatables_oPaginate_sFirst', "local_kopere_dashboard"),
                        sLast     : M.util.get_string('datatables_oPaginate_sLast', "local_kopere_dashboard"),
                    },
                    oAria              : {
                        sSortAscending  : M.util.get_string('datatables_oAria_sSortAscending', "local_kopere_dashboard"),
                        sSortDescending : M.util.get_string('datatables_oAria_sSortDescending', "local_kopere_dashboard"),
                    }
                };
                params.responsive = true;

                if (params.export_title) {
                    params.buttons = [
                        'pageLength',
                        {
                            extend : 'print',
                            text   : M.util.get_string('datatables_buttons_print_text', "local_kopere_dashboard"),
                            title  : params.export_title
                        }, {
                            extend : 'pdf',
                            text   : "PDF",
                            title  : params.export_title
                        }, {
                            extend : 'excel',
                            text   : 'Excel',
                            title  : params.export_title
                        }, {
                            extend : 'csv',
                            text   : M.util.get_string('datatables_buttons_csv_text', "local_kopere_dashboard"),
                            title  : params.export_title
                        }, {
                            extend : 'copy',
                            text   : "Copy",
                            title  : params.export_title
                        },
                    ];
                    params.dom = 'frtipB';
                    params.select = true;
                }

                var count_error = 0;
                $.fn.dataTable.ext.errMode = function(settings, helpPage, message) {
                    if (count_error < 20) {
                        var _processing = $("#" + tableid + "_processing");
                        setTimeout(function() {
                            _processing.show().html(
                                "<div style='color:#e91e63'>" +
                                M.util.get_string('datatables_sErrorMessage', "local_kopere_dashboard", "<span class='counter'>30</span>") +
                                "</div>");
                        }, 500);

                        var timer = 30;
                        var _inteval = setInterval(function() {
                            if (--timer <= 0) {
                                _processing.html(M.util.get_string('datatables_sProcessing', "local_kopere_dashboard"));
                                clearInterval(_inteval);
                                window[tableid].ajax.reload();
                            }
                            _processing.find(".counter").html(timer);
                        }, 1000);
                    }
                    count_error++;
                };

                params.initComplete = function(settings, json) {
                    var element = $("<div class='group-controls'>");
                    var wrapper = $("#" + tableid + "_wrapper");
                    wrapper.prepend(element);
                    wrapper.find(".dataTables_length").appendTo(element);
                    wrapper.find(".dataTables_filter").appendTo(element);

                    wrapper.find(".footer")
                        .css({"justify-content" : "space-between"})
                        .prepend("<div class='dataTables_navigate_area d-flex align-items-center'></div>");

                    var $area = wrapper.find(".dataTables_navigate_area");
                    wrapper.find(".dataTables_info").appendTo($area);
                    wrapper.find(".dataTables_paginate").appendTo($area);
                };

                window[tableid] = $("#" + tableid).DataTable(params);
            });
        },

        click : function(tableid, clickchave, clickurl) {
            $('#' + tableid + ' tbody').on('click', 'tr', function() {
                var data = window[tableid].row(this).data();
                dataTables_init._click_internal(data, clickchave, clickurl)
            });
        },

        _click_internal : function(data, clickchave, clickurl) {
            $.each(clickchave, function(id, chave) {
                clickurl = clickurl.replace('{' + chave + '}', data[chave]);
            });

            location.href = clickurl;
        }
    };

    return dataTables_init;
});
