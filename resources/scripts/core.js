function openWindow(idWindow, notClose)
{
    if (typeof (notClose) === 'undefined')
        closeAllWindows();
    $(idWindow).window('open');
}

function closeAllWindows()
{
    $(".easyui-window").window({content: null});
}


function show(msj) {
    $.messager.alert('SIMOPI', msj);
}
function clearForm(id) {
    $('#' + id).form('clear');
}

function myformatter(date) {
    var y = date.getFullYear();
    var m = date.getMonth() + 1;
    var d = date.getDate();
    return (d < 10 ? ('0' + d) : d) + '/' + (m < 10 ? ('0' + m) : m) + '/' + y;
}

function myparser(s) {
    if (!s)
        return new Date();
    var ss = (s.split('/'));
    var y = parseInt(ss[2], 10);
    var m = parseInt(ss[1], 10);
    var d = parseInt(ss[0], 10);
    if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
        return new Date(y, m - 1, d);
    } else {
        return new Date();
    }
}

$.extend($.fn.validatebox.defaults.rules, {
    selectOption: {
        validator: function(value, param) {
            encontrado = false;
            a = $('#' + param[0]).combobox('getData');
            // console.log(a);
            a.every(function(elemento) {
                if (elemento['text'] !== value) {
                    return true; // seguir 
                }
                else {
                    encontrado = true;
                    return false; // terminar 
                }
            });
            return (encontrado && value !== "Selecciona una opción");
        },
        message: "Selecciona una opción"
    },
    minValue: {
        validator: function(value, param) {
            return Number(value.replace(/,/g, "")) >= Number(param[0]);
        },
        message: 'Ingrese un valor mayor al ingresado.'
    }
});

var comboFilter = function(q, row) {
    return row['text'].toLowerCase().indexOf(q.toLowerCase()) !== -1;
};