$(document).ready(function () {
    $("#servTable").DataTable({
        ordering: false,
        searching: true,
    });

    var table = $("#servTable").DataTable();
    var officeIndex = 3;
    var ppeIndex = 3;

    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        if (settings.nTable.id !== "servTable") {
            return true;
        }

        var selectedOffice = $("#ofc_hos").val();
        var selectedPpe = $("#ppe_code").val();
        var office = data[officeIndex];
        var ppe = data[ppeIndex];

        if (
            (selectedOffice === "" || office.includes(selectedOffice)) &&
            (selectedPpe === "" || ppe.includes(selectedPpe))
        ) {
            return true;
        }
        return false;
    });

    $("#ofc_hos, #ppe_code").change(function () {
        table.draw();
    });
});
