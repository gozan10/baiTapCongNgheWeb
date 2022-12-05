function sortTable(Table, col, dir) {
    var sortClass, i;

    sortTable.sortCol = -1;
    sortClass = Table.className.match(/js-sort-\d+/);
    if (null != sortClass) {
        sortTable.sortCol = sortClass[0].replace(/js-sort-/, '');
        Table.className = Table.className.replace(new RegExp(' ?' + sortClass[0] + '\\b'), '');
    }
    if ('undefined' === typeof col) {
        col = sortTable.sortCol;
    }

    if ('undefined' !== typeof dir) {
        sortTable.sortDir = dir == -1 || dir == 'desc' ? -1 : 1;
    } else {
        sortClass = Table.className.match(/js-sort-(a|de)sc/);
        if (null != sortClass && sortTable.sortCol == col) {
            sortTable.sortDir = 'js-sort-asc' == sortClass[0] ? -1 : 1;
        } else {
            sortTable.sortDir = 1;
        }
    }
    Table.className = Table.className.replace(/ ?js-sort-(a|de)sc/g, '');

    Table.className += ' js-sort-' + col;
    sortTable.sortCol = col;

    Table.className += ' js-sort-' + (sortTable.sortDir == -1 ? 'desc' : 'asc');

    if (col < Table.tHead.rows[Table.tHead.rows.length - 1].cells.length) {
        sortClass = Table.tHead.rows[Table.tHead.rows.length - 1].cells[col].className.match(/js-sort-[-\w]+/);
    }
    for (i = 0; i < Table.tHead.rows[Table.tHead.rows.length - 1].cells.length; i++) {
        if (col == Table.tHead.rows[Table.tHead.rows.length - 1].cells[i].getAttribute('data-js-sort-colNum')) {
            sortClass = Table.tHead.rows[Table.tHead.rows.length - 1].cells[i].className.match(/js-sort-[-\w]+/);
        }
    }
    if (null != sortClass) {
        sortTable.sortFunc = sortClass[0].replace(/js-sort-/, '');
    } else {
        sortTable.sortFunc = 'string';
    }
    Table.querySelectorAll('.js-sort-active').forEach(function (Node) {
        Node.className = Node.className.replace(/ ?js-sort-active\b/, '');
    });
    Table.querySelectorAll('[data-js-sort-colNum="' + col + '"]:not(:empty)').forEach(function (Node) {
        Node.className += ' js-sort-active';
    });

    var rows = [],
        TBody = Table.tBodies[0];

    for (i = 0; i < TBody.rows.length; i++) {
        rows[i] = TBody.rows[i];
    }
    if ('none' != sortTable.sortFunc) {
        rows.sort(sortTable.compareRow);
    }

    while (TBody.firstChild) {
        TBody.removeChild(TBody.firstChild);
    }
    for (i = 0; i < rows.length; i++) {
        TBody.appendChild(rows[i]);
    }
}


sortTable.compareRow = function (RowA, RowB) {
    var valA, valB;
    if ('function' != typeof sortTable[sortTable.sortFunc]) {
        sortTable.sortFunc = 'string';
    }
    valA = sortTable[sortTable.sortFunc](RowA.cells[sortTable.sortCol]);
    valB = sortTable[sortTable.sortFunc](RowB.cells[sortTable.sortCol]);

    return valA == valB ? 0 : sortTable.sortDir * (valA > valB ? 1 : -1);
};


sortTable.stripTags = function (html) {
    return html.replace(/<\/?[a-z][a-z0-9]*\b[^>]*>/gi, '');
};


sortTable.date = function (Cell) {
    if (typeof okDate !== 'undefined') {
        var kDate = okDate(sortTable.stripTags(Cell.innerHTML));
        return kDate ? kDate.getTime() : 0;
    } else {
        return (new Date(sortTable.stripTags(Cell.innerHTML))).getTime() || 0;
    }
};


sortTable.number = function (Cell) {
    return Number(sortTable.stripTags(Cell.innerHTML).replace(/[^-\d.]/g, ''));
};


sortTable.string = function (Cell) {
    return sortTable.stripTags(Cell.innerHTML).toLowerCase();
};


sortTable.raw = function (Cell) {
    return Cell.innerHTML;
};


sortTable.last = function (Cell) {
    return sortTable.stripTags(Cell.innerHTML).split(' ').pop().toLowerCase();
};


sortTable.input = function (Cell) {
    for (var i = 0; i < Cell.children.length; i++) {
        if ('object' == typeof Cell.children[i]
            && 'undefined' != typeof Cell.children[i].value
        ) {
            return Cell.children[i].value.toLowerCase();
        }
    }

    return sortTable.string(Cell);
};


sortTable.none = function (Cell) {
    return null;
};


sortTable.getClickHandler = function (Table, col) {
    return function () {
        sortTable(Table, col);
    };
};


sortTable.init = function () {
    var THead, Tables, Handler;
    if (document.querySelectorAll) {
        Tables = document.querySelectorAll('table.js-sort-table');
    } else {
        Tables = document.getElementsByTagName('table');
    }

    for (var i = 0; i < Tables.length; i++) {
        if (!document.querySelectorAll && null === Tables[i].className.match(/\bjs-sort-table\b/)) {
            continue;
        }

        if (Tables[i].attributes['data-js-sort-table']) {
            continue;
        }

        if (!Tables[i].tHead) {
            THead = document.createElement('thead');
            THead.appendChild(Tables[i].rows[0]);
            Tables[i].insertBefore(THead, Tables[i].children[0]);
        } else {
            THead = Tables[i].tHead;
        }

        for (var rowNum = 0; rowNum < THead.rows.length; rowNum++) {
            for (var cellNum = 0, colNum = 0; cellNum < THead.rows[rowNum].cells.length; cellNum++) {
    
                if (THead.rows[rowNum].cells[cellNum].className.match(/\bjs-sort-none\b/)) {
                    continue;
                }
                THead.rows[rowNum].cells[cellNum].setAttribute('data-js-sort-colNum', colNum);
                Handler = sortTable.getClickHandler(Tables[i], colNum);
                window.addEventListener
                    ? THead.rows[rowNum].cells[cellNum].addEventListener('click', Handler)
                    : window.attachEvent && THead.rows[rowNum].cells[cellNum].attachEvent('onclick', Handler);
                colNum += THead.rows[rowNum].cells[cellNum].colSpan;
            }
        }

        Tables[i].setAttribute('data-js-sort-table', 'true')
    }

    var element = document.createElement('style');
    document.head.insertBefore(element, document.head.childNodes[0]);
    var sheet = element.sheet;
    sheet.insertRule('table.js-sort-table.js-sort-asc thead tr > .js-sort-active:not(.js-sort-none):after {content: "\\25b2";font-size: 0.7em;padding-left: 3px;line-height: 0.7em;}', 0);
    sheet.insertRule('table.js-sort-table.js-sort-desc thead tr > .js-sort-active:not(.js-sort-none):after {content: "\\25bc";font-size: 0.7em;padding-left: 3px;line-height: 0.7em;}', 0);
};


window.addEventListener
    ? window.addEventListener('load', sortTable.init, false)
    : window.attachEvent && window.attachEvent('onload', sortTable.init)
    ;

if (typeof NodeList.prototype.forEach !== "function") {
    NodeList.prototype.forEach = Array.prototype.forEach;
}

function mysortTable() {
    var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("js-sort-table");
  switching = true;
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[2];
      y = rows[i + 1].getElementsByTagName("TD")[2];
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
function searchTableByName() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.querySelector("tbody");
    tr = document.querySelectorAll("tbody tr");


    for (i = 0; i < tr.length; i++) {
        td = tr[i];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                
            }
        }
    }

            var keyword = $('input').val();

            $('tbody').unmark();
    
            $('tbody').mark(keyword,{});
}

