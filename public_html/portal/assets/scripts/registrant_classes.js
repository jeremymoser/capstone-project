function clearFilters() {
    document.querySelectorAll("#Filters select").forEach(function (element) {
        if (element.options[element.selectedIndex] != undefined) {
            element.options[element.selectedIndex].removeAttribute("selected");
        }
    })
};

filterForm = document.getElementById("Filters");
filterForm.addEventListener("submit", function (event) {
    event.preventDefault();
    submit = false;
    document.querySelectorAll("#Filters select").forEach(function (element) {
        if (element.options[element.selectedIndex] != undefined) {
            if (element.options[element.selectedIndex].value != "") {
                submit = true;
            }
        }
    })
    if(submit) {
        filterForm.submit();
    } else {
        alert('Please select at least one filter to search.');
        document.getElementById("filters").classList.add("border-danger");
        document.querySelectorAll("#Filters label").forEach(function (element) {
            element.classList.add("text-danger");
        })
    }
    });